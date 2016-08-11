<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
   
   protected $table = 'forms';

   protected $rules = [
     'languageId' => 'required',
     'categoryId' => 'required'
     ];
   
   public function validate($data) {
       $v = Validator::make($data, $this->rules); 

       if ($v->fails()) {
           $this->errors = $v->errors();
           return false;
       }
       return true;
   }

   public function language() {
     return $this->belongsTo('App\Languages'); 
   }

   public function category() {
     return $this->belongsTo('App\Categories'); 
   }

   public function formfields() {
     return $this->belongsToMany('App\FormFields', 'formgroups', 'formId', 'formgroupId');
   }
}
