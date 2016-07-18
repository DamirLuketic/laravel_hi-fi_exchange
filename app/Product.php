<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_created_id', 'approved', 'category_id', 'model', 'specification', 'description'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function image()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    // method for access user who created product -> add name out of Laravel syntax for better description of property
    public function user_created()
    {
        return $this->belongsTo('App\User', 'user_created_id');
    }
}
