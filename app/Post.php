<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

//    protected $slugKeyName = 'alternate';
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'  => true,
//                'unique'    => false,
            ],
//            'alternate' => [
//                'source' => 'subtitle',
//            ]
        ];
    }

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body',
    ];


    public function user(){

        return $this->belongsTo('App\User');

    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');

    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }

    public function photoplaceholder(){
        return "http://placehold.it/700x200";
    }

}
