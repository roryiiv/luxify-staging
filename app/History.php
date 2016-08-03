<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
}
