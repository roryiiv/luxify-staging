<?php

namespace App\Http\Controllers;

Use Mail;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

Use Auth;

use App\Categories;

use App\Listings;

use App\History;

use App\Users;

use DB;

use Illuminate\Http\Response;

use Aws\S3\S3Client;

use League\Flysystem\AwsS3v3\AwsS3Adapter;

use League\Flysystem\Filesystem;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use Carbon\Carbon;

use App\Meta;

use func;

use Cache;

use Storage;

class Panel extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // make sure no guests

        if(Auth::user()){
            $this->user_id = Auth::user()->id;
            $this->user_role = Auth::user()->role;
            $this->accepted = array('admin', 'editor');
        }
    }

    private function send_notification($listing, $status) {
        $user = DB::table('users')
        ->where('id', $listing->userId)
        ->first();

        $username_to = $user->username;
        $listing_name = $listing->title;
        $this_url = url('/');
        $listing_url = $this_url . '/listing/' . $listing->slug;
        $details = array('to' => $user->email);
        if($status == 'APPROVED'){
            $listing_url = $this_url . '/listing/' . $listing->slug;
            Mail::send('emails.luxify-listing-approved-en-us', ['username_to' => $username_to, 'listing_name' => $listing_name, 'this_url' => $this_url, 'listing_url' => $listing_url], function ($message) use ($details){

                $message->from('technology@luxify.com', 'Luxify Admin');
                $message->subject('Listing Approved');
                $message->replyTo('no_reply@luxify.com', $name = null);
                $message->to($details['to']);

            });
        }elseif($status =='REJECTED' ){
            $listing_url = $this_url . '/dashboard/products/add';
            Mail::send('emails.luxify-listing-rejected-en-us', ['username_to' => $username_to, 'listing_name' => $listing_name, 'this_url' => $this_url, 'listing_url' => $listing_url], function ($message) use ($details){

                $message->from('technology@luxify.com', 'Luxify Admin');
                $message->subject('Listing Rejected');
                $message->replyTo('no_reply@luxify.com', $name = null);
                $message->to($details['to']);

            });
        }
    }

    //Panel (super admin) Controller
    public function index() {
        // return 'panel index page';
        if(Auth::user()->role === 'seller'){
            return redirect('/dashboard');
        }elseif(Auth::user()->role === 'user'){
            return redirect('/dashboard/profile');
        }else{
            return redirect('/panel/users');
        }
    }

    public function users() {
        $filter = array();
        $filter_or = array();
        $filters = array();

        $whereIn = array();
        if(Auth::user()->role == 'editor'){
        	$whereIn = ['seller'];
        }elseif(Auth::user()->role == 'admin'){
        	$whereIn = ['user', 'seller'];
        }

        if(isset($_GET['txtCustomerName']) && !empty($_GET['txtCustomerName'])){
            $filter[] = ['firstName', 'like', '%'.$_GET['txtCustomerName']. '%'];
            $filter_or[] = ['lastName', 'like', '%'.$_GET['txtCustomerName']. '%'];
            $filters['txtCustomerName'] = $_GET['txtCustomerName'];
        }
        if(isset($_GET['txtCompanyName']) && !empty($_GET['txtCompanyName'])){
            $filter[] = ['companyName', 'like', '%'.$_GET['txtCompanyName'].'%'];
            $filters['txtCompanyName'] = $_GET['txtCompanyName'];
        }
        if(isset($_GET['ddlCustomerGroup']) && !empty($_GET['ddlCustomerGroup'])){
            $filter[] = ['role', $_GET['ddlCustomerGroup']];
            $filters['ddlCustomerGroup'] = $_GET['ddlCustomerGroup'];
        }
        if(isset($_GET['ddlApproved']) && !empty($_GET['ddlApproved'])){
            $filter[] = ['dealer_status', $_GET['ddlApproved']];
            $filters['ddlApproved'] = $_GET['ddlApproved'];
        }
        if(isset($_GET['txtEmail']) && !empty($_GET['txtEmail'])){
            $filter[] = ['email', 'like', '%'. $_GET['txtEmail']. '%'];
            $filters['txtEmail'] = $_GET['txtEmail'];
        }
        if(isset($_GET['ddlStatus']) && !empty($_GET['ddlStatus'])){
            $filter[] = ['isSuspended', $_GET['ddlStatus']];
            $filters['ddlStatus'] = $_GET['ddlStatus'];
        }

        $perpage = 10;
        // var_dump($filter); exit;

        if(isset($_GET['view-perpage']) && !empty($_GET['view-perpage'])){
            $perpage = $_GET['view-perpage'];
            if($perpage == -1){
                $users = DB::table('users')
                ->where($filter)
                ->whereIn('role', $whereIn)
                ->orWhere($filter_or)
                ->orderby('created_at', 'desc')
                ->get();
            }else{
                $users = DB::table('users')
                ->where($filter)
                ->whereIn('role', $whereIn)
                ->orWhere($filter_or)
                ->orderby('created_at', 'desc')
                ->paginate($perpage);
            }
        }else{
            if(isset($filter_or)){
                $users = DB::table('users')
                ->where($filter)
                ->whereIn('role', $whereIn)
                ->orWhere($filter_or)
                ->orderby('created_at', 'desc')
                ->paginate($perpage);
            }else{
                $users = DB::table('users')
                ->where($filter)
                ->whereIn('role', $whereIn)
                ->orderby('created_at', 'desc')
                ->paginate($perpage);
            }

        }

        // var_dump($user);
        return view('panel.users', ['users' => $users, 'filters' => $filters]);
    }

    public function user_add($role) {
        if($this->user_role == 'admin'){
            return view('panel.add-user', ['role' => $role]);
        }else{
            return redirect('/panel/users');
        }
        
    }

    public function user_register() {
        //redirect if user is editor.
        if($this->user_role == 'editor') return redirect('/panel/users');

        $user = new User; // always have it declared for first or else empty value sent

        //we'll build the slug here and save it
        if($_POST['role'] == 'seller'){ //only seller should has slug (company name)
            $company = $_POST['companyName'] != '' ? $_POST['companyName'] : '';
            if($company != ''){
                $slug = SlugService::createSlug(Users::class, 'slug', $company);
            }else{
                $slug = '';
            }
            $user->slug = $slug;
        }

        //we push the image to S3 first.
        if(isset($_POST['cover_img']) && !empty($_POST['cover_img'])){
            $image = base_path() . '/public/temp/' . $_POST['cover_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['cover_img'];
            if (file_exists($image) ) {
              if($s3->put($filePath, file_get_contents($image), 'public')){
                  $user->coverImageUrl = $_POST['cover_img'];
                  unlink($image);
              }
            }
        }
        if(isset($_POST['profile_img']) && !empty($_POST['profile_img'])){
            $image = base_path() . '/public/temp/' . $_POST['profile_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['profile_img'];
            if (file_exists($image)) {
              if($s3->put($filePath, file_get_contents($image), 'public')){
                  $user->companyLogoUrl = $_POST['profile_img'];
                  unlink($image);
              }
            }
        }

        $error_arr = array();
        if(isset($_POST['username']) && !empty($_POST['username'])){
            $user->username = $_POST['username'];
        }
        if(isset($_POST['txtEmailAddress']) && !empty($_POST['txtEmailAddress'])){
            $user->email = $_POST['txtEmailAddress'];
        }
        if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
            $user->firstName = $_POST['first_name'];
            $user->fullName .= $_POST['first_name'];
        }
        if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
            $user->lastName = $_POST['last_name'];
            $user->fullName .= ' ' . $_POST['last_name'];
        }

        if(isset($_POST['full_name']) && !empty($_POST['full_name'])){
            $user->fullName = $_POST['full_name'];
            $names = explode(' ', $_POST['full_name']);
            $user->firstName = $names[0];
            if(isset($names[1])) //in case no space between the name
            $user->lastName = $names[1];
        }
        if(isset($_POST['salt']) && !empty($_POST['salt'])){
            $user->salt = $_POST['salt'];
        }
        if(isset($_POST['hashed']) && !empty($_POST['hashed'])){
            $user->hashedPassword = $_POST['hashed'];
        }
        if(isset($_POST['role']) && !empty($_POST['role'])){
            $user->role = $_POST['role'];
        }
        if(isset($_POST['country']) && !empty($_POST['country'])){
            $user->countryId = $_POST['country'];
        }
        if(isset($_POST['language']) && !empty($_POST['language'])){
            $user->languageId = $_POST['language'];
        }
        if(isset($_POST['currency']) && !empty($_POST['currency'])){
            $user->currencyId = $_POST['currency'];
        }
        if(isset($_POST['contactDetails']) && !empty($_POST['contactDetails'])){
            $user->contactDetails = $_POST['contactDetails'];
        }
        if(isset($_POST['companyAddress']) && !empty($_POST['companyAddress'])){
            $user->companyAddress = $_POST['companyAddress'];
        }
        if(isset($_POST['latitude']) && !empty($_POST['latitude'])){
            $user->latitude = $_POST['latitude'];
        }
        if(isset($_POST['longitude']) && !empty($_POST['longitude'])){
            $user->longitude = $_POST['longitude'];
        }
        if(isset($_POST['mapZoomLevel']) && !empty($_POST['mapZoomLevel'])){
            $user->mapZoomLevel = $_POST['mapZoomLevel'];
        }
        if(isset($_POST['companyName']) && !empty($_POST['companyName'])){
            $user->companyName = $_POST['companyName'];
        }
        if(isset($_POST['companyRegNumber']) && !empty($_POST['companyRegNumber'])){
            $user->companyRegNumber = $_POST['companyRegNumber'];
        }
        if(isset($_POST['companySummary']) && !empty($_POST['companySummary'])){
            $user->companySummary = $_POST['companySummary'];
        }
        if(isset($_POST['website']) && !empty($_POST['website'])){
            $user->website = $_POST['website'];
        }
        if(isset($_POST['txtFacebookLink']) && !empty($_POST['txtFacebookLink'])){
            $user->socialFacebook = $_POST['txtFacebookLink'];
        }
        if(isset($_POST['txtInstagramLink']) && !empty($_POST['txtInstagramLink'])){
            $user->socialInstagram = $_POST['txtInstagramLink'];
        }
        if(isset($_POST['txtPinterestLink']) && !empty($_POST['txtPinterestLink'])){
            $user->socialPinterest = $_POST['txtPinterestLink'];
        }
        if(isset($_POST['txtTwitterLink']) && !empty($_POST['txtTwitterLink'])){
            $user->socialTwitter = $_POST['txtTwitterLink'];
        }

        if(!empty($error_arr)){
            $error = json_encode($error_arr);
            echo $error;
        }else{
            if($user->save()) return redirect('/panel/users');
        }
    }

    public function productUpdate($id){
        $item = Listings::where('id', $id)->first();
        $error_arr = array();

        //$item->userId = Auth::user()->id;

        if ( isset($_POST['itemLocation']) && !empty($_POST['itemLocation']) ) {
            $item->countryId = $_POST['itemLocation'];
            echo '1';
        } else {
            $error_arr['itemLocation'] = 'Item Location is not specified.';
        }

        if ( isset($_POST['itemAvailability']) && !empty($_POST['itemAvailability'])) {
            $item->availableToId = $_POST['itemAvailability'] == 'worldwide' ? NULL: $_POST['itemLocation'];
            echo '1';
        } else {
            $error_arr['itemAvailability'] = 'Item Availability is not specified.';
        }

        if ( isset($_POST['itemCategory']) && !empty($_POST['itemCategory']) ) {
            echo '1';
            $item->categoryId = $_POST['itemCategory'];
        } else {
            $error_arr['itemCategory'] = 'Item Category is not specified.';
        }

        if ( isset($_POST['title']) && !empty($_POST['title']) ) {
            echo '1';
            $item->title = $_POST['title'];

/*            if($item->slug == '' || $item->slug == null){ //we'll build a new slug on each update.
                $item->slug = SlugService::createSlug(Listings::class, 'slug', $_POST['title']);
            }*/
        } else {
            $error_arr['title'] = 'Item title is required.';
        }

        if ( isset($_POST['priceOnRequest']) && !empty($_POST['priceOnRequest']) && $_POST['priceOnRequest'] === 'on' ) {
            $item->price = NULL;
        } else {
            if (isset($_POST['price']) && !empty($_POST['price'])) {
              echo '4a';
                $item->price = intval($_POST['price']);
            } else {
              echo '4b';
                $error_arr['price'] = 'Item price is required.';
            }
        }

        if ( isset($_POST['currency']) && !empty($_POST['currency']) ) {
            echo '5';
            $item->currencyId = $_POST['currency'];
        } else {
            $error_arr['currency'] = 'Item currency is required.';
        }

        if (isset($_POST['status']) && !empty($_POST['status']) ) {
            $item->status = $_POST['status'];
        } else {
            $error_arr['status'] = 'Item status is required.';
        }
        if ( isset($_POST['description']) && !empty($_POST['description'])) {
            $item->description = $_POST['description'];
            $oldDescription = DB::table('listings')->where('id',$id)->value('description');
            if($oldDescription != $_POST['description']){
                $catat = History::catat('description',$id,$_POST['description']);         
            }

        } else {
            $error_arr['description'] = 'Item description is required.';
        }

        if (isset($_POST['condition']) && !empty($_POST['condition']) ) {
            $item->condition= $_POST['condition'];
        } else {
            $error_arr['condition'] = 'Item condition is required.';
        }

        if (isset($_POST['expiryDate'])) {
            $item->expired_at = Carbon::createFromFormat('Y-m-d', $_POST['expiryDate']);
        }

        // TODO: handle for images already in S3
        if (isset($_POST['images']) && count($_POST['images']) > 0 ) {
            foreach($_POST['images'] as $i => $val) {
              if ( !isset($val) || empty($val) || strtolower($val) === 'null') {
                  unset($_POST['images'][$i]);
              }
            }
            
            $s3 = \Storage::disk('s3');
            $uploadedImage = array();
            foreach( $_POST['images'] as $i => $val) {
                if (!$s3->has('/images/'. $val)) {
                    $image = base_path() . '/public/temp/' . $val;
                    $filePath = '/images/' . $val;
                    if ( file_exists($image)) {
                      if($s3->put($filePath, file_get_contents($image), 'public')){
                          $uploadedImage[] = $val;
                          unlink($image);
                      }
                    }
                } else {
                    $uploadedImage[] = $val;
                }
            }

            
            if (count($uploadedImage) === count($_POST['images'])) {
                //add history for image versioning
                //if oldversionarray json is same as new, return no history
                //if there is different json oldversionarray and newarray, write the history
                $history = History::versioning_image($uploadedImage,$id);

                                //additional add alt image here
                for ($i=0; $i < count($uploadedImage); $i++) {
                    //add meta with value
                    $object_id = $uploadedImage[$i];
                    $value = $_POST['alt_text'][$i];
                    $save = Meta::alt_text_image($object_id,$value);
                }
                if (isset($_POST['mainImage']) && !empty($_POST['mainImage'])) {
                     
                    $item->mainImageUrl = $_POST['mainImage'];
                    $item->images = json_encode($uploadedImage);
                } else {
                    $item->mainImageUrl = $uploadedImage[0];
                    $item->images = json_encode($uploadedImage);
                }
            } else {
                $error_arr['images'] = 'Error in uploaded images.';
            }
        }

        if (isset($_POST['buyNowURL']) && !empty($_POST['buyNowURL'])) {
            $item->buyNowUrl = $_POST['buyNowURL'];
        }

        if (isset($_POST['aerialLookURL']) && !empty($_POST['aerialLookURL'])) {
            $item->aerialLookUrl = $_POST['aerialLookURL'];
        }

        if (isset($_POST['aerial3DLookURL']) && !empty($_POST['aerial3DLookURL'])) {
            $item->aerialLook3DUrl = $_POST['aerial3DLookURL'];
        }

        //additional parameters
/*        if (isset($_POST['slug']) && !empty($_POST['slug'])) {
            //$newslug = SlugService::createSlug(Listings::class, 'slug', $_POST['slug']);
            $newslug = Listings::newslug($id,$_POST['slug']);
            $item->slug = $newslug;
        }*/

        $meta = array();
        if (isset($_POST['meta_title']) && !empty($_POST['meta_title'])){
            $meta['title'] = $_POST['meta_title'];
        }

        if (isset($_POST['meta_alttext']) && !empty($_POST['meta_alttext'])){
            $meta['alt_text'] = $_POST['meta_alttext'];
        }
        
        if (isset($_POST['meta_description']) && !empty($_POST['meta_description'])) {
            $meta['description'] = $_POST['meta_description'];
        }

        if (isset($_POST['meta_keyword']) && !empty($_POST['meta_keyword'])) {
            $meta['keyword'] = $_POST['meta_keyword'];
        }

        if (isset($_POST['meta_author']) && !empty($_POST['meta_author'])) {
            $meta['author'] = $_POST['meta_author'];
        }        if (isset($_POST['meta_author']) && !empty($_POST['meta_author'])) {
            $meta['author'] = $_POST['meta_author'];
        }


        // delete the existing optional fields first
        DB::table('extrainfos')->where('listingId', $item->id )->delete();
        $form = DB::table('forms')
        ->where('categoryId', $item->categoryId)
        ->where('languageId', 1)
        ->first();
        if ($form) {
          if(isset($_POST['optionfields']) && !empty($_POST['optionfields'])) {
              foreach ($_POST['optionfields'] as $key => $value) {
                  $formGroup = DB::table('formgroups')
                  ->where('formId', $form->id)
                  ->where('formfieldId', $key)
                  ->first();
                  if ($formGroup && !empty($value)) {
                      DB::insert('insert into extrainfos (formgroupId, listingId, value) values (?, ?, ?)', array($formGroup->id, $item->id, $value));
                  }
              }
          }
        }

        if(!empty($error_arr)){
            echo json_encode($error_arr);
        }else{
            //save or update meta listing
            //$id = id listing
            //$meta = data array meta
            //$object_type = listing/users;
            $object_type = 'listings';
            $item->edited_by = Auth::user()->id;
            $savemeta = Meta::saveorupdate($id,$meta,$object_type);
            //
            if ($item->save()) {

                return redirect('/panel/product/edit/'.$item->id);
            }
        }
    }

    public function user_confirm() {
        return 'users confirm method';
    }

    public function user_edit($id) {
        $user = DB::table('users')
        ->where('id', $id)
        ->first();
        $user->meta_title = Meta::get_data_user($id,'title');
        $user->meta_alt_text = Meta::get_data_user($id,'alt_text');
        $user->meta_description = Meta::get_data_user($id,'description');
        $user->meta_author = Meta::get_data_user($id,'author');
        $user->meta_keyword = Meta::get_data_user($id,'keyword');

        $curr_edited = Cache::get($id);
        if($curr_edited == ''){
            Cache::forever($id, 'edited'); // marked being edited.
        }
        return view('panel.edit-user', ['user' => $user]);
    }

    public function user_update() {
        $user = User::where('id', $_POST['user_id'])->first(); // always have it declared for first or else empty value sent

        //we'll rebuild the slug here and save it

        //we push the image to S3 first.
        if(isset($_POST['cover_img']) && !empty($_POST['cover_img'])){
            $image = base_path() . '/public/temp/' . $_POST['cover_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['cover_img'];
            if (file_exists($image)) {
              if($s3->put($filePath, file_get_contents($image), 'public')){
                  $user->coverImageUrl = $_POST['cover_img'];
                  unlink($image);
              }
            }
        }
        if(isset($_POST['profile_img']) && !empty($_POST['profile_img'])){
            $image = base_path() . '/public/temp/' . $_POST['profile_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['profile_img'];
            if (file_exists($image)) {
              if($s3->put($filePath, file_get_contents($image), 'public')){
                  $user->companyLogoUrl = $_POST['profile_img'];
                  unlink($image);
              }
            } 
        }

        
        $error_arr = array();

        if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
            $user->firstName = $_POST['first_name'];
        }
        if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
            $user->lastName = $_POST['last_name'];
        }
        if(isset($_POST['txtUserRole']) && !empty($_POST['txtUserRole'])){
            $user->role = $_POST['txtUserRole'];
        }
        if(isset($_POST['country']) && !empty($_POST['country'])){
            $user->countryId = $_POST['country'];
        }
        if(isset($_POST['language']) && !empty($_POST['language'])){
            $user->languageId = $_POST['language'];
        }
        if(isset($_POST['currency']) && !empty($_POST['currency'])){
            $user->currencyId = $_POST['currency'];
        }
        if(isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])) {
        	$phoneNumber = json_encode($_POST['phoneNumber']);
            $user->phoneNumber = $phoneNumber;
        }
        if(isset($_POST['contactDetails']) && !empty($_POST['contactDetails'])){
            $user->contactDetails = $_POST['contactDetails'];
        }
        if(isset($_POST['companyAddress']) && !empty($_POST['companyAddress'])){
            $user->companyAddress = $_POST['companyAddress'];
        }
        if(isset($_POST['latitude']) && !empty($_POST['latitude'])){
            $user->latitude = $_POST['latitude'];
        }
        if(isset($_POST['longitude']) && !empty($_POST['longitude'])){
            $user->longitude = $_POST['longitude'];
        }
        if(isset($_POST['mapZoomLevel']) && !empty($_POST['mapZoomLevel'])){
            $user->mapZoomLevel = $_POST['mapZoomLevel'];
        }
        if(isset($_POST['companyName']) && is_array($_POST['companyName'])){
            $companyName = array_filter($_POST['companyName']);
            if(!empty($companyName)){
                $user->companyName = json_encode($_POST['companyName']);
            }
           
        }
        // if(isset($_POST['companyName']) && !empty($_POST['companyName'])){
        //     $user->companyName = $_POST['companyName'];
        // }
        if(isset($_POST['companyRegNumber']) && !empty($_POST['companyRegNumber'])){
            $user->companyRegNumber = $_POST['companyRegNumber'];
        }
        if(isset($_POST['companySummary']) && !empty($_POST['companySummary'])){
            $user->companySummary = $_POST['companySummary'];
        }
        if(isset($_POST['website']) && !empty($_POST['website'])){
            $user->website = $_POST['website'];
        }
        if(isset($_POST['txtFacebookLink']) && !empty($_POST['txtFacebookLink'])){
            $user->socialFacebook = $_POST['txtFacebookLink'];
        }
        if(isset($_POST['txtInstagramLink']) && !empty($_POST['txtInstagramLink'])){
            $user->socialInstagram = $_POST['txtInstagramLink'];
        }
        if(isset($_POST['txtPinterestLink']) && !empty($_POST['txtPinterestLink'])){
            $user->socialPinterest = $_POST['txtPinterestLink'];
        }
        if(isset($_POST['txtTwitterLink']) && !empty($_POST['txtTwitterLink'])){
            $user->socialTwitter = $_POST['txtTwitterLink'];
        }
        // reset user password
        if(isset($_POST['hashed']) && !empty($_POST['hashed'])){
            $user->hashedPassword = $_POST['hashed'];
        }
        if(isset($_POST['salt']) && !empty($_POST['salt'])){
            $user->salt = $_POST['salt'];
        }
/*        if(isset($_POST['slug']) && !empty($_POST['slug'])){

          $oldslug = User::where('id',$_POST['user_id'])->value('slug');
          $newslug = str_slug($_POST['slug'], '-');
          //if data not change
          if($oldslug == $newslug){

            $counts = User::where('slug',$newslug)->count();
            //if data more than the object original
            if($counts>1){
              $newslug_copy = $newslug.'-'.$counts+1;
                $newslug = $newslug_copy;
              }else{
                $newslug;
              }
          }else{
            //if old slug is diff with new slug
            $othercount = User::where('slug',$newslug)->count();
            //if newslug is there are same with others slug
            if($othercount>0){
              $newslug = $newslug.'-'.$othercount+1;
            }
            $newslug = $newslug;
          }
            $user->slug = $newslug;
        }*/
        //additional meta on user page
        $meta = array();
        if (isset($_POST['meta_title']) && !empty($_POST['meta_title'])){
            $meta['title'] = $_POST['meta_title'];
        }

        if (isset($_POST['meta_alttext']) && !empty($_POST['meta_alttext'])){
            $meta['alt_text'] = $_POST['meta_alttext'];
        }
        
        if (isset($_POST['meta_description']) && !empty($_POST['meta_description'])) {
            $meta['description'] = $_POST['meta_description'];
        }

        if (isset($_POST['meta_keyword']) && !empty($_POST['meta_keyword'])) {
            $meta['keyword'] = $_POST['meta_keyword'];
        }

        if (isset($_POST['meta_author']) && !empty($_POST['meta_author'])) {
            $meta['author'] = $_POST['meta_author'];
        }


        if(!empty($error_arr)){
            $error = json_encode($error_arr);
            echo $error;

        }else{
            $user->edited_by = Auth::user()->id;
            $object_type = 'users';
            $savemeta = Meta::saveorupdate($_POST['user_id'],$meta,$object_type);
            //if($user->save()) return redirect('/panel/user');
            if($user->save()) return redirect('/panel/user/edit/'.$_POST['user_id']);
        }
    }

    public function user_delete($user_id) {
        $user = User::where('id', $user_id)->first();
        $role = $user->role;

        //if($role == 'seller') {
            //we remove the items listed under this user id
            $ended_at = date("Y-m-d H:i:s");
            DB::table('listings')
            ->where('userId', $user->id)
            ->update(['status' => 'EXPIRED', 'ended_at' => $ended_at]);
        //}

        //suspend the account
        DB::table('users')
        ->where('id', $user->id)
        ->update(['isSuspended' => 1]);

        return redirect('/panel/users');
    }

    public function user_revoke($user_id) {
        $user = User::where('id', $user_id)->first();
        $role = $user->role;

        if($role == 'seller'){
            //we revoke the items listed under this user id to 'PENDING'
            $updated_at = date("Y-m-d H:i:s");
            DB::table('listings')
            ->where('userId', $user->id)
            ->update(['status' => 'PENDING', 'updated_at' => $updated_at]);
        }

        //suspend the account
        DB::table('users')
        ->where('id', $user->id)
        ->update(['isSuspended' => 0]);

        return redirect('/panel/users');
    }

    public function products() {
      if(!in_array($this->user_role, $this->accepted)) return redirect('/');
      $filter = array();
      //TODO: Searching is case incentive?
      if(isset($_GET['txtProductName']) && !empty($_GET['txtProductName'])){
          $filter[] = ['listings.title', 'like', '%'.$_GET['txtProductName'].'%'];
      }
      if(isset($_GET['txtPrice']) && !empty($_GET['txtPrice'])){
          $filter[] = ['listings.price', $_GET['txtPrice']];
      }
      if(isset($_GET['startDate']) && !empty($_GET['startDate'])){
          $setDate = $_GET['startDate'];

          $a = date('Y-m-d H:i:s', strtotime($setDate));
          $b = date('Y-m-d H:i:s', strtotime($setDate . ' +1 day'));
          $filter[] = ['listings.created_at', '>=', $a];
          $filter[] = ['listings.created_at', '<=', $b];
      }
      if(isset($_GET['status']) && !empty($_GET['status'])){
          $filter[] = ['listings.status', $_GET['status']];
      }
      if(isset($_GET['category']) && !empty($_GET['category'])){
          $filter[] = ['listings.categoryId', $_GET['category']];
      }
      $products = DB::table('listings')
      ->where($filter)
      ->join('currencies', 'listings.currencyId', '=', 'currencies.id')
      ->join('users', 'listings.userId', '=', 'users.id')
      ->orderby('listings.created_at', 'desc')
      ->select('listings.*', 'currencies.code', 'users.firstName', 'users.lastName', 'users.username', 'users.companyName', 'users.fullName')
      ->where('status', '<>', 'EXPIRED')
      ->paginate(10);

      $products->setPath($_SERVER['REQUEST_URI']);
      return view('panel.products', ['products' => $products]);
    }

    public function dealer_change_status() {
        $userId= (isset($_REQUEST['userId']) && !empty($_REQUEST['userId'])) ? $_REQUEST['userId']: NULL;
        $status = (isset($_REQUEST['status']) && !empty($_REQUEST['status'])) ? $_REQUEST['status']: NULL;
        if ($userId && $status) {
            DB::table('users')
            ->where('id', $userId)
            ->update(['dealer_status' => $status]);

            // TODO: send email to tell the dealer they got approved
            $updated = DB::table('users')
            ->where('id', $userId)
            ->first();

            if ($updated) {
                // Send the email notification
                // get the seller data first

                if ($updated->dealer_status === $status) {
                    echo json_encode((object) ['result'=> 1, 'status'=> $updated->dealer_status]);
                } else {
                    echo json_encode((object) ['result'=> 0, 'message'=> 'Update failed.']);
                }
            } else {
                echo json_encode((object) ['result'=> 0, 'message'=> 'Update failed.']);
            }
        }
    }

    public function product_change_status() {
        $itemId = (isset($_REQUEST['itemId']) && !empty($_REQUEST['itemId'])) ? $_REQUEST['itemId']: NULL;
        $status = (isset($_REQUEST['status']) && !empty($_REQUEST['status'])) ? $_REQUEST['status']: NULL;
        if ($itemId && $status) {
            DB::table('listings')
            ->where('id', $itemId)
            ->update(['status' => $status]);

            $updated = DB::table('listings')
            ->where('id', $itemId)
            ->first();

            if ($updated) {
                // Send the email notification
                // get the seller data first

                $this->send_notification($updated, $status);
                if ($updated->status === $status) {
                    echo json_encode((object) ['result'=> 1, 'status'=> $updated->status]);
                } else {
                    echo json_encode((object) ['result'=> 0, 'message'=> 'Update failed.']);
                }
            } else {
                echo json_encode((object) ['result'=> 0, 'message'=> 'Update failed.']);
            }
        }
    }

    public function products_confirm() {
        return 'products confirm method';
    }

    public function products_edit(Request $request, $itemId) {
        $item = Listings::where('id', $itemId)->first();
        if ($item) {
            $optionalFields = DB::table('formfields')
            ->join('formgroups', 'formgroups.formfieldId', '=', 'formfields.id')
            ->join('forms', 'formgroups.formId', '=', 'forms.id')
            ->where('forms.categoryId', $item->categoryId)
            ->where('forms.languageId', 1)
            //->leftJoin('extrainfos', 'extrainfos.formgroupId', '=', 'formgroups.id')
            //->where('extrainfos.listingId', $itemId)
            ->select(['formfields.*', 'formgroups.id AS formgroupId'])
            ->get();

            for($i = 0; $i < count($optionalFields); $i++) {
                $optionalFields[$i]->optionValues = json_decode($optionalFields[$i]->optionValues);
                $extravalue = DB::table('extrainfos')
                ->where('formgroupId', $optionalFields[$i]->formgroupId)
                ->where('listingId', $itemId)
                ->select(['id', 'value'])
                ->first();
                if ($extravalue) {
                    $optionalFields[$i]->value= $extravalue->value;
                    $optionalFields[$i]->valueId = $extravalue->id;
                } else {
                    $optionalFields[$i]->value= NULL;
                    $optionalFields[$i]->valueId = NULL;
                }
            }
            if ($optionalFields) {
                $item['optionFields'] = $optionalFields;
            }
            //additonal parameters
            $item->url_object = 'listing';
            $item->meta_title = Meta::get_data_listing($itemId,'title');
            $item->meta_alt_text = Meta::get_data_listing($itemId,'alt_text');
            $item->meta_description = Meta::get_data_listing($itemId,'description');
            $item->meta_author = Meta::get_data_listing($itemId,'author');
            $item->meta_keyword = Meta::get_data_listing($itemId,'keyword');
            // $history = new History;
            // $history->description = History::where('object_id',$itemId)->get();
            $history = DB::table('history')
            ->where('object_id', $itemId)
            ->where('object_type', 'description')
            ->orderBy('created_at', 'desc')
            ->get();
            $v_images = DB::table('history')
            ->where('object_id', $itemId)
            ->where('object_type', 'images')
            ->orderBy('created_at', 'desc')
            ->get();

            // $request->session()->pull('edited', $item->id);
            // $request->session()->forget('edited'); // use it to reset.
            $curr_edited = Cache::get($item->id);
            if($curr_edited == ''){
                Cache::forever($item->id, 'edited'); // marked being edited.
            }
            // $request->session()->push('edited', $item->id); 

            return view('panel.product-edit', ['item' => $item,'history' => $history,'v_images' => $v_images] );
        }
    }

    public function exitPage($item){
        if (Cache::has($item)) {
            Cache::forget($item);
            $return = true;
        }else{
            $return = false;
        }
        return $return;
    }

    public function extra_rebuild($id){
        $item = DB::table('listings')
        ->where('id', $id)
        ->first();

        $optionalFields = DB::table('formfields')
        ->join('formgroups', 'formgroups.formfieldId', '=', 'formfields.id')
        ->join('forms', 'formgroups.formId', '=', 'forms.id')
        ->where('forms.categoryId', $item->categoryId)
        ->where('forms.languageId', 1)
        //->leftJoin('extrainfos', 'extrainfos.formgroupId', '=', 'formgroups.id')
        //->where('extrainfos.listingId', $itemId)
        ->select(['formfields.*', 'formgroups.id AS formgroupId'])
        ->get();

        var_dump($optionalFields);
    }

    public function products_delete($id) {
      $deteled = Listing::where('id', $id)
        ->where('userId', $this->user_id)
        ->update(['status' => 'EXPIRED']);
        //->delete();
      if ($deleted > 0) {
        echo json_encode((object) ['result'=> 1, 'itemId'=> $itemId ]);
      } else {
        echo json_encode((object) ['result'=> 0, 'message'=> 'Unable to delete item.']);
      }
    }

    public function product_delete($id){
        DB::table('listings')
            ->where('id', $id)
            ->update(['status' => 'EXPIRED']);

        return back();
    }

    public function upload(Request $request) {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                //Image is valid and exist
                $imageTempName = $request->file('image')->getClientOriginalName();
                $ext = pathinfo($imageTempName, PATHINFO_EXTENSION);
                $timestamp = date("Ymd-His");
                $upload_path = base_path() . '/public/temp/';
                $filename = $timestamp . '-luxify-' . Auth::user()->id .'.'. $ext;
                $moved_path = $upload_path . $filename;
                $request->file('image')->move($upload_path, $filename);
                return response()->json($filename);
            }
        }
    }

    public function cat_rebuild() {
        $cats = Categories::all();
        // var_dump($cats);

        foreach($cats as $cat){
            if(empty($cat->slug)){
                $slug = SlugService::createSlug(Categories::class, 'slug', $cat->title);
                $cat->slug = $slug;
                if($cat->save()){
                    echo $slug . '<br />';
                }else{
                    echo 'Booommmmm !!! <br />';
                }
            }else{
                echo 'Already has slug <br />';
            }
        }
    }

    public function listing_rebuild() {
        $lists = Listings::all();
        foreach($lists as $list){
            if(empty($list->slug)){
                $slug = SlugService::createSlug(Listings::class, 'slug', $list->title);
                $list->slug = $slug;
                if($list->save()){
                    echo $slug . '<br />';
                }else{
                    echo 'Booommmmm !!! <br />';
                }
                echo '<br>------------<br>';
            }else{
                echo 'Already has slug <br />';
            }
        }
    }

    public function user_rebuild() {
        $users = Users::where('companyName', '<>', NULL)->get();
        foreach($users as $user){
            if(empty($list->slug)){
                $slug = SlugService::createSlug(Users::class, 'slug', $user->companyName);
                $user->slug = $slug;
                if($user->save()){
                    echo $slug . '<br />';
                }else{
                    echo 'Booommmmm !!! <br />';
                }
                echo '<br>------------<br>';
            }else{
                echo 'Already has slug <br />';
            }
        }
    }

    public function currencyExec(){
        $listed = DB::table('currencies')
        ->get();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://openexchangerates.org/api/latest.json?app_id=9dfc90f4fd60462d9088aa0039ccb30d&base=USD');
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);
        // echo $result->access_token;

        $rates = $obj->rates;

        foreach($listed as $curr){
            $_curr = $curr->code;
            $rate = $rates->$_curr;
            DB::table('currencies')
            ->where('id', $curr->id)
            ->update(['rate' => $rate]);
        }
    }

    public function bulkActions() {
      $table = func::getVal('post', 'table');
      $ids = func::getVal('post', 'selectedIds');
      $action = func::getVal('post', 'bulkAction');
      $ref = func::getVal('post', 'ref');

      if ($table && $ids && $action ) {
        if (count($ids) > 0 ) {
          if ($table === 'listings') {
            switch ($action) {
              case 'delete':
                DB::table($table)
                  ->whereIn('id', $ids)
                  ->update(['status' => 'EXPIRED']);
              break;

              //TODO: As bulk approve/reject will send out massive confirm emails,
              //therefore, it will not be provided for now

//              case 'approve':
//                DB::table($table)
//                  ->whereIn('id', $ids)
//                  ->update(['status' => 'APPROVED']);
//              break;
//              case 'reject':
//                DB::table($table)
//                  ->whereIn('id', $ids)
//                  ->update(['status' => 'REJECTED']);
//              break;
            }
          } else if ($table === 'users') {
            switch ($action) {
              case 'delete':
                DB::table($table)
                  ->whereIn('id', $ids)
                  ->update(['isSuspended' => 1]);
              break;
            }
          }
        }
      }
      if ($ref) {
        return redirect($ref);
      } else {
        return redirect( Auth::user()->role === 'admin'? '/panel': '/dashboard');
      }
    }
    function createupdateslug($id,$slug){
        $newslug = SlugService::createSlug(Listings::class, 'slug', $slug);
        $updates = DB::table('listings')->where('id',$id)->update(['slug'=> $newslug]);
        if($updates){
            return $newslug;
        }else{
            return $newslug;
        }
/*        $newslug = Listings::newslug($id,$slug);
        $updates = DB::table('listings')->where('id',$id)->update(['slug'=> $newslug]);
        if($updates){
            return $newslug;
        }else{
            return $newslug;
        }*/
    }
    function createupdatesluguser($id,$slug){
        $newslug = SlugService::createSlug(Users::class, 'slug', $slug);
        //dd($newslug);
        $updates = DB::table('users')->where('id',$id)->update(['slug'=> $newslug]);
        if($updates){
            return $newslug;
        }else{
            return $newslug;
        }
    }
    public function IsEmailInUse(Request $request){
        $email = $request->input('email');

        $checkemail = DB::table('users')
                   ->where('email', $email)
                   ->first();

        return Response::json(['response' => $checkemail != null]);
	}

    function get_keyword_json(){
        $db_keyword = Meta::where('object_type','listings')->where('meta_key','keyword')->get();
        $keywords = array();
        foreach ($db_keyword as $value) {
            $explode = explode(',', $value['meta_value']);
            foreach ($explode as $value) {
                $keywords[] = $value;
            }
        }
        $array_unique = array_unique($keywords);
        return json_encode(array_values($array_unique));
    }
    function downloadImage($image){
        $filename ="https://s3-ap-southeast-1.amazonaws.com/luxify/images/" . $image;
            $buffer = file_get_contents($filename);
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . strlen($buffer));
            header("Content-Disposition: attachment; filename=$image");
            echo $buffer; 
    }
}
