<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Sluggable;

    protected $fillable = [
        'slug', 'user_id', 'image', 'thumbnail'
    ];

    use \Astrotomic\Translatable\Translatable;

    public $translatedAttributes = ['title', 'description'];

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
}
