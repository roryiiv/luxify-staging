<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

Use Auth;

use App\Categories;

use App\Listings;

use DB;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class Panel extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // make sure no guests

        $this->user_id = 585;
        if(Auth::user()){
            $this->user_id = Auth::user()->id;
            $this->user_role = Auth::user()->role;
        }
    }

    //Panel (super admin) Controller
    public function index() {
        // return 'panel index page';
        if($this->user_role == 'seller'){
            return view('home');
        }elseif($this->user_role == 'user'){
            return redirect('/dashboard/profile');
        }else{
            return redirect('/panel/users');
        }
    }

    public function users() {
        $filter = array();
        $filter_or = array();
        $filters = array();
        if(isset($_GET['txtCustomerName']) && !empty($_GET['txtCustomerName'])){
            $filter[] = ['firstName', 'like', $_GET['txtCustomerName']];
            $filter_or[] = ['lastName', 'like', $_GET['txtCustomerName']];
            $filters['txtCustomerName'] = $_GET['txtCustomerName'];
        }
        if(isset($_GET['ddlCustomerGroup']) && !empty($_GET['ddlCustomerGroup'])){
            $filter[] = ['role', $_GET['ddlCustomerGroup']];
            $filters['ddlCustomerGroup'] = $_GET['ddlCustomerGroup'];
        }
        if(isset($_GET['ddlApproved']) && !empty($_GET['ddlApproved'])){
            $filter[] = ['isSuspended', $_GET['ddlApproved']];
            $filters['ddlApproved'] = $_GET['ddlApproved'];
        }
        if(isset($_GET['txtEmail']) && !empty($_GET['txtEmail'])){
            $filter[] = ['email', $_GET['txtEmail']];
            $filters['txtEmail'] = $_GET['txtEmail'];
        }
        if(isset($_GET['ddlStatus']) && !empty($_GET['ddlStatus'])){
            $filter[] = ['isSuspended', $_GET['ddlStatus']];
            $filters['ddlStatus'] = $_GET['ddlStatus'];
        }

        $perpage = 10;

        if(isset($_GET['view-perpage']) && !empty($_GET['view-perpage'])){
            $perpage = $_GET['view-perpage'];
            if($perpage == -1){
                $users = DB::table('users')
                ->where($filter)
                ->orWhere($filter_or)
                ->orderby('created_at', 'desc')
                ->get();
            }else{
                $users = DB::table('users')
                ->where($filter)
                ->orWhere($filter_or)
                ->orderby('created_at', 'desc')
                ->paginate($perpage);
            }
        }else{
            $users = DB::table('users')
            ->where($filter)
            ->orWhere($filter_or)
            ->orderby('created_at', 'desc')
            ->paginate($perpage);
        }

        // var_dump($user);
        return view('panel.users', ['users' => $users, 'filters' => $filters]);
    }

    public function user_add($role) {
        return view('panel.add-user', ['role' => $role]);
    }

    public function user_register() {
        $user = new User; // always have it declared for first or else empty value sent

        //we push the image to S3 first.
        if(isset($_POST['cover_img']) && !empty($_POST['cover_img'])){
            $image = base_path() . '/public/temp/' . $_POST['cover_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['cover_img'];
            if($s3->put($filePath, file_get_contents($image), 'public')){
                $user->coverImageUrl = $_POST['cover_img'];
                unlink($image);
            }
        }
        if(isset($_POST['profile_img']) && !empty($_POST['profile_img'])){
            $image = base_path() . '/public/temp/' . $_POST['profile_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['profile_img'];
            if($s3->put($filePath, file_get_contents($image), 'public')){
                $user->companyLogoUrl = $_POST['profile_img'];
                unlink($image);
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

    public function user_confirm() {
        return 'users confirm method';
    }

    public function user_edit($id) {
        $user = DB::table('users')
        ->where('id', $id)
        ->first();
        return view('panel.edit-user', ['user' => $user]);
    }

    public function user_update() {
        $user = User::where('id', $_POST['user_id'])->first(); // always have it declared for first or else empty value sent

        //we push the image to S3 first.
        if(isset($_POST['cover_img']) && !empty($_POST['cover_img'])){
            $image = base_path() . '/public/temp/' . $_POST['cover_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['cover_img'];
            if($s3->put($filePath, file_get_contents($image), 'public')){
                $user->coverImageUrl = $_POST['cover_img'];
                unlink($image);
            }
        }
        if(isset($_POST['profile_img']) && !empty($_POST['profile_img'])){
            $image = base_path() . '/public/temp/' . $_POST['profile_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['profile_img'];
            if($s3->put($filePath, file_get_contents($image), 'public')){
                $user->companyLogoUrl = $_POST['profile_img'];
                unlink($image);
            }
        }


        $error_arr = array();

        if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
            $user->firstName = $_POST['first_name'];
        }
        if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
            $user->lastName = $_POST['last_name'];
        }
        if(isset($_POST['']) && !empty($_POST[''])){
            $user->lastName = $_POST['last_name'];
        }
        if(isset($_POST['']) && !empty($_POST[''])){
            $user->lastName = $_POST['last_name'];
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

    public function user_delete($user_id) {
        $user = User::where('id', $user_id)->first();
        $user->isSuspended = 1;
        $user->save();
        return redirect('/panel/users');
    }

    public function products() {
      if($this->user_role != 'admin') return redirect('/');
      $filter = array();
      //TODO: Searching is case incentive?
      if(isset($_GET['txtProductName']) && !empty($_GET['txtProductName'])){
          $filter[] = ['listings.title', 'like', $_GET['txtProductName']];
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
      $products = DB::table('listings')
      ->where($filter)
      ->join('currencies', 'listings.currencyId', '=', 'currencies.id')
      ->orderby('listings.created_at', 'asc')
      ->select('listings.*', 'currencies.code')
      ->paginate(10);

      // var_dump($wishes);
      $products->setPath($_SERVER['REQUEST_URI']);
      return view('panel.products', ['products' => $products]);
    }

    public function product_change_status() {
      $itemId = (isset($_POST['itemId']) && !empty($_POST['itemId'])) ? $_POST['itemId']: NULL;
      $status = (isset($_POST['status']) && !empty($_POST['status'])) ? $_POST['status']: NULL;
      if ($itemId && $status) {
        DB::table('listings')
          ->where('id', $itemId)
          ->update(['status' => $status]);
        $updated = DB::table('listings')
          ->where('id', $itemId) 
          ->select('status')
          ->first();

        if ($updated) {
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

    public function products_edit($itemId) {
      $item = Listings::where('id', $itemId)->first();
      if ($item) {
        $optionalFields = DB::table('formfields')
          ->join('formGroups', 'formGroups.formfieldId', '=', 'formfields.id')
          ->join('forms', 'formGroups.formId', '=', 'forms.id')
          ->where('forms.categoryId', $item->categoryId)
          ->where('forms.languageId', 1)
          //->leftJoin('extrainfos', 'extrainfos.formgroupId', '=', 'formGroups.id')
          //->where('extrainfos.listingId', $itemId)
          ->select(['formfields.*', 'formGroups.id AS formgroupId'])
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
        return view('panel.product_edit', ['item' => $item] );
      }
    }

    public function products_delete($id) {
      $deteled = Listing::where('id', $id)
        ->where('userId', $this->user_id)
        ->delete();
      if ($deleted > 0) {
        echo json_encode((object) ['result'=> 1, 'itemId'=> $itemId ]); 
      } else {
        echo json_encode((object) ['result'=> 0, 'message'=> 'Unable to delete item.']); 
      }
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
}
