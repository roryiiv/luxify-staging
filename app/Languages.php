<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $table = 'languages';

    public function forms() {
      return $this->hasMany('App\Forms'); 
    }
}
