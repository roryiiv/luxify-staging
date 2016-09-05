<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;

class Listings extends Model
{
    //sluggable start here
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = [
      'source',
      'source_id',
      'title', 
      'baseCurrencyPrice',
      'images',
      'status',
      'price', 
      'mainImageUrl', 
      'condition',
      'buyNowUrl',
      'aerialLook3DUrl',
      'aerialLookUrl',
      'translations',
      'created_at',
      'updated_at',
      'countryId',
      'currencyId',
      'categoryId',
      'userId',
      'description',
      'additionalInfo',
      'html_desc',
      'optional_field',
      'metaProcessed',
      ];
    
    protected $rules = array(
      'title' => 'required',
      'baseCurrencyPrice' => 'min:0',
      'images' => 'string',
      'status' => 'required|String|in:APPROVED,PENDING,SOLD,EXPIRED,REJECTED',
      'mainImageUrl' => 'required',
      'condition' => 'required|in:PRE-OWNED,NEW',
      'buyNowUrl' => 'URL',
      'aerialLook3DUrl' => 'URL',
      'aerialLookUrl' => 'URL',
      'translations' => 'string',
      'expired_at' => 'date',
      'ended_at' => 'date',
      'created_at' => 'date',
      'updated_at' => 'date',
      'availableToId' => 'integer',
      'countryId' => 'required|integer',
      'currencyId' => 'required|integer',
      'categoryId' => 'required|integer',
      'userId' => 'required|integer',
      'description' => 'required|string',
      'slug' => 'alpha_dash',
      'additionalInfo' => 'string',
      'html_desc' => 'string'
    );

    protected $errors;
    
    public function validate($data) {
      $v = Validator::make($data, $this->rules); 
      if ($v->fails()) {
        $this->errors = $v->errors();
        return false;
      }
      return true;
    }

    public function country() {
      return $this->belongsTo('App\Countries'); 
    }

    public function currency() {
      return $this->belongsTo('App\Currencies'); 
    }

    public function category() {
      return $this->belongsTo('App\Categories'); 
    }

    public function user() {
      return $this->belongsTo('App\Users');   
    }

    public function extrainfo() {
      return $this->hasMany('App\ExtraInfos', 'listingId', 'id');
    }

    public function errors() {
      return $this->errors;    
    }
    public static function generateslug($slug){
      $explode = explode('-', $slug);
      if(is_array($explode)){
        //eksekusi array
        $count = count($explode);
        $lastarray = intval($explode[$count-1]);
        if(is_int($lastarray)){
          $status = true;
          $i = 1;
          while($status){
          $data = Generate::where('password',$key)->first();
              if($data == 0) $status = false;
              return $key;
          }
        }
      }else{

      }
    }

}
