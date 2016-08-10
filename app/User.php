<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','firstName','fullname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'companyName'
            ]
        ];
    }
    public static function newslug($id,$slug){

      $oldslug = User::where('id',$id)->value('slug');
      $newslug = str_slug($slug, '-');
      //if data not change
      if($oldslug == $newslug){
        $counts = User::where('slug',$newslug)->count();
        //if data more than the object original
        if($counts>1){
          $newslug_copy = $newslug.'-'.$counts+1;
            return $newslug_copy;
          }else{
            return $newslug;
          }
      }else{
            //if old slug is diff with new slug
            $othercount = User::where('slug',$newslug)->count();
            //if newslug is there are same with others slug
            if($othercount>0){
              return $newslug = $newslug.'-'.$othercount+1;
            }else{
              return  $newslug ;
            }
            return $newslug;
          }
    }
}
