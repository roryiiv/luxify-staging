<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
	protected $table = 'metas';
	public $timestamps = false;

	public static function saveorupdate($id,$meta,$object_type){
		foreach ($meta as $key => $value) {
			$exist= Meta::where('object_id',$id)->where('meta_key',$key)->first();
			if($exist){
				//update
				$update = Meta::where('object_id',$id)->where('meta_key',$key)->where('object_type',$object_type)->update([ 'meta_value'=> $value]);
			}else{
				//create
				$create = new Meta;
				$create->id = '';
				$create->object_type = $object_type;
				$create->object_id = $id;
				$create->meta_key = $key;
				$create->meta_value = $value;
				$create->save();
			}
		}
	}
	public static function get_data_listing($itemId,$key){
		$data= Meta::where('object_type','listings')
		->where('object_id',$itemId)
		->where('meta_key',$key)
		->value('meta_value');
		return ($data)?$data:'';
	}
	public static function get_slug_img($img){
		$data= Meta::where('object_type','images')
		->where('object_id',$img)
		->value('meta_value');
		return ($data)?$data:'';	
	}
}
