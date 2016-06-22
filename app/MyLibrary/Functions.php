<?php
namespace App\MyLibrary;

Use DB;

Use Auth;

use App\User;

class Functions
{
    static function shout($string){
        return strtoupper($string);
    }

    static function img_url($url, $width = 180, $height = 180){
        $processor = 'http://images.luxify.com/'. $width .'x'. $height .'/https://s3-ap-southeast-1.amazonaws.com/luxify/images/';
        $return = $processor . $url;
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

    public static function build_countries(){
        $country_list = DB::table('countries')->get();
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
            ->where([
                ['toUserId', $user_id],
                ['readAt', NULL],
                ['deleted', NULL]
            ])
            ->orderby('sentAt', 'desc')
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
}
?>
