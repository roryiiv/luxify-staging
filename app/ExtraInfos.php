<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraInfos extends Model
{
  protected $table = 'extrainfos';

  protected $rules = [ 
    'value' => 'required',  
    'listingId' => 'required',
    'formgroupId' => 'required'
  ];
  public function validate($data) {
      $v = Validator::make($data, $this->rules); 
      if ($v->fails()) {
          $this->errors = $v->errors();
          return false;
      }
      return true;
  }

  public function listing() {
    return $this->belongsTo('App\Listings');  
  }

  // listingId -> categoryId + languageId => formgroupId
  public function formfield() {
    return $this->hasOne('formFields');
  }
}

