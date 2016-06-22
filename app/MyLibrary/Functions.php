<?php
namespace App\MyLibrary;

Use DB;

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
}
?>
