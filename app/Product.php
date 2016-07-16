<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_created_id', 'category_id', 'model', 'specification', 'description'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
