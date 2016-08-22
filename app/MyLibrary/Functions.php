<?php
namespace App\MyLibrary;

Use DB;

Use Auth;

use App\User;

use App\Categories;

use DateTime;

use Carbon\Carbon;

use App;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Config;

class Functions
{
    static function genTitle($pageName,  $categories) {
      if (!($categories)) {
          if ($pageName === 'homepage') {
            return 'Luxify.com - Asia&#39;s Leading Marketplace for Luxury';
          } else {
            return $pageName . ' - Luxify - Asia&#39;s Leading Marketplace for Luxury';
          } 
      } else {
        return $pageName;
      }
    }
    static function trimDownText($txt, $len) {
        $txt = preg_replace('/\r|\n/', '', $txt);
        $txt = preg_replace('/<br\s?\/>/', '', $txt);
        if (strlen($txt) > $len){
           $txt = wordwrap($txt, $len); 
           return substr($txt, 0, strpos($txt, "\n"));
        } else {
          return $txt;
        }
    }

    static function getVal($method = 'get', $key) {
      if ($method === 'get') {
        if (isset($_GET[$key]) && !empty($_GET[$key])) {
          return $_GET[$key];
        } else {
          return NULL;
        }
      } else if ($method === 'post') {
        if (isset($_POST[$key]) && !empty($_POST[$key])) {
          return $_POST[$key];
        } else {
          return NULL;
        }
      } else {
        return NULL;
      }
    }

    static function hashedId($x, $y){
        $x = intval($x);
        $y = intval($y);
        if ($x > $y) {
          $tmp = $x;
          $x = $y;
          $y = $tmp;
        }
        return (($x + $y) * ($x + $y + 1)) / 2 + $y;
    }

    static function img_url($url, $width = '', $height = '', $fit = false, $static = false){
        $processor = '';
        $processor .= 'https://images.luxify.com/q100,';
        if ($fit && (!empty($width) || !empty($height))) {
            $size = !empty($width) ? $width : $height;
            $processor .= $size . ',fit';
        } else {
            $processor .= !empty($width) ? $width : '';
            $processor .= !empty($width) ? "x": (!empty($height)? 'x': '') ;
            $processor .= !empty($height) ? $height : '';
        }
        if (!$static) {
          $processor .= '/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/images/';
        } else {
          $processor .= '/https%3A%2F%2Fluxify.s3-accelerate.amazonaws.com/static/';
        }
        return $processor . $url;
    }

    public static function categories($level){
        $categories = DB::table('categories')
        ->where('parentId', '<>', NULL)
        ->orderby('displayOrder', 'asc')
        ->get();

        return $categories;
    }

    public static function getParentCat($cat_id){
        $return = DB::table('categories')
        ->where('id', $cat_id)
        ->first();

        return $return;
    }

    public static function getFeatured($user_id) {
        $return = DB::table('listings')
        ->where('userId', $user_id)
        ->orderby('created_at', 'desc')
        ->first();

        return $return;
    }

    public static function build_menu($elements){
        ?>
        <ul>
            <?php
            foreach ($elements as $element) {
                echo '<li><a href="/category/'.$element['slug'].'">'.$element['title'].'</a></li>';
                if(array_key_exists('children', $element)){
                    $children = $element['children'];
                    if(count($children) > 0 ){
                        Functions::build_menu($children);
                    }
                }
            }
            ?>
        </ul>
        <?php
    }

    public static function build_categories($mode = 'all') {
        if ($mode === 'root') {
            return Categories::root()->orderBy('displayOrder')->get()->toArray();
        } else if ($mode === 'leaf') {
            return Categories::leaf()->orderBy('hierarchy')->get()->toArray();
        } else {
            return Categories::all()->toArray();
        }
    }

    public static function build_countries(){
        $country_list = DB::table('countries')
        ->orderby('name', 'asc')
        ->get();
        if(is_array($country_list)){
            $return = array();
            for ($x = 0; $x < count($country_list); $x++) {
                $return[$x]['val'] = $country_list[$x]->id;
                $return[$x]['label'] = $country_list[$x]->name;
            }
        }
        return $return;
    }

    public static function build_lang(){
        $langs = DB::table('languages')->get();
        if(is_array($langs)){
            $return = array();
            for ($x = 0; $x < count($langs); $x++) {
                $return[$x]['val'] = $langs[$x]->id;
                $return[$x]['label'] = $langs[$x]->name;
                $return[$x]['code'] = $langs[$x]->code;
            }
        }
        return $return;
    }

    public static function build_curr(){
        $curr = DB::table('currencies')->orderby('id', 'asc')->get();
        if(is_array($curr)){
            $return = array();
            for ($x = 0; $x < count($curr); $x++) {
                $return[$x]['val'] = $curr[$x]->id;
                $return[$x]['label'] = $curr[$x]->name;
                $return[$x]['code'] = $curr[$x]->code;
                $return[$x]['symbol'] = $curr[$x]->symbol;

            }
        }
        return $return;
    }

    static function selected($value_a, $value_b) {
        $selected = $value_a == $value_b ? ' selected="selected"' : '';
        return $selected;
    }

    public static function get_notif() {
        //build notifications info
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $notifs = DB::table('conversations')
            // ->where('readAt', NULL)
            ->where('conversations.deleted', false)
            ->where('readAt', NULL)
            ->where('toUserId', $user_id)
            ->join('users AS sender', 'conversations.fromUserId', '=', 'sender.id')
            ->Join('users AS receiver', 'conversations.toUserId', '=', 'receiver.id')
            ->leftJoin('listings', 'listings.id', '=', 'conversations.listingId')
            ->orderby('sentAt', 'desc')
            ->groupby('hashedId')
            ->get();

            return $notifs;
        }
    }

    public static function get_profile($user_id) {
        //get a specific user profile
        $profile = DB::table('users')
        ->where('id', $user_id)
        ->first();

        return $profile;
    }

    public static function get_listing($id) {
        //get a specific user profile
        $profile = DB::table('listings')
        ->where('id', $id)
        ->first();

        return $profile;
    }

    public static function time_ago($date,$granularity=2) {
        $date = strtotime($date);
        $difference = time() - $date;
        $periods = array('decade' => 315360000,
            'year' => 31536000,
            'month' => 2628000,
            'week' => 604800,
            'day' => 86400,
            'hour' => 3600,
            'min' => 60,
            'sec' => 1);

        $retval = '';
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval;
    }

    public static function truncate($text, $length) {
        $length = abs((int)$length);
        if(strlen($text) > $length) {
            $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
        }
        return($text);
    }
    public static function countMarketValue() {
       return round(23+((Carbon::now()->timestamp - 1468460000)/864000), 1);
    }

    public static function countListings(){
        //$listings = DB::table('listings')->count() + ((Carbon::now()->timestamp - 1465000000)/86400);
        $listings = 26000 + ((Carbon::now()->timestamp - 1465000000)/86400);

        $return = $listings;
        return $return;
    }
    public static function countNewListings(){
       return 750 + ((Carbon::now()->timestamp - 1465000000)/86400);
    }

    public static function countRecent(){
        $today = Carbon::today();
        $last_30 = $today->subDays(30);
        $listings = DB::table('listings')
        ->where('created_at', '<=', $today)
        ->where('updated_at', '>=', $last_30)
        ->count();

        $return = $listings;
        return $return;
    }

    public static function is_wishlist($user_id, $listing_id) {
        $isw = DB::table('wishlists')
        ->where('userId', $user_id)
        ->where('listingId', $listing_id)
        ->where('deleted', 0)
        ->first();

        if($isw){
            return 1;
        }else{
            return 0;
        }
    }

    public static function getTableByID($table, $id){
        $return = DB::table($table)
        ->where('id', $id)
        ->first();
        return $return;
    }

    public static function getTable($table){
        $return = DB::table($table)->get();
        return $return;
    }

    public static function formatPrice($currencyID, $sessionCurrency, $price){
        if($price != 0 || $price != null){
            $listing = DB::table('currencies')
            ->where('id', $currencyID)
            ->first();
            $item_currency = $listing->code;

            if($item_currency !== $sessionCurrency){
                $item_rate = $listing->rate;
                $priceUSD = $price / $item_rate;

                $sessCurrency = DB::table('currencies')
                ->where('code', $sessionCurrency)
                ->first();
                $sessionRate = $sessCurrency->rate;
                $price_raw = $priceUSD * $sessionRate;
                $return_price = $sessCurrency->symbol . number_format($price_raw, 0) . ' ' . $sessCurrency->code;
            }else{
                $return_price = $listing->symbol . number_format($price, 0) . ' ' . $item_currency;
            }
            $return = $return_price;
        }else{
            $return = 'Price on request';
        }


        return $return;
    }
    public static function get_lang(){
        if(Auth::user()){
            $languageId = Auth::user()->languageId;
            if($languageId !='' && !empty($languageId)){
                $return = DB::table('languages')->where('id',$languageId)->value('code');
            }else{
                if(Session::has('lang')){
                    $return = Session::get('lang');
                }else{
                    $return = Config::get('app.locale');                  
                }
            }
            return $return;
        }else{
            return Session::has('lang') ? Session::get('lang') : Config::get('app.locale');
        }
    }
	/*
    public static function leafNode() {
      $allCats = Categories::all()->toArray();
      for ( $i = 0; $i < count($allCats); $i++) {
        $children = DB::table('categoryOrganisations')->where('categoryId', $allCats[$i]['id'])->count();
        if($children === 0) {
          DB::table('categories')->where('id', $allCats[$i]['id'])->update(['leaf' => 1]);
        } else {
          DB::table('categories')->where('id', $allCats[$i]['id'])->update(['leaf' => 0]);
        }
      }
    }
    public static function build_hierarchy() {
      $allCats = Categories::all()->toArray();
      for($i = 0; $i < count($allCats); $i++) {
        $hier = '';
        if ($allCats[$i]['hierarchy'] === NULL && $allCats[$i]['ParentId'] === NULL) {
          DB::table('categories')->where('id', $allCats[$i]['id'])->update(['hierarchy' => $allCats[$i]['title']]);
          $hier = $allCats[$i]['title'];
        } else {
          $hier = $allCats[$i]['hierarchy'];
        }
        $children = DB::table('categoryOrganisations')->where('categoryId', $allCats[$i]['id'])->get();
        for ($h = 0; $h < count($children); $h++) {
          $subCat = DB::table('categories')->where('id', $children[$h]->SubCategoryId)->first();
          DB::table('categories')->where('id', $children[$h]->SubCategoryId)->update(['hierarchy' => $hier .' / '. $subCat->title]);
        }


      }
    }
    */
}
?>
