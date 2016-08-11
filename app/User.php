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
      //if data not change old and new
        if($oldslug == $newslug){
            $counts = User::where('slug',$newslug)->count();
            //if data more than the object original
            if($counts>1){
                $newslug_copy = str_slug($slug, '-').'-'.$counts+1;
                return $newslug_copy;
            }else{
                return str_slug($slug, '-');
            }
        }
      //if data change
      else{
            //count slug 
            $newcount = User::where('slug',$newslug)->count();
            //dd($newcount);
            //if newslug is there are same with others slug
            if($newcount>0){
                //recheck if second slug are unique
                $second_slug = str_slug($slug, '-').'-'.($newcount+1);
                $second_oldslug = User::where('slug',$second_slug)->value('slug');
                //if still same
                if($second_slug == $second_oldslug){
                    return str_slug($slug, '-').'-'.($newcount+2);
                }else{
                    return str_slug($slug, '-').'-'.($newcount+1);
                }

            }else{
                return str_slug($slug, '-') ;
            }
        }
    }
}
