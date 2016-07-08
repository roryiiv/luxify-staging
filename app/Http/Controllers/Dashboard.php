<?php

namespace App\Http\Controllers;

use Mail;

use App\User;
use App\Country;
use App\Listings;

Use Auth;

use Illuminate\Http\Request;

// use Illuminate\Contracts\Filesystem\Filesystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;

use App\Http\Requests;

Use Input;
Use DB;

class Dashboard extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // make sure no guests

        $this->user_id = 585;
        if(Auth::user()){
            $this->user_id = Auth::user()->id;
            $this->user_role = Auth::user()->role;
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if($this->user_role == 'seller'){
            // return view('dashboard.home');
            return redirect('/dashboard/products');
        }elseif($this->user_role == 'user'){
            return redirect('/dashboard/profile');
        }else{
            return redirect('/panel/users');;
        }
    }

    public function profile() {
        $user = User::where('id', $this->user_id)->first();
        // var_dump($user);
        return view('dashboard.profile', ['user' => $user]);
    }

    public function profile_update() {
        $user = User::where('id', $this->user_id)->first(); // always have it declared for first or else empty value sent

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
        if((isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) && (isset($_POST['txtConfirmPassword']) && !empty($_POST['txtConfirmPassword']))){
            if($_POST['txtPassword'] == $_POST['txtConfirmPassword']) {
                $error_arr['password'] = 'not yet implemented for updates.';
            }else{
                $error_arr['password'] = 'password not matching.';
            }
        }
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
            if($user->save()) return redirect('/dashboard/profile');
        }
    }

    public function products_add() {
      return view('dashboard.products-add');
    }

    public function products_edit($itemId) {
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
            return view('dashboard.products-edit', ['item' => $item] );
        }
    }

    public function product_add() {

        $error_arr = array();
        $newItem = new Listings;

        $newItem->userId = Auth::user()->id;

        // Always push to S3 first before doing anything else.
        if (isset($_POST['images']) && count($_POST['images']) > 0 ) {
            $uploadedImage = array();
            for($i =0 ;  $i < count($_POST['images']); $i++) {
                $image = base_path() . '/public/temp/' . $_POST['images'][$i];
                $s3 = \Storage::disk('s3');
                $filePath = '/images/' . $_POST['images'][$i];
                if($s3->put($filePath, file_get_contents($image), 'public')){
                    $uploadedImage[] = $_POST['images'][$i];
                    unlink($image);
                }
            }

            if (count($uploadedImage) === count($_POST['images'])) {
                if (isset($_POST['mainImage']) && !empty($_POST['mainImage'])) {
                    $newItem->mainImageUrl = array_slice($uploadedImage, intval($_POST['mainImage']), 1)[0];
                    array_splice($uploadedImage, intval($_POST['mainImage']), 1);
                    $newItem->images = json_encode($uploadedImage);
                } else {
                    $newItem->mainImageUrl = $uploadedImage[0];
                    array_splice($uploadedImage, 0, 1);
                    $newItem->images = json_encode($uploadedImage);
                }
            } else {
                $error_arr['images'] = 'Error in uploaded images.';
            }
        }

        if ( isset($_POST['itemLocation']) && !empty($_POST['itemLocation']) ) {
            $newItem->countryId = $_POST['itemLocation'];
        } else {
            $error_arr['itemLocation'] = 'Item Location is not specified.';
        }

        if ( isset($_POST['itemAvailability']) && !empty($_POST['itemAvailability']) ) {
            $newItem->availableToId = $_POST['itemAvailability'] == 'worldwide' ? NULL: $_POST['itemLocation'];
        } else {
            $error_arr['itemAvailability'] = 'Item Availability is not specified.';
        }

        if ( isset($_POST['itemCategory']) && !empty($_POST['itemCategory']) ) {
            $newItem->categoryId = $_POST['itemCategory'];
        } else {
            $error_arr['itemCategory'] = 'Item Category is not specified.';
        }

        if ( isset($_POST['title']) && !empty($_POST['title']) ) {
            $newItem->title = $_POST['title'];
            $newItem->slug = SlugService::createSlug(Listings::class, 'slug', $_POST['title']);
        } else {
            $error_arr['title'] = 'Item title is required.';
        }

        if ( isset($_POST['priceOnRequest']) && !empty($_POST['priceOnRequest']) && $_POST['priceOnRequest'] === 'on' ) {
            $newItem->price = NULL;
        } else {
            if (isset($_POST['price']) && !empty($_POST['price'])) {
                $newItem->price = $_POST['price'];
            } else {
                $error_arr['price'] = 'Item price is required.';
            }
        }

        if ( isset($_POST['currency']) && !empty($_POST['currency']) ) {
            $newItem->currencyId = $_POST['currency'];
        } else {
            $error_arr['currency'] = 'Item currency is required.';
        }

        if ( isset($_POST['description']) && !empty($_POST['description']) ) {
            $newItem->description = $_POST['description'];
        } else {
            $error_arr['description'] = 'Item description is required.';
        }

        if (isset($_POST['condition']) && !empty($_POST['condition']) ) {
            $newItem->condition= $_POST['condition'];
        } else {
            $error_arr['condition'] = 'Item condition is required.';
        }

        if (isset($_POST['expiryDate'])) {
            $newItem->expired_at = Carbon::createFromFormat('Y-m-d', $_POST['expiryDate']);
        }

        if (isset($_POST['buyNowURL']) && !empty($_POST['buyNowURL'])) {
            $newItem->buyNowUrl = $_POST['buyNowURL'];
        }

        if (isset($_POST['aerialLookURL']) && !empty($_POST['aerialLookURL'])) {
            $newItem->aerialLookUrl = $_POST['aerialLookURL'];
        }

        if (isset($_POST['aerial3DLookURL']) && !empty($_POST['aerial3DLookURL'])) {
            $newItem->aerialLook3DUrl = $_POST['aerial3DLookURL'];
        }

        $newItem->status = 'PENDING';

        if (!empty($error_arr)) {
            echo json_encode($error_arr);
        } else {
            if ($newItem->save()) {
                $form = DB::table('forms')
                ->where('categoryId', $newItem->categoryId)
                ->where('languageId', 1)
                ->first();
                if ($form) {
                    foreach ($_POST['optionfields'] as $key => $value) {
                        $formGroup = DB::table('formgroups')
                        ->where('formId', $form->id)
                        ->where('formfieldId', $key)
                        ->first();
                        if ($formGroup && !empty($value)) {
                            DB::insert('insert into extrainfos (formgroupId, listingId, value) values (?, ?, ?)', array($formGroup->id, $newItem->id, $value));
                        }
                    }
                }
                // debug
                $username_to = Auth::user()->username;
                $listing_title = $_POST['title'];
                $details = array('to' => Auth::user()->email);
                Mail::send('emails.luxify-listing-review-en-us', ['username_to' => $username_to, 'listing_title' => $listing_title], function ($message) use ($details){

                    $message->from('technology@luxify.com', 'Luxify Admin');
                    $message->subject('We are reviewing your listing.');
                    $message->replyTo('no_reply@luxify.com', $name = null);
                    $message->to($details['to']);

                });
                // var_dump($newItem); exit;
                return redirect('/dashboard/products');
            }
        }

    }

    public function product_edit($itemId) {
        $item = Listings::where('id', $itemId)->first();
        $error_arr = array();

        $item->userId = Auth::user()->id;

        if ( isset($_POST['itemLocation']) && !empty($_POST['itemLocation']) ) {
            $item->countryId = $_POST['itemLocation'];
        } else {
            $error_arr['itemLocation'] = 'Item Location is not specified.';
        }

        if ( isset($_POST['itemAvailability']) && !empty($_POST['itemAvailability']) ) {
            $item->availableToId = $_POST['itemAvailability'] == 'worldwide' ? NULL: $_POST['itemLocation'];
        } else {
            $error_arr['itemAvailability'] = 'Item Availability is not specified.';
        }

        if ( isset($_POST['itemCategory']) && !empty($_POST['itemCategory']) ) {
            $item->categoryId = $_POST['itemCategory'];
        } else {
            $error_arr['itemCategory'] = 'Item Category is not specified.';
        }

        if ( isset($_POST['title']) && !empty($_POST['title']) ) {
            $item->title = $_POST['title'];
            $item->slug = SlugService::createSlug(Listings::class, 'slug', $_POST['title']);
        } else {
            $error_arr['title'] = 'Item title is required.';
        }

        if ( isset($_POST['priceOnRequest']) && !empty($_POST['priceOnRequest']) && $_POST['priceOnRequest'] === 'on' ) {
            $item->price = NULL;
        } else {
            if (isset($_POST['price']) && !empty($_POST['price'])) {
                $item->price = intval($_POST['price']);
            } else {
                $error_arr['price'] = 'Item price is required.';
            }
        }

        if ( isset($_POST['currency']) && !empty($_POST['currency']) ) {
            $item->currencyId = $_POST['currency'];
        } else {
            $error_arr['currency'] = 'Item currency is required.';
        }

        if ( isset($_POST['status']) && !empty($_POST['status']) ) {
            $item->status = $_POST['status'];
        } else {
            $error_arr['status'] = 'Item status is required.';
        }

        if ( isset($_POST['description']) && !empty($_POST['description']) ) {
            $item->description = $_POST['description'];
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
            $s3 = \Storage::disk('s3');
            $uploadedImage = array();
            for($i =0 ;  $i < count($_POST['images']); $i++) {
                if (!$s3->has('/images/'. $_POST['images'][$i])) {
                    $image = base_path() . '/public/temp/' . $_POST['images'][$i];
                    $filePath = '/images/' . $_POST['images'][$i];
                    if($s3->put($filePath, file_get_contents($image), 'public')){
                        $uploadedImage[] = $_POST['images'][$i];
                        unlink($image);
                    }
                } else {
                    $uploadedImage[] = $_POST['images'][$i];
                }
            }

            if (count($uploadedImage) === count($_POST['images'])) {
                if (isset($_POST['mainImage']) && !empty($_POST['mainImage'])) {
                    $item->mainImageUrl = array_slice($uploadedImage, intval($_POST['mainImage']), 1)[0];
                    array_splice($uploadedImage, intval($_POST['mainImage']), 1);
                    $item->images = json_encode($uploadedImage);
                } else {
                    $item->mainImageUrl = $uploadedImage[0];
                    array_splice($uploadedImage, 0, 1);
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

        // delete the existing optional fields first
        DB::table('extrainfos')->where('listingId', $item->id )->delete();
        $form = DB::table('forms')
        ->where('categoryId', $item->categoryId)
        ->where('languageId', 1)
        ->first();
        if ($form) {
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

        if(!empty($error_arr)){
            echo json_encode($error_arr);
        }else{
            if ($item->save()) {
                return redirect('/dashboard/product/edit/'.$item->id);
            }
        }
    }

    public function wishlistDelete($id) {
        $userId = Auth::user()->id;

        DB::table('wishlists')
        ->where('userId', $userId)
        ->where('listingId', $id)
        ->update(['updatedAt' => date("Y-m-d H:i:s"), 'deleted' => 1]);

        // var_dump($delete); exit;

        return redirect('/dashboard/wishlist');
    }

    public function wishlist() {
        $filter = array();
        $filter[] = ['wishlists.userId', $this->user_id];
        $filter[] = ['deleted', 0];
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
            $filter[] = ['wishlists.createdAt', '>=', $a];
            $filter[] = ['wishlists.createdAt', '<=', $b];
        }
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $filter[] = ['listings.status', $_GET['status']];
        }
        $wishes = DB::table('wishlists')
        ->join('listings', 'wishlists.listingId','=', 'listings.id')
        ->select('listings.id', 'listings.title', 'listings.slug', 'wishlists.createdAt', 'listings.mainImageUrl', 'listings.price', 'listings.status')
        ->where($filter)
        ->orderby('wishlists.createdAt', 'asc')
        ->paginate(10);

        // var_dump($wishes);
        $wishes->setPath($_SERVER['REQUEST_URI']);
        return view('dashboard.wishlist', ['wishes' => $wishes]);
    }

    public function product_delete($id){
        DB::table('listings')
            ->where('id', $id)
            ->update(['status' => 'EXPIRED']);

        return redirect('/dashboard/products');
    }

    public function products() {
        if($this->user_role != 'seller') return redirect('/');
        $filter = array();
        $filter[] = ['listings.userId', $this->user_id];
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
            // $filter[] = ['listings.created_at', '>=', $a];
            // $filter[] = ['listings.created_at', '<=', $b];
        }
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $filter[] = ['listings.status', $_GET['status']];
        }
        $products = DB::table('listings')
        ->where($filter)
        ->orderby('listings.created_at', 'asc')
        ->paginate(10);

        // var_dump($wishes);
        $products->setPath($_SERVER['REQUEST_URI']);
        return view('dashboard.products', ['products' => $products]);
    }

    public function mailbox() {
        $conv = DB::table('conversations')
        ->where('toUserId', $this->user_id)
        ->where('readAt', NULL)
        ->orderby('sentAt', 'desc')
        ->groupBy('fromUserId')
        ->paginate(10);

        return view('dashboard.mailbox', ['conv', $conv]);
    }

    public function remove_image() {
        $onS3 = $_POST['onS3'];
        if ($onS3 === 'true') {
            $s3 = \Storage::disk('s3');
            if( $s3->has('/images/'. $_POST['filename'])) {
                if ($s3->delete('/images/'. $_POST['filename'])) {

                    // instanely update the image array of the listing
                    $item = Listings::where('id', $_POST['itemId'])->first();
                    $oldImages = [];
                    $mainImageRemoved = false;
                    $otherImages = json_decode($item->images);
                    for($i = 0; $i < count($otherImages); $i++) {
                        $oldImages[] = array('mainImage' => false, 'filename'=> $otherImages[$i]);
                    }
                    $oldImages[] = array('mainImage' => true, 'filename'=> $item->mainImageUrl);
                    for ( $i = 0; $i < count($oldImages); $i++ ) {
                        if($oldImages[$i]['filename'] === $_POST['filename']) {
                            if ($oldImages[$i]['mainImage']) {
                                $mainImageRemoved = true;
                            }
                            array_splice($oldImages, $i, 1);
                        }
                    }
                    // if main image is removed, replace with first image of otherImages
                    if ($mainImageRemoved) {
                        if (count($oldImages) ===  0 ) {
                            $item->mainImageUrl = NULL;
                        } else {
                            $item->mainImageUrl = $oldImages[0]['filename'];
                            array_splice($oldImages, 0, 1);
                        }
                    } else {
                        // if main image is not remove, take out main image from oldImages
                        for ($i = 0; $i < count($oldImages); $i++) {
                            if ($oldImages[$i]['filename'] === $item->mainImageUrl) {
                                array_splice($oldImages, $i, 1);
                            }
                        }
                    }
                    $newOtherImages = [];
                    for ($i = 0; $i < count($oldImages); $i++) {
                        $newOtherImages[] = $oldImages[$i]['filename'];
                    }
                    $item->images = json_encode($newOtherImages);
                    $item->save();
                    echo json_encode((object) ['result' => 1, 'message' => 'Image is removed on S3.']);
                } else {
                    echo json_encode((object) ['result' => 0, 'message' => 'Unable to deleted image in S3.']);
                }
            } else {
                echo json_encode((object) ['result' => 0, 'message' => 'Image is not existed on S3.']);
            }
        } else {
            $image = base_path() . '/public/temp/' . $_POST['filename'];
            if (file_exists($image)) {
                unlink($image);
                echo json_encode((object) ['result' => 1, 'message' => 'Image is removed.']);
            } else {
                echo json_encode((object) ['result' => 0, 'message' => 'Image does not exist.']);
            }
        }
    }
    public function multiple_upload(Request $request) {

        // $files = Input::file('file');

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            // $originName = $request->file('file')[0]->getClientOriginalName();
            if(count($files) > 0){
                for($i = 0; $i < count($files); $i++) {
                    $originName = $files[$i]->getClientOriginalName();
                    $ext = pathinfo($originName, PATHINFO_EXTENSION);
                    $size = $files[$i]->getSize();
                    $timestamp = date("Ymd-His");
                    $upload_path = base_path() . '/public/temp/';
                    $filename = $timestamp . '-luxify-' . Auth::user()->id.'-'. $size .'.'. $ext;
                    $files[$i]->move($upload_path, $filename);
                    $successFiles[] = array('filename' => $filename, 'size'=> $size, 'path'=>'/temp/'.$filename );
                }
            }
            return response()->json($successFiles);
        }

        // echo var_dump($files[0]); exit();
        // if (count($files) > 0) {
        //     $successFiles = array();
        //     for($i = 0; $i < count($files); $i++) {
        //         // $originName = $files[$i]->getClientOriginalName();
        //         // $ext = pathinfo($originName, PATHINFO_EXTENSION);
        //         // $size = $files[$i]->getSize();
        //         // $timestamp = date("Ymd-His");
        //         // $upload_path = base_path() . '/public/temp/';
        //         // $filename = $timestamp . '-luxify-' . Auth::user()->id.'-'. uniqid() .'.'. $ext;
        //         // $files[$i]->move($upload_path, $filename);
        //         // $successFiles[] = array('filename' => $filename, 'size'=> $size, 'path'=>'/temp/'.$filename );
        //     }
        //     // echo json_encode($successFiles);
        //     return response()->json($request);
        // }

    }

    public function single_upload(Request $request) {
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

    public function supportSend(Request $request){
        $input = $request->all();
        if(isset($input['_token'])){
            $details = array();
            if(isset($input['supportSubject']) && !empty($input['supportSubject'])){
                $support_subject = $input['supportSubject'];
            }else{
                $support_subject = 'No Subject';
            }
            if(isset($input['supportMessage']) && !empty($input['supportMessage'])){
                $support_msg = $input['supportMessage'];
            }else{
                $support_msg = 'Empty';
            }
            $details = array('replyTo' => Auth::user()->email);
            $username_from = Auth::user()->username;
            Mail::send('emails.support-en-us', ['username_from' => $username_from, 'support_subject' => $support_subject, 'support_msg' => $support_msg], function ($message) use ($details){

                $message->from('technology@luxify.com', 'Luxify Admin');
                $message->subject('We are reviewing your listing.');
                $message->replyTo($details['replyTo'], $name = null);
                $message->to('concierge@luxify.com', 'Luxify Support');

            });
        }
        // var_dump($input); exit;
        return back();
    }
}
