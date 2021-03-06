<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
	protected $table = 'metas';
	public $timestamps = false;

  // `object_type` (table): ['listings', 'users', 'images','categories']
  // `id` (id in table)
  // meta[key] => value 
  //  key: alt_text, author, description, keyword, title
	public static function saveorupdate($id,$meta,$object_type){
		foreach ($meta as $key => $value) {
			$exist= Meta::where('object_id',$id)->where('meta_key',$key)->where('object_type',$object_type)->first();
			if($exist){
				//update
				$update = Meta::where('object_id',$id)->where('meta_key',$key)->where('object_type',$object_type)->update([ 'meta_value'=> $value,'edited_at'=> Carbon::now()]);
			} else {
				//create
				$create = new Meta;
				$create->id = '';
				$create->object_type = $object_type;
				$create->object_id = $id;
				$create->meta_key = $key;
				$create->meta_value = $value;
				$create->edited_at = Carbon::now() ;
				$create->save();
			}
		}
	}
	public static function alt_text_image($id,$value){
		$exist= Meta::where('object_id',$id)->where('meta_key','alt_text')->where('object_type','images')->first();
		if($exist){
			//update
      $update = Meta::where('object_id',$id)
        ->where('meta_key','alt_text')
        ->where('object_type','images')
        ->update([ 
          'meta_value'=> $value,
          'edited_at'=> Carbon::now()
        ]);
		}else{
			//create
			$create = new Meta;
			$create->id = '';
			$create->object_type = 'images';
			$create->object_id = $id;
			$create->meta_key = 'alt_text';
			$create->meta_value = $value;
			$create->edited_at = Carbon::now();
			$create->save();
		}
	}
	public static function get_data_categories($itemId,$key){
		$data= Meta::where('object_type','categories')
		->where('object_id',$itemId)
		->where('meta_key',$key)
    ->value('meta_value'); 
		return ($data)?$data:'';
	}
	public static function get_data_listing($itemId,$key){
		$data= Meta::where('object_type','listings')
		->where('object_id',$itemId)
		->where('meta_key',$key)
    ->value('meta_value'); 
		return ($data)?$data:'';
	}
	public static function get_data_user($userId,$key){
		$data= Meta::where('object_type','users')
		->where('object_id',$userId)
		->where('meta_key',$key)
    ->value('meta_value'); 
		return ($data)?$data:'';
	}
	public static function get_slug_img($img){
		$data= Meta::where('object_type', 'images')
		->where('object_id', $img)
    ->select('meta_value')
    ->first();
		return ($data && isset($data) && !empty($data) && isset($data['meta_value']) && !empty($data['meta_value']))? $data['meta_value']:'';	
	}
}
