<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormGroups extends Model
{
   protected $table = 'formgroups';
   
   public function formfield() {
     return $this->hasOne('App\FormFields', 'id', 'formfieldId');
   }
   public function form() {
     return $this->hasOne('App\Forms', 'id', 'formId'); 
   }
   public function extrainfos () {
     return $this->hasMany('App\FormGroups');
   }
}
