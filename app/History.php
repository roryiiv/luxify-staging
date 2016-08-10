<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Listings;

class History extends Model
{
    protected $table="history";
    public $timestamps = false;

    public static function catat($object_type,$id,$value){
    	$catat = new History;
    	$catat->id = '';
    	$catat->created_at = Carbon::now();
    	$catat->object_type = $object_type;
    	$catat->object_id = $id;
    	$catat->object_field = $value;
    	$catat->save();
    	
    	return $catat;
    }
    public static function versioning_image($new_images,$id){
        $get_old_json = Listings::where('id',$id)->first();
        $old_images = json_decode($get_old_json->images);
        $mainImageUrl = $get_old_json->mainImageUrl;
        array_unshift($old_images, $mainImageUrl);
        $get_diff = array_diff($old_images, $new_images);
        $check = array_filter($get_diff);
        var_dump($old_images);
        var_dump($new_images);
        if(!empty($check)){
        $catat = new History;
        $catat->id = '';
        $catat->created_at = Carbon::now();
        $catat->object_type = 'images';
        $catat->object_id = $id;
        $catat->object_field = json_encode($new_images);
        $catat->save();
        
        return $catat;
        }

    }
}
