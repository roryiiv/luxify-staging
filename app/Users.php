<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Users extends Model
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
                'source' => 'companyName'
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
}
