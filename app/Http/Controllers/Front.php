<?php

namespace App\Http\Controllers;

Use Mail;

use App\Categories;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Listings;

use App\User;

use Illuminate\Support\Facades\Auth;

use DB;

use func;

use Illuminate\Routing\Controller;

class Front extends Controller {
    //Front end Controller
    public function index() {
        // return 'index page';
        // $listings = DB::table('listings')->orderBy('created_at', 'desc')->take(8)->get();
        return view('index');
    }

    public function products() {
        $listings = DB::table('listings')->orderBy('created_at', 'desc')->paginate(16);
        return view('listings', ['listings' => $listings]);
    }

    public function product_details($slug) {

        $childs = array(
            'estates' => array(50,69,16,52,72),
            'apartment' => array(126,51,49),
            'house' => array(48),
            'land' => array(53,54),
            'others' => array(47,138,57,56,127,15),
            'antique_jewelry' => array(149),
            'jewelry' => array(10,110,109,108,39,107,38,37),
            'watch' => array(36,106,105,89,34,33,31),
            'cars' => array(2,11,20,19,60,55,18),
            'classics' => array(66),
            'motorbike' => array(17),
            'accessories_men' => array(92.88),
            'accessories_women' => array(124, 160, 150, 120,119,118,117,161,159,116),
            'bags' => array(9,43,114,113,42,41,112,111,91,137),
            'experiences' => array(3,162,169,165,99,97,167,164,166,98,95,96,163,94),
            'collectibles' => array(1,46,68,67,168,136,64, 70, 61,131,130,90),
            'furnitures' => array(146, 79, 144, 63, 133, 62, 71, 93),
            'motor' => array(40,25,24,23,85,76),
            'sail' => array(22,24),
            'jet' => array(45),
            'helicopter' => array(125, 13),
            'art' => array(12,59,58,129,128),
            'antiques' => array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,),
            'fine_wines' => array(35,26,30,28,87,29),
            'spirits' => array(100,101,170,171,102,103,172,173,104),
            'champagne' => array(27)
        );

        $cat_ids = array();
        $cat_ids['real-estates'] = array_merge($childs['estates'],$childs['apartment'],$childs['house'],$childs['land'],$childs['others'], array('cat_title' => 'Real Estates'));
        $cat_ids['jewellery-watches'] = array_merge($childs['antique_jewelry'],$childs['jewelry'],$childs['watch'], array('cat_title' => 'Watches &amp; Jewelry'));
        $cat_ids['motors'] = array_merge($childs['cars'],$childs['classics'],$childs['motorbike'], array('cat_title' => 'Motors'));
        $cat_ids['handbags-accessories'] = array_merge($childs['accessories_men'],$childs['accessories_women'],$childs['bags'], array('cat_title' => 'Handbags &amp; Accessories'));
        $cat_ids['experiences'] = array_merge($childs['experiences'], array('cat_title' => 'Experiences'));
        $cat_ids['collectibles-furnitures'] = array_merge($childs['collectibles'],$childs['furnitures'], array('cat_title' => 'Collectibles &amp; Furnitures'));
        $cat_ids['yachts'] = array_merge($childs['motor'],$childs['sail'], array('cat_title' => 'Yachts'));
        $cat_ids['aircrafts'] = array_merge($childs['jet'],$childs['helicopter'], array('cat_title' => 'Aircrafts'));
        $cat_ids['art-antiuques'] = array_merge($childs['art'],$childs['antiques'], array('cat_title' => 'Art &amp; Antiques'));
        $cat_ids['fine-wines-spirits'] = array_merge($childs['fine_wines'],$childs['spirits'],$childs['champagne'], array('cat_title' => 'Fine Wines &amp; Spirits'));

        // var_dump($cat_ids); exit;

        $listing = DB::table('listings')
        ->where('slug', $slug)
        ->join('countries', 'countries.id', '=', 'listings.countryId')
        ->select('listings.*', 'countries.name as country')
        ->first();

        if ($listing) {
            $category = array();
            foreach($cat_ids as $key => $val){
                if(in_array($listing->categoryId, $val)){
                    $category['slug'] = $key;
                    // var_dump($val); exit;
                    $category['title'] = $val['cat_title'];
                }
            }
            // var_dump($category); exit;
            $mores = DB::table('listings')
            ->where('userId', $listing->userId)
            ->where('status', 'APPROVED')
            ->join('countries', 'countries.id', '=', 'listings.countryId')
            ->select('listings.*', 'countries.name as country')
            ->paginate(10);

            $infos = DB::table('formfields')
            ->join('formgroups', 'formgroups.formfieldId', '=', 'formfields.id')
            ->join('forms', 'formgroups.formId', '=', 'forms.id')
            ->where('forms.categoryId', $listing->categoryId)
            ->where('forms.languageId', 1)
            ->leftJoin('extrainfos', 'formgroups.id', '=', 'extrainfos.formgroupId')
            ->where('extrainfos.listingId', $listing->id)
            ->select('forms.name', 'formfields.label', 'extrainfos.value')
            ->get();


            $relates = DB::table('listings')
            ->where('categoryId', $listing->categoryId)
            ->where('status', 'APPROVED')
            ->orWhere('title', 'like', '%'.$listing->title.'%')
            ->orWhere('description', 'like', '%'.$listing->title.'%')
            ->join('countries', 'countries.id', '=', 'listings.countryId')
            ->select('listings.*', 'countries.name as country')
            ->paginate(10);

          return view('listing', ['listing' => $listing,'infos'=> $infos, 'mores' => $mores, 'relates' => $relates, 'category' => $category]);
        }
    }

    public function categories() {
        return 'product categories page';
    }

    public function product_categories($id) {
        $childs = array(
            'estates' => array(50,69,16,52,72),
            'apartment' => array(126,51,49),
            'house' => array(48),
            'land' => array(53,54),
            'others' => array(47,138,57,56,127,15),
            'antique_jewelry' => array(149),
            'jewelry' => array(10,110,109,108,39,107,38,37),
            'watch' => array(36,106,105,89,34,33,31),
            'cars' => array(2,11,20,19,60,55,18),
            'classics' => array(66),
            'motorbike' => array(17),
            'accessories_men' => array(92.88),
            'accessories_women' => array(124, 160, 150, 120,119,118,117,161,159,116),
            'bags' => array(9,43,114,113,42,41,112,111,91,137),
            'experiences' => array(3,162,169,165,99,97,167,164,166,98,95,96,163,94),
            'collectibles' => array(1,46,68,67,168,136,64, 70, 61,131,130,90),
            'furnitures' => array(146, 79, 144, 63, 133, 62, 71, 93),
            'motor' => array(40,25,24,23,85,76),
            'sail' => array(22,24),
            'jet' => array(45),
            'helicopter' => array(125, 13),
            'art' => array(12,59,58,129,128),
            'antiques' => array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,),
            'fine_wines' => array(35,26,30,28,87,29),
            'spirits' => array(100,101,170,171,102,103,172,173,104),
            'champagne' => array(27)
        );
        switch($id){
            case 'real-estates':
            $cat_ids = array_merge($childs['estates'],$childs['apartment'],$childs['house'],$childs['land'],$childs['others']);
            $banner = 'realestate.jpg';
            $title_cat = 'Real Estates';
            break;
            case 'jewellery-watches':
            $cat_ids = array_merge($childs['antique_jewelry'],$childs['jewelry'],$childs['watch']);
            $banner = 'watches_banner.jpg';
            $title_cat = 'Watches &amp; Jewelry';
            break;
            case 'motors':
            $cat_ids = array_merge($childs['cars'],$childs['classics'],$childs['motorbike']);
            $banner = 'motors_banner.jpg';
            $title_cat = 'Motors';
            break;
            case 'handbags-accessories':
            $cat_ids = array_merge($childs['accessories_men'],$childs['accessories_women'],$childs['bags']);
            $banner = 'bags_banner_bk.jpg';
            $title_cat = 'Handbags &amp; Accessories';
            break;
            case 'experiences':
            $cat_ids = array_merge($childs['experiences']);
            $banner = 'experience_banner.jpg';
            $title_cat = 'Experiences';
            break;
            case 'collectibles-furnitures':
            $cat_ids = array_merge($childs['collectibles'],$childs['furnitures']);
            $banner = 'collectibles_furnitures.jpg';
            $title_cat = 'Collectibles &amp; Furnitures';
            break;
            case 'yachts':
            $cat_ids = array_merge($childs['motor'],$childs['sail']);
            $banner = 'new_yacht.jpg';
            $title_cat = 'Yachts';
            break;
            case 'aircrafts':
            $cat_ids = array_merge($childs['jet'],$childs['helicopter']);
            $banner = 'aircraft.jpg';
            $title_cat = 'Aircrafts';
            break;
            case 'art-antiques':
            $cat_ids = array_merge($childs['art'],$childs['antiques']);
            $banner = 'arts_banner.jpg';
            $title_cat = 'Art &amp; Antiques';
            break;
            case 'fine-wines-spirits':
            $cat_ids = array_merge($childs['fine_wines'],$childs['spirits'],$childs['champagne']);
            $banner = 'wine_banner.jpg';
            $title_cat = 'Fine Wines &amp; Spirits';
            break;
        }

        // $title_cat = ucwords(str_replace('-', ' ', $id));

        $search_arr = array();
        // $search_arr[] = ['categoryId', $_cat->id];
        // $search_arr[] = ['status', 'APPROVED'];

        $orderby = 'created_at';
        $order = 'desc';
        $filters = array();

        if(isset($_REQUEST['filters']) && $_REQUEST['filters'] == 'on'){
            $_filter = $_REQUEST;
            // var_dump($_filter); exit;

            if(!empty($_filter['location']) && $_filter['location'] != 'Location'){
                $search_arr[] = ['countryId', $_filter['location']];
                $filters['location'] = $_filter['location'];
            }

            // var_dump($price_range); exit;
            if(isset($_filter['category']) && $_filter['category'] != 'Category'){
                unset($cat_ids);
                $cat_ids = array();
                if(isset($_filter['sub_category']) && !empty($_filter['sub_category'])){
                    // var_dump($childs['classics']);
                    $sub_category = $_filter['sub_category'];
                    // var_dump($sub_category);
                    switch($sub_category){
                        case 'estates':
                        $cat_ids = array(50,69,16,52,72);
                        break;
                        case 'apartment':
                        $cat_ids = array(126,51,49);
                        break;
                        case 'house':
                        $cat_ids =array(48);
                        break;
                        case 'land':
                        $cat_ids = array(53,54);
                        break;
                        case 'others':
                        $cat_ids = array(47,138,57,56,127,15);
                        break;
                        case 'antique_jewelry':
                        $cat_ids = array(149);
                        break;
                        case 'jewelry':
                        $cat_ids = array(10,110,109,108,39,107,38,37);
                        break;
                        case 'watch':
                        $cat_ids = array(36,106,105,89,34,33,31);
                        break;
                        case 'cars':
                        $cat_ids = array(2,11,20,19,60,55,18);
                        break;
                        case 'classics':
                        $cat_ids = array(66);
                        break;
                        case 'motorbike':
                        $cat_ids = array(17);
                        break;
                        case 'accessories_men':
                        $cat_ids = array(92.88);
                        break;
                        case 'accessories_women':
                        $cat_ids = array(124, 160, 150, 120,119,118,117,161,159,116);
                        break;
                        case 'bags':
                        $cat_ids = array(9,43,114,113,42,41,112,111,91,137);
                        break;
                        case 'experiences':
                        $cat_ids = array(3,162,169,165,99,97,167,164,166,98,95,96,163,94);
                        break;
                        case 'collectibles':
                        $cat_ids = array(1,46,68,67,168,136,64, 70, 61,131,130,90);
                        break;
                        case 'furnitures':
                        $cat_ids = array(146, 79, 144, 63, 133, 62, 71, 93);
                        break;
                        case 'motor':
                        $cat_ids = array(40,25,24,23,85,76);
                        break;
                        case 'sail':
                        $cat_ids = array(22,24);
                        break;
                        case 'jet':
                        $cat_ids = array(45);
                        break;
                        case 'helicopter':
                        $cat_ids = array(125, 13);
                        break;
                        case 'art':
                        $cat_ids = array(12,59,58,129,128);
                        break;
                        case 'antiques':
                        $cat_ids = array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,);
                        break;
                        case 'fine_wines':
                        $cat_ids = array(35,26,30,28,87,29);
                        break;
                        case 'spirits':
                        $cat_ids = array(100,101,170,171,102,103,172,173,104);
                        break;
                        case 'champagne':
                        $cat_ids = array(27);
                        break;
                    }
                    // var_dump($cat_ids); exit;
                }else{
                    switch($_filter['category']){
                        case 'real-estates':
                        $cat_ids = array_merge($childs['estates'],$childs['apartment'],$childs['house'],$childs['land'],$childs['others']);
                        $banner = 'banner-estate.jpg';
                        break;
                        case 'jewellery-watches':
                        $cat_ids = array_merge($childs['antique_jewelry'],$childs['jewelry'],$childs['watch']);
                        $banner = 'watches_banner.jpg';
                        break;
                        case 'motors':
                        $cat_ids = array_merge($childs['cars'],$childs['classics'],$childs['motorbike']);
                        $banner = 'motors_banner.jpg';
                        break;
                        case 'handbags-accessories':
                        $cat_ids = array_merge($childs['accessories_men'],$childs['accessories_women'],$childs['bags']);
                        $banner = 'bags_banner_bk.jpg';
                        break;
                        case 'experiences':
                        $cat_ids = array_merge($childs['experiences']);
                        $banner = 'experience_banner.jpg';
                        break;
                        case 'collectibles-furnitures':
                        $cat_ids = array_merge($childs['collectibles'],$childs['furnitures']);
                        $banner = 'Collectibles_banner.jpg';
                        break;
                        case 'yachts':
                        $cat_ids = array_merge($childs['motor'],$childs['sail']);
                        $banner = 'banner-whyluxify.jpg';
                        break;
                        case 'aircrafts':
                        $cat_ids = array_merge($childs['jet'],$childs['helicopter']);
                        $banner = 'about-banner.jpg';
                        break;
                        case 'art-antiques':
                        $cat_ids = array_merge($childs['art'],$childs['antiques']);
                        $banner = 'arts_banner.jpg';
                        break;
                        case 'fine-wines-spirits':
                        $cat_ids = array_merge($childs['fine_wines'],$childs['spirits'],$childs['champagne']);
                        $banner = 'wine_banner.jpg';
                        break;
                    }
                    // var_dump($cat_ids); exit;
                }
                $filters['category'] = $_filter['category'];
            }
            if(!empty($_filter['sort-radio'])){
                switch($_filter['sort-radio']){
                    case 'latest':
                    $orderby = 'created_at';
                    $order = 'desc';
                    break;
                    case 'priceUp':
                    $orderby = 'price';
                    $order = 'desc';
                    break;
                    case 'priceDown':
                    $orderby = 'price';
                    $order = 'asc';
                    break;
                }
                $filters['sort'] = $_filter['sort-radio'];
            }

            if(isset($_REQUEST['use_price']) && $_REQUEST['use_price'] == 'on'){ // need to be put last to filter out the price range based on currency set.
                $use_price =  true;
                $filters['use_price'] = 'on';

                $price_lists = DB::table('listings')
                ->where('status', 'APPROVED')
                ->whereIn('categoryId', $cat_ids)
                ->where($search_arr)
                ->join('countries', 'countries.id', '=', 'listings.countryId')
                ->select('listings.*', 'countries.name as country')
                ->get();

                if($use_price && !empty($_REQUEST['range'])){
                    $price_range = explode(';', $_REQUEST['range']);
                    $filtered_listing = array();
                    foreach($price_lists as $key => $val){
                        $price_set = $val->price;
                        $currency = DB::table('currencies')->where('id', $val->currencyId)->first();
                        $set_curr = $currency->code;
                        $sess_curr = null !== session('currency') ? session('currency') : 'USD';
                        $session_currency = DB::table('currencies')->where('code', $sess_curr)->first();
                        if($set_curr != $sess_curr){
                            $price_sql = $price_set / $currency->rate;
                            $price = $price_sql * $session_currency->rate;
                        }else{
                            $price = $price_set;
                        }

                        if($price < $price_range[0] || $price > $price_range[1]){
                            // echo $key . ', ';
                            $filtered_listing[] = $val->id;
                        }

                    }
                    // var_dump($filtered_listing); exit;
                    // $search_arr[] = ['price', '>=', $price_range[0]];
                    // $search_arr[] = ['price', '<=', $price_range[1]];
                    $filters['range'] = $_REQUEST['range'];
                }
            }else{
                $use_price =  false;
                $filters['use_price'] = 'off';
            }
        }

        // var_dump($cat_ids); exit;
        if(isset($filtered_listing)){
            // var_dump($filtered_listing); exit;
            $listings = DB::table('listings')
            ->where('status', 'APPROVED')
            ->whereIn('categoryId', $cat_ids)
            ->whereNotIn('id', $filtered_listing)
            ->where($search_arr)
            ->orderBy($orderby, $order)
            ->join('countries', 'countries.id', '=', 'listings.countryId')
            ->select('listings.*', 'countries.name as country')
            ->paginate(12);
        }else{
            $listings = DB::table('listings')
            ->where('status', 'APPROVED')
            ->whereIn('categoryId', $cat_ids)
            ->where($search_arr)
            ->orderBy($orderby, $order)
            ->join('countries', 'countries.id', '=', 'listings.countryId')
            ->select('listings.*', 'countries.name as country')
            ->paginate(12);
        }


        $listings->setPath($_SERVER['REQUEST_URI']);

        return view('category', ['listings' => $listings, 'title_cat' => $title_cat, 'banner' => $banner, 'filters' => $filters]);
    }

    public function categories_optional_fields($catId, $langId = 1) {
        $form = DB::table('forms')->where('categoryId', $catId)->where('languageId', $langId)->first();
        if ($form) {
            $fields = DB::table('formgroups')
            ->where('formId', $form->id)
            ->join('formfields', 'formgroups.formfieldId', '=', 'formfields.id')
            ->select('formfields.*')
            ->get();
            $fieldsArray = array_map(function($item) {
                return (array) $item;
            }, $fields);

            if ($fieldsArray) {
                for ( $i = 0; $i < count($fieldsArray); $i++) {
                    if ($fieldsArray[$i]['optionValues']) {
                        $fieldsArray[$i]['optionValues'] = json_decode($fieldsArray[$i]['optionValues']);
                    } else {
                        $fieldsArray[$i]['optionValues'] = array();
                    }
                }
                echo json_encode((object) ['result'=> 1, 'data'=>$fieldsArray]);
            }
        }
    }

    public function product_brands($name) {
        return 'product brands page';
    }

    public function contact_us() {
        return 'contact us page';
    }

    public function login() {
        if(Auth::user()){
            return redirect('/dashboard');
        }else{
            return view('auth.login');
        }

    }

    public function register() {
        if(Auth::user()){
            return redirect('/dashboard');
        }else{
            return view('auth.register');
        }
    }

    public function viewDealer($id, $slug) {
        $dealer = DB::table('users')->where('slug', $slug)->orWhere('id', $id)->first();
        $listings = DB::table('listings')
        ->where('userId', $dealer->id)
        ->where('status', 'APPROVED')
        ->join('countries', 'countries.id', '=', 'listings.countryId')
        ->select('listings.*', 'countries.name as country')
        ->take(6)
        ->get();
        return view('dealer', ['dealer' => $dealer, 'listings' => $listings]);
    }

    public function viewDealerNoSlug($id) {
        $dealer = DB::table('users')->where('id', $id)->first();
        $listings = DB::table('listings')
        ->where('userId', $dealer->id)
        ->where('status', 'APPROVED')
        ->join('countries', 'countries.id', '=', 'listings.countryId')
        ->select('listings.*', 'countries.name as country')
        ->take(6)
        ->get();
        return view('dealer', ['dealer' => $dealer, 'listings' => $listings]);
    }

    public function updateHashed() {
       $msgs = DB::table('conversations')->get();
       foreach ($msgs as $msg) {
         echo func::hashedId(func::hashedId($msg->fromUserId, $msg->toUserId), $msg->listingId);
         DB::table('conversations')
             ->where('id', $msg->id)
             ->update(array(
                'hashedId' => func::hashedId(func::hashedId($msg->fromUserId, $msg->toUserId), $msg->listingId)
             ));
       }
    }

    public function sendMessage($dealerId) {
        if (Auth::user() && !empty($dealerId)) {
            $message = func::getVal('post', 'message');
            $listingId = func::getVal('post', 'listingId');
            $listingId = $listingId !== NULL ? $listingId :0;
            // return response()->json($listingId);
            $message_id = DB::table('conversations')->insertGetId([
                'body' => $message,
                'sentAt' => date('Y-m-d H:i:s'),
                'listingId' => $listingId,
                'toUserId' => $dealerId,
                'fromUserId' => Auth::user()->id,
                'hashedId' => func::hashedId(func::hashedId($dealerId, Auth::user()->id), $listingId)
            ]);
            $dealer = DB::table('users')->where('id', $dealerId)->first();
            $listing = $listingId ? DB::table('listings')->where('id', $listingId)->first() : NULL;
            if ($dealer && $dealer !== Auth::user()->id) {
                $from_email = Auth::user()->email;
                $username_from = Auth::user()->username;
                $username_to = $dealer->username;
                $details = array(
                    'to' => $dealer->email,
                    'listing' => $listingId ? $listing->title : ''
                );
                $this_url = url('/');
                $mailbox_url = $this_url . '/dashboard/mailbox/';
                Mail::send('emails.new-offer-en-us', ['username_to' => $username_to, 'username_from' => $username_from, 'this_url' => $this_url, 'mailbox_url' => $mailbox_url], function ($message) use ($details){
                    $message->from('technology@luxify.com', 'Luxify Admin');
                    $message->subject('Someone Is Interested In Your Dealer Page');
                    $message->replyTo('no_reply@luxify.com', $name = null);
                    $message->to($details['to']);
                });
                echo json_encode((object) ['result'=> 1, 'message'=> 'Message is successfully sent.']);
            } else {
                echo json_encode((object) ['result'=> 0, 'message'=> 'Invalid Dealer ID supplied.']);
            }
        } else {
            echo json_encode((object) ['result'=> 0, 'message'=> 'Insufficent parameters are supplied.']);
        }
    }

    public function dealerContact($id, $item){
        if(Auth::user()){
            $id = !empty($id) ? $id : '';
            $item = !empty($item) ? $item : '';

            if($item > 0){
                $created_at = date("Y-m-d H:i:s");
                $message_id = DB::table('conversations')->insertGetId([
                    'body' => 'You got an offer',
                    'sentAt' => $created_at,
                    'listingId' => $item,
                    'fromUserId' => Auth::user()->id,
                    'toUserId' => $id
                ]);
                $dealer = DB::table('users')->where('id', $id)->first();
                $listing = DB::table('listings')->where('id', $item)->first();
                if(Auth::user()){
                    $from_email = Auth::user()->email;
                    $username_from = Auth::user()->username;
                }else{
                    $from_email = 'technology@luxify.com';
                    $username_from = 'Luxify User';
                }
                $username_to = $dealer->username;

                $details = array(
                    'to' => $dealer->email,
                    'listing' => $listing->title
                );
                // var_dump($to_email);
                $this_url = url('/');
                $mailbox_url = $this_url . '/dashboard/mailbox/';
                Mail::send('emails.new-offer-en-us', ['username_to' => $username_to, 'username_from' => $username_from, 'this_url' => $this_url, 'mailbox_url' => $mailbox_url], function ($message) use ($details){

                    $message->from('technology@luxify.com', 'Luxify Admin');
                    $message->subject('New offer sent for ' . $details['listing']);
                    $message->replyTo('no_reply@luxify.com', $name = null);
                    $message->to($details['to']);

                });
                return redirect('/listing/' . $listing->slug . '?offer=sent');
            }else{
                $created_at = date("Y-m-d H:i:s");
                $listing = DB::table('listings')
                ->where('userId', $id)
                ->orderby('created_at', 'desc')
                ->select('id')
                ->first();
                $message_id = DB::table('conversations')->insertGetId([
                    'body' => 'Hi, I would like to contact you.',
                    'listingId' => $listing->id,
                    'sentAt' => $created_at,
                    'fromUserId' => Auth::user()->id,
                    'toUserId' => $id
                ]);
                $dealer = DB::table('users')->where('id', $id)->first();
                if(Auth::user()){
                    $from_email = Auth::user()->email;
                    $username_from = Auth::user()->username;
                }else{
                    $from_email = 'technology@luxify.com';
                    $username_from = 'Luxify User';
                }
                $username_to = $dealer->username;

                $details = array(
                    'to' => $dealer->email,
                );
                // var_dump($to_email);
                $this_url = url('/');
                $mailbox_url = $this_url . '/dashboard/mailbox/';
                Mail::send('emails.new-message-en-us', ['username_to' => $username_to, 'username_from' => $username_from, 'this_url' => $this_url, 'mailbox_url' => $mailbox_url], function ($message) use ($details){

                    $message->from('technology@luxify.com', 'Luxify Admin');
                    $message->subject('New message sent');
                    $message->replyTo('no_reply@luxify.com', $name = null);
                    $message->to($details['to']);

                });;
                return redirect('/dealer/' . $dealer->id . '?message=sent');
            }

            // return view('contact-dealer', ['id' => $id, 'item' => $item]);
        }else{
            echo 'You need to login first';
            return redirect('/login');
        }
    }

    public function dealerApplication(Request $request){
        if(Auth::user()){
            $username = Auth::user()->username;
        }else{
            $username = 'guest';
        }

        $input = $request->all();
        $business_details = array(
            'business-name' => $input['business-name'],
            'primary_business_focus' => $input['primary_business_focus'],
            'secondary_business_focus' => $input['secondary_business_focus'],
            'estimated_inventory_size' => $input['estimated_inventory_size'],
            'average_item_price' => $input['currency_avg'] . $_POST['average_item_price'],
            'business_description' => $input['business_description'],
        );
        $business_details_json = json_encode($business_details, JSON_NUMERIC_CHECK);

        $id = DB::table('applications')->insertGetId([
            'username' => $username,
            'first_name' => $input['first-name'],
            'last_name' => $input['last-name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'business_details' => $business_details_json,
            'country' => $input['country'],
        ]);

        if($id){
            $details = array('to' => $input['email'], 'forward' => 'florian.martigny@luxify.com');
            $this_url = url('/');
            $username_to = $username;
            Mail::send('emails.luxify-proseller-request-en-us', ['username_to' => $username_to, 'this_url' => $this_url], function ($message) use ($details){

                $message->from('technology@luxify.com', 'Luxify Admin');
                $message->subject('Your Pro Seller Application has been sent');
                $message->replyTo('no_reply@luxify.com', $name = null);
                $message->to($details['to']);

            });

            //second email should go to florian
            Mail::send('emails.luxify-proseller-request-en-us', ['username_to' => $username_to, 'this_url' => $this_url], function ($message) use ($details){

                $message->from('technology@luxify.com', 'Luxify Admin');
                $message->subject('A Pro Seller Application has been sent');
                $message->replyTo('no_reply@luxify.com', $name = null);
                $message->to($details['forward']);

            });
            return redirect('/dealer-application?message=sent');
        }else{
            return redirect('/dealer-application?message=fail');
        }
    }

    public function dealerListing($id){
        $childs = array(
            'estates' => array(50,69,16,52,72),
            'apartment' => array(126,51,49),
            'house' => array(48),
            'land' => array(53,54),
            'others' => array(47,138,57,56,127,15),
            'antique_jewelry' => array(149),
            'jewelry' => array(10,110,109,108,39,107,38,37),
            'watch' => array(36,106,105,89,34,33,31),
            'cars' => array(2,11,20,19,60,55,18),
            'classics' => array(66),
            'motorbike' => array(17),
            'accessories_men' => array(92.88),
            'accessories_women' => array(124, 160, 150, 120,119,118,117,161,159,116),
            'bags' => array(9,43,114,113,42,41,112,111,91,137),
            'experiences' => array(3,162,169,165,99,97,167,164,166,98,95,96,163,94),
            'collectibles' => array(1,46,68,67,168,136,64, 70, 61,131,130,90),
            'furnitures' => array(146, 79, 144, 63, 133, 62, 71, 93),
            'motor' => array(40,25,24,23,85,76),
            'sail' => array(22,24),
            'jet' => array(45),
            'helicopter' => array(125, 13),
            'art' => array(12,59,58,129,128),
            'antiques' => array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,),
            'fine_wines' => array(35,26,30,28,87,29),
            'spirits' => array(100,101,170,171,102,103,172,173,104),
            'champagne' => array(27)
        );

        $search_arr = array();
        $search_arr[] = ['userId', $id];
        // $search_arr[] = ['status', 'APPROVED'];

        $orderby = 'created_at';
        $order = 'desc';
        $filters = array();

        if(isset($_REQUEST['filters']) && $_REQUEST['filters'] == 'on'){
            $_filter = $_REQUEST;
            // var_dump($_filter); exit;

            if(!empty($_filter['location']) && $_filter['location'] != 'Location'){
                $search_arr[] = ['countryId', $_filter['location']];
                $filters['location'] = $_filter['location'];
            }
            if(isset($_REQUEST['use_price']) && $_REQUEST['use_price'] == 'on'){
                $use_price =  true;
                $filters['use_price'] = 'off';
            }else{
                $use_price =  false;
                $filters['use_price'] = 'off';
            }

            if($use_price && !empty($_REQUEST['range'])){
                $price_range = explode(';', $_REQUEST['range']);
                $search_arr[] = ['price', '>=', $price_range[0]];
                $search_arr[] = ['price', '<=', $price_range[1]];
                $filters['range'] = $_REQUEST['range'];
            }
            // var_dump($price_range); exit;
            if(isset($_filter['category']) && $_filter['category'] != 'Category'){
                unset($cat_ids);
                $cat_ids = array();
                if(isset($_filter['sub_category']) && !empty($_filter['sub_category'])){
                    // var_dump($childs['classics']);
                    $sub_category = $_filter['sub_category'];
                    // var_dump($sub_category);
                    switch($sub_category){
                        case 'estates':
                        $cat_ids = array(50,69,16,52,72);
                        break;
                        case 'apartment':
                        $cat_ids = array(126,51,49);
                        break;
                        case 'house':
                        $cat_ids =array(48);
                        break;
                        case 'land':
                        $cat_ids = array(53,54);
                        break;
                        case 'others':
                        $cat_ids = array(47,138,57,56,127,15);
                        break;
                        case 'antique_jewelry':
                        $cat_ids = array(149);
                        break;
                        case 'jewelry':
                        $cat_ids = array(10,110,109,108,39,107,38,37);
                        break;
                        case 'watch':
                        $cat_ids = array(36,106,105,89,34,33,31);
                        break;
                        case 'cars':
                        $cat_ids = array(2,11,20,19,60,55,18);
                        break;
                        case 'classics':
                        $cat_ids = array(66);
                        break;
                        case 'motorbike':
                        $cat_ids = array(17);
                        break;
                        case 'accessories_men':
                        $cat_ids = array(92.88);
                        break;
                        case 'accessories_women':
                        $cat_ids = array(124, 160, 150, 120,119,118,117,161,159,116);
                        break;
                        case 'bags':
                        $cat_ids = array(9,43,114,113,42,41,112,111,91,137);
                        break;
                        case 'experiences':
                        $cat_ids = array(3,162,169,165,99,97,167,164,166,98,95,96,163,94);
                        break;
                        case 'collectibles':
                        $cat_ids = array(1,46,68,67,168,136,64, 70, 61,131,130,90);
                        break;
                        case 'furnitures':
                        $cat_ids = array(146, 79, 144, 63, 133, 62, 71, 93);
                        break;
                        case 'motor':
                        $cat_ids = array(40,25,24,23,85,76);
                        break;
                        case 'sail':
                        $cat_ids = array(22,24);
                        break;
                        case 'jet':
                        $cat_ids = array(45);
                        break;
                        case 'helicopter':
                        $cat_ids = array(125, 13);
                        break;
                        case 'art':
                        $cat_ids = array(12,59,58,129,128);
                        break;
                        case 'antiques':
                        $cat_ids = array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,);
                        break;
                        case 'fine_wines':
                        $cat_ids = array(35,26,30,28,87,29);
                        break;
                        case 'spirits':
                        $cat_ids = array(100,101,170,171,102,103,172,173,104);
                        break;
                        case 'champagne':
                        $cat_ids = array(27);
                        break;
                    }
                    // var_dump($cat_ids); exit;
                }else{
                    switch($_filter['category']){
                        case 'real-estates':
                        $cat_ids = array_merge($childs['estates'],$childs['apartment'],$childs['house'],$childs['land'],$childs['others']);
                        $banner = 'banner-estate.jpg';
                        break;
                        case 'jewellery-watches':
                        $cat_ids = array_merge($childs['antique_jewelry'],$childs['jewelry'],$childs['watch']);
                        $banner = 'watches_banner.jpg';
                        break;
                        case 'motors':
                        $cat_ids = array_merge($childs['cars'],$childs['classics'],$childs['motorbike']);
                        $banner = 'motors_banner.jpg';
                        break;
                        case 'handbags-accessories':
                        $cat_ids = array_merge($childs['accessories_men'],$childs['accessories_women'],$childs['bags']);
                        $banner = 'bags_banner_bk.jpg';
                        break;
                        case 'experiences':
                        $cat_ids = array_merge($childs['experiences']);
                        $banner = 'experience_banner.jpg';
                        break;
                        case 'collectibles-furnitures':
                        $cat_ids = array_merge($childs['collectibles'],$childs['furnitures']);
                        $banner = 'Collectibles_banner.jpg';
                        break;
                        case 'yachts':
                        $cat_ids = array_merge($childs['motor'],$childs['sail']);
                        $banner = 'banner-whyluxify.jpg';
                        break;
                        case 'aircrafts':
                        $cat_ids = array_merge($childs['jet'],$childs['helicopter']);
                        $banner = 'about-banner.jpg';
                        break;
                        case 'art-antiques':
                        $cat_ids = array_merge($childs['art'],$childs['antiques']);
                        $banner = 'arts_banner.jpg';
                        break;
                        case 'fine-wines-spirits':
                        $cat_ids = array_merge($childs['fine_wines'],$childs['spirits'],$childs['champagne']);
                        $banner = 'wine_banner.jpg';
                        break;
                    }
                    // var_dump($cat_ids); exit;
                }
                $filters['category'] = $_filter['category'];
            }
            if(!empty($_filter['sort-radio'])){
                switch($_filter['sort-radio']){
                    case 'latest':
                    $orderby = 'created_at';
                    $order = 'desc';
                    break;
                    case 'priceUp':
                    $orderby = 'price';
                    $order = 'desc';
                    break;
                    case 'priceDown':
                    $orderby = 'price';
                    $order = 'asc';
                    break;
                }
                $filters['sort'] = $_filter['sort-radio'];
            }
        }

        // var_dump($search_arr);

        if(isset($cat_ids)){
            $listings = DB::table('listings')
            ->where($search_arr)
            ->whereIn($cat_ids)
            ->orderBy($orderby, $order)
            ->paginate(12);
        }else{
            $listings = DB::table('listings')
            ->where($search_arr)
            ->orderBy($orderby, $order)
            ->paginate(12);
        }

        $listings->setPath($_SERVER['REQUEST_URI']);

        $locs = '';
        $cats = '';

        if(is_array($listings) && !empty($listings)){
            foreach($listings as $list){
                $loc_arr[] = $list->countryId;
                $cat_arr[] = $list->categoryId;
                $cond_arr[] = $list->condition;
            }

            $locs = $this->get_column('countries', $loc_arr);
            $locs = array_values(array_sort($locs, function ($value) {
                return $value['name'];
            }));
            $cats = $this->get_column('categories', $cat_arr);
            $cats = array_values(array_sort($cats, function ($value) {
                return $value['title'];
            }));
        }

        $listings->setPath($_SERVER['REQUEST_URI']);

        return view('dealer-listings', ['listings' => $listings, 'filters' => $filters]);
    }

    public function search() {
        $childs = array(
            'estates' => array(50,69,16,52,72),
            'apartment' => array(126,51,49),
            'house' => array(48),
            'land' => array(53,54),
            'others' => array(47,138,57,56,127,15),
            'antique_jewelry' => array(149),
            'jewelry' => array(10,110,109,108,39,107,38,37),
            'watch' => array(36,106,105,89,34,33,31),
            'cars' => array(2,11,20,19,60,55,18),
            'classics' => array(66),
            'motorbike' => array(17),
            'accessories_men' => array(92.88),
            'accessories_women' => array(124, 160, 150, 120,119,118,117,161,159,116),
            'bags' => array(9,43,114,113,42,41,112,111,91,137),
            'experiences' => array(3,162,169,165,99,97,167,164,166,98,95,96,163,94),
            'collectibles' => array(1,46,68,67,168,136,64, 70, 61,131,130,90),
            'furnitures' => array(146, 79, 144, 63, 133, 62, 71, 93),
            'motor' => array(40,25,24,23,85,76),
            'sail' => array(22,24),
            'jet' => array(45),
            'helicopter' => array(125, 13),
            'art' => array(12,59,58,129,128),
            'antiques' => array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,),
            'fine_wines' => array(35,26,30,28,87,29),
            'spirits' => array(100,101,170,171,102,103,172,173,104),
            'champagne' => array(27)
        );

        $search = \Request::get('search');
        $search = urldecode($search);

        $search_arr = array();
        $search_arr[] = ['title','like','%'.$search.'%'];
        $search_arr[] = ['description','like','%'.$search.'%'];
        if(isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
            $search_arr[] = ['userId', $_REQUEST['user_id']];
        }
        // $search_arr[] = ['status', 'APPROVED'];

        $orderby = 'created_at';
        $order = 'desc';
        $filters = array();

        if(isset($_REQUEST['filters']) && $_REQUEST['filters'] == 'on'){
            $_filter = $_REQUEST;
            // var_dump($_filter); exit;

            if(!empty($_filter['location']) && $_filter['location'] != 'Location'){
                $search_arr[] = ['countryId', $_filter['location']];
                $filters['location'] = $_filter['location'];
            }
            if(isset($_REQUEST['use_price']) && $_REQUEST['use_price'] == 'on'){
                $use_price =  true;
                $filters['use_price'] = 'off';
            }else{
                $use_price =  false;
                $filters['use_price'] = 'off';
            }

            // var_dump($price_range); exit;
            if(isset($_filter['category']) && $_filter['category'] != 'Category'){
                unset($cat_ids);
                $cat_ids = array();
                if(isset($_filter['sub_category']) && !empty($_filter['sub_category'])){
                    // var_dump($childs['classics']);
                    $sub_category = $_filter['sub_category'];
                    // var_dump($sub_category);
                    switch($sub_category){
                        case 'estates':
                        $cat_ids = array(50,69,16,52,72);
                        break;
                        case 'apartment':
                        $cat_ids = array(126,51,49);
                        break;
                        case 'house':
                        $cat_ids =array(48);
                        break;
                        case 'land':
                        $cat_ids = array(53,54);
                        break;
                        case 'others':
                        $cat_ids = array(47,138,57,56,127,15);
                        break;
                        case 'antique_jewelry':
                        $cat_ids = array(149);
                        break;
                        case 'jewelry':
                        $cat_ids = array(10,110,109,108,39,107,38,37);
                        break;
                        case 'watch':
                        $cat_ids = array(36,106,105,89,34,33,31);
                        break;
                        case 'cars':
                        $cat_ids = array(2,11,20,19,60,55,18);
                        break;
                        case 'classics':
                        $cat_ids = array(66);
                        break;
                        case 'motorbike':
                        $cat_ids = array(17);
                        break;
                        case 'accessories_men':
                        $cat_ids = array(92.88);
                        break;
                        case 'accessories_women':
                        $cat_ids = array(124, 160, 150, 120,119,118,117,161,159,116);
                        break;
                        case 'bags':
                        $cat_ids = array(9,43,114,113,42,41,112,111,91,137);
                        break;
                        case 'experiences':
                        $cat_ids = array(3,162,169,165,99,97,167,164,166,98,95,96,163,94);
                        break;
                        case 'collectibles':
                        $cat_ids = array(1,46,68,67,168,136,64, 70, 61,131,130,90);
                        break;
                        case 'furnitures':
                        $cat_ids = array(146, 79, 144, 63, 133, 62, 71, 93);
                        break;
                        case 'motor':
                        $cat_ids = array(40,25,24,23,85,76);
                        break;
                        case 'sail':
                        $cat_ids = array(22,24);
                        break;
                        case 'jet':
                        $cat_ids = array(45);
                        break;
                        case 'helicopter':
                        $cat_ids = array(125, 13);
                        break;
                        case 'art':
                        $cat_ids = array(12,59,58,129,128);
                        break;
                        case 'antiques':
                        $cat_ids = array(139,74,140,81,147,80,73,145,143,142,148,78,77,75,141,);
                        break;
                        case 'fine_wines':
                        $cat_ids = array(35,26,30,28,87,29);
                        break;
                        case 'spirits':
                        $cat_ids = array(100,101,170,171,102,103,172,173,104);
                        break;
                        case 'champagne':
                        $cat_ids = array(27);
                        break;
                    }
                    // var_dump($cat_ids); exit;
                }else{
                    switch($_filter['category']){
                        case 'real-estates':
                        $cat_ids = array_merge($childs['estates'],$childs['apartment'],$childs['house'],$childs['land'],$childs['others']);
                        $banner = 'banner-estate.jpg';
                        break;
                        case 'jewellery-watches':
                        $cat_ids = array_merge($childs['antique_jewelry'],$childs['jewelry'],$childs['watch']);
                        $banner = 'watches_banner.jpg';
                        break;
                        case 'motors':
                        $cat_ids = array_merge($childs['cars'],$childs['classics'],$childs['motorbike']);
                        $banner = 'motors_banner.jpg';
                        break;
                        case 'handbags-accessories':
                        $cat_ids = array_merge($childs['accessories_men'],$childs['accessories_women'],$childs['bags']);
                        $banner = 'bags_banner_bk.jpg';
                        break;
                        case 'experiences':
                        $cat_ids = array_merge($childs['experiences']);
                        $banner = 'experience_banner.jpg';
                        break;
                        case 'collectibles-furnitures':
                        $cat_ids = array_merge($childs['collectibles'],$childs['furnitures']);
                        $banner = 'Collectibles_banner.jpg';
                        break;
                        case 'yachts':
                        $cat_ids = array_merge($childs['motor'],$childs['sail']);
                        $banner = 'banner-whyluxify.jpg';
                        break;
                        case 'aircrafts':
                        $cat_ids = array_merge($childs['jet'],$childs['helicopter']);
                        $banner = 'about-banner.jpg';
                        break;
                        case 'art-antiques':
                        $cat_ids = array_merge($childs['art'],$childs['antiques']);
                        $banner = 'arts_banner.jpg';
                        break;
                        case 'fine-wines-spirits':
                        $cat_ids = array_merge($childs['fine_wines'],$childs['spirits'],$childs['champagne']);
                        $banner = 'wine_banner.jpg';
                        break;
                    }
                    // var_dump($cat_ids); exit;
                }
                $filters['category'] = $_filter['category'];
            }
            if(!empty($_filter['sort-radio'])){
                switch($_filter['sort-radio']){
                    case 'latest':
                    $orderby = 'created_at';
                    $order = 'desc';
                    break;
                    case 'priceUp':
                    $orderby = 'price';
                    $order = 'desc';
                    break;
                    case 'priceDown':
                    $orderby = 'price';
                    $order = 'asc';
                    break;
                }
                $filters['sort'] = $_filter['sort-radio'];
            }

            if(isset($_REQUEST['use_price']) && $_REQUEST['use_price'] == 'on'){ // need to be put last to filter out the price range based on currency set.
                $use_price =  true;
                $filters['use_price'] = 'on';

                $price_lists = DB::table('listings')
                ->where('status', 'APPROVED')
                // ->whereIn('categoryId', $cat_ids)
                ->where($search_arr)
                ->join('countries', 'countries.id', '=', 'listings.countryId')
                ->select('listings.*', 'countries.name as country')
                ->get();

                // var_dump($price_lists); exit;

                if($use_price && !empty($_REQUEST['range'])){
                    $price_range = explode(';', $_REQUEST['range']);
                    $filtered_listing = array();
                    foreach($price_lists as $key => $val){
                        $price_set = $val->price;
                        $currency = DB::table('currencies')->where('id', $val->currencyId)->first();
                        $set_curr = $currency->code;
                        $sess_curr = null !== session('currency') ? session('currency') : 'USD';
                        $session_currency = DB::table('currencies')->where('code', $sess_curr)->first();
                        if($set_curr != $sess_curr){
                            $price_sql = $price_set / $currency->rate;
                            $price = $price_sql * $session_currency->rate;
                        }else{
                            $price = $price_set;
                        }

                        if($price < $price_range[0] || $price > $price_range[1]){
                            // echo $key . ', ';
                            $filtered_listing[] = $val->id;
                        }

                    }

                    // $search_arr[] = ['price', '>=', $price_range[0]];
                    // $search_arr[] = ['price', '<=', $price_range[1]];
                    $filters['range'] = $_REQUEST['range'];
                }
            }else{
                $use_price =  false;
                $filters['use_price'] = 'off';
            }
        }

        // var_dump($search_arr);

        if(isset($cat_ids)){
            if(isset($filtered_listing)){
                // var_dump($filtered_listing); exit;
                $listings = DB::table('listings')
                ->where('status', 'APPROVED')
                ->whereIn('categoryId', $cat_ids)
                ->whereNotIn('id', $filtered_listing)
                ->where($search_arr)
                ->orderBy($orderby, $order)
                ->join('countries', 'countries.id', '=', 'listings.countryId')
                ->select('listings.*', 'countries.name as country')
                ->paginate(12);
            }else{
                $listings = DB::table('listings')
                ->where('status', 'APPROVED')
                ->whereIn('categoryId', $cat_ids)
                ->where($search_arr)
                ->orderBy($orderby, $order)
                ->join('countries', 'countries.id', '=', 'listings.countryId')
                ->select('listings.*', 'countries.name as country')
                ->paginate(12);
            }
        }else{
            if(isset($filtered_listing)){
                // var_dump($filtered_listing); exit;
                $listings = DB::table('listings')
                ->where('status', 'APPROVED')
                ->whereNotIn('id', $filtered_listing)
                ->where($search_arr)
                ->orderBy($orderby, $order)
                ->join('countries', 'countries.id', '=', 'listings.countryId')
                ->select('listings.*', 'countries.name as country')
                ->paginate(12);
            }else{
                $listings = DB::table('listings')
                ->where('status', 'APPROVED')
                ->where($search_arr)
                ->orderBy($orderby, $order)
                ->join('countries', 'countries.id', '=', 'listings.countryId')
                ->select('listings.*', 'countries.name as country')
                ->paginate(12);
            }
        }

        $listings->setPath($_SERVER['REQUEST_URI']);

        $listings->setPath($_SERVER['REQUEST_URI']);

        return view('search', ['listings' => $listings, 'search' => $search, 'filters' => $filters]);
    }

    private function get_column($column, $array) {
        if(is_array($array)){
            $return = DB::table($column)
            ->whereIn('id', $array)
            ->get();

            $return = json_decode(json_encode($return), true);

            return $return;
        }
    }

    public function searchAjax() {
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            if($action == 'search'){
                $search = $_POST['search'];

                $search_arr = array();
                $search_arr[] = ['description','like','%'.$search.'%'];
                // $search_arr[] = ['status', 'APPROVED'];

                $cats = DB::table('categories')->where('title', 'like', '%'.$search.'%')->get();
                if(!empty($cats) && is_array($cats)){
                    foreach($cats as $cat){
                        $search_arr[] = ['categoryId', $cat->id];
                    }
                }

                $listings = DB::table('listings')
                ->where('status', 'APPROVED')
                ->where('title','like','%'.$search.'%')
                ->orWhere($search_arr)
                ->orderBy('created_at', 'desc')
                // ->groupBy('categoryId')
                // ->having('id', '>', 0)
                // ->skip(0)
                ->take(10)
                ->get();

                $total = DB::table('listings')
                ->where('status', 'APPROVED')
                ->where('title','like','%'.$search.'%')
                ->orWhere($search_arr)
                ->orderBy('created_at', 'desc')
                ->get();

                $totals = count($total);

                $cats = array();
                $dealers = array();

                // var_dump($listings); exit;

                if(is_array($listings) && !empty($listings)){
                    ob_start();
                    $return = '<div class="col-sm-7">';
                    $return .= '<div class="row-header"><a href="/search?_token='.$_POST['_token'].'&action='.$_POST['action'].'&search='. $search .'" class="pull-right" title="View More">More</a><div class="category-label"><span>Showing '.count($listings).' of '.count($total).' result(s)</span></div></div>';
                    $return .= '<ul class="results-found">';
                    foreach($listings as $list){
                        $cats[] = $list->categoryId;
                        $dealers[] = $list->userId;

                        //outputting left rows
                        $return .= '<li>';
                        $return .= '<a href="/listing/'. $list->slug.'" title="'. $list->title .'">';
                        $item_img = !empty($list->mainImageUrl) ? $list->mainImageUrl : 'default-logo.png';
                        $return .= '<img src="https://images.luxify.com/35/https://s3-ap-southeast-1.amazonaws.com/luxify/images/'. $item_img .'" width="35" height="35" alt="Image">';
                        $return .= $list->title;
                        //fixes for currency
                        $sess_currency = null !==  session('currency') ? session('currency') : 'USD';
                        $price_format = func::formatPrice($list->currencyId, $sess_currency, $list->price);
                        $return .= '<span class="price" style="margin-left: 15px;">'. $price_format .'</span>';
                        $return .= '</a>';
                        $return .= '</li>';
                    }
                    $return .= '</ul>';
                    $return .= '</div>';

                    $dealers = array_unique($dealers);
                    $dealers = array_filter($dealers);

                    // var_dump($dealers); exit;
                    $return .= '<div class="col-sm-5 hidden-xs">';
                    $return .= '<div class="row-header"> <a style="display: none;" href="javascript:void(0);" class="pull-right" title="View More">More</a><div class="category-label"><span>Recomended Sellers</span></div></div>';
                    $return .= '<ul class="results-found recommended">';
                    foreach($dealers as $d){
                        $dealer = DB::table('users')
                        ->where('id', $d)
                        ->first();

                        $return .= '<li>';
                        $slug = $dealer->slug != '' ? $dealer->slug : strtolower($dealer->firstName).'-'.strtolower($dealer->lastName);
                        $return .= '<a href="/dealer/'.$dealer->id.'/'.$slug.'" title="'.(!empty($dealer->companyName)? $dealer->companyName : $dealer->fullName).'">';
                        $dealer_img = !empty($dealer->companyLogoUrl) ? $dealer->companyLogoUrl : 'default-logo.png';
                        $return .= '<img src="https://images.luxify.com/150/https://s3-ap-southeast-1.amazonaws.com/luxify/images/'. $dealer_img .'" width="35" height="35" alt="Image">';
                        $return .= '<span style="display: block; margin-top: 10px;">'. (!empty($dealer->companyName)? $dealer->companyName : $dealer->firstName . ' ' . $dealer->lastName). '</span>';
                        $return .= '</a>';
                        $return .= '</li>';
                    }
                    $return .= '</ul>';
                    $return .= '</div>';
                    ob_end_flush();
                    $return = rtrim($return, $search);

                    // echo $return;
                    // echo rtrim($return, $search);
                    echo $return;
                }else{
                    echo '<p>No matching result.</p>';
                }
            }
        }
    }

    private function get_currency($id){
        $currency = DB::table('currencies')
        ->where('id', $id)
        ->first();

        return $currency;
    }

    public function wishlistAdd() {
        $created = date('Y-m-d H:i:s');
        $delete = func::getVal('post', 'delete');
        if ($delete !== NULL) {
            $delete = $delete === 'true' ?  1 : 0;
        }

        if(func::getVal('post', 'uid') && func::getVal('post', 'lid')) {
            if (intval(func::getVal('post', 'uid')) == Auth::user()->id) {
                $user = Auth::user()->id;
                $item = func::getVal('post', 'lid');
                $check = DB::table('wishlists')
                ->where('userId', $user)
                ->where('listingId', $item)
                ->count();
                if($check > 0) {
                    DB::table('wishlists')
                    ->where('userId', $user)
                    ->where('listingId', $item)
                    ->update([
                        'deleted' => $delete
                    ]);
                    echo 1;
                } else {
                    DB::table('wishlists')
                    ->insert([
                        'createdAt' => $created,
                        'userId' => $user,
                        'listingId' => $item]
                    );
                    echo 1;
                }
            }
        }
    }

    public function switchCurrency(Request $request, $code){
        $request->session()->put('currency', $code);
        return back();
    }

    /* // for build hierarchy field
    public function build() {
      return func::startBuild();
    }
     */
}
