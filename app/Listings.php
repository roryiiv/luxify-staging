<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

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
    
    protected $rules = array(
      'title' => 'required',
      'baseCurrencyPrice' => 'required|numeric|min:0',
      'images' => 'JSON',
      'status' => 'String|in:APPROVED,PENDING,SOLD,EXPIRED,REJECTED',
      'price' => 'numberic',
      'mainImageUrl' => 'required|image',
      'condition' => 'in:PRE-OWNED,NEW',
      'buyNowUrl' => 'URL',
      'aerialLook3DUrl' => 'URL',
      'aerialLookUrl' => 'URL',
      'translations' => 'JSON',
      'expired_at' => 'date',
      'ended_at' => 'date',
      'created_at' => 'date',
      'updated_at' => 'date',
      'availableToId' => 'integer',
      'countryId' => 'integer',
      'currencyId' => 'integer',
      'categoryId' => 'integer',
      'userId' => 'integer',
      'description' => 'string',
      'slug' => 'alpha_dash'
    );

    protected $errors;
    
    public function validate($data) {
      $v = Validator::make($data, $this->rules); 
      if ($v->fails()) {
        $this->errors = $v->errors;
        return false;
      }
      return true;
    }

    public function errors() {
      return $this->errors;    
    }
    public static function newslug($id,$slug){
      $oldslug = Listings::where('id',$id)->value('slug');
      $newslug = str_slug($slug, '-');
      //if data not change
      if($oldslug == $newslug){
        $counts = Listings::where('slug',$newslug)->count();
        //if data more than the object original
        if($counts>1){
          $newslug_copy = $newslug.'-'.$counts+1;
            return $newslug_copy;
          }else{
            return $newslug;
          }
      }else{
        $counts = Listings::where('slug',$newslug)->count();
        if($counts>0){
          $newslug = $newslug.'-1';
        }
        return $newslug;
      }
    }
}
