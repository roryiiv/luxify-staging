<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Categories extends Model
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
    
    public function scopeRoot($query)
    {
        return $query->whereNull('parentId');
    }

    public function scopeLeaf($query)
    {
        return $query->where('leaf', 1);
    }

    public function forms() {
        return $this->hasMany('App\Forms');
    }

    public $timestamps = false;
    protected $table = 'categories';
}
