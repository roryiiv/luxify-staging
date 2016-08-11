<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
  protected $table = 'formfields';

  public function forms() {
    return $this->belongToMany('App\Forms', 'formgroups', 'formfieldId', 'formId'); 
  }
}
