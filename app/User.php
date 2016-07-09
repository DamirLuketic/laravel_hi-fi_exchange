<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source'    => 'name',
                'onUpdate'  => 'true',
                'maxLength' => 10
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $fillable = [
        'name', 'email', 'password','slug', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
