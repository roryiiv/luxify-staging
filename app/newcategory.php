<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;


class newcategory extends Model
{
    //
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
                'source' => 'slug'
            ]
        ];
    }

    protected $table = 'category_2';
    public $timestamps = true;
    protected $fillable = [
    'name',
    'slug',
    'label',
    'description',
    'parent',
    'mainImageURL'
    ];
}
