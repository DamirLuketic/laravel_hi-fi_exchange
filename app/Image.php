<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'imageable_type', 'imageable_id'];

    protected $address = '/hi-fi_exchange/public/image/';

    public function getPathAttribute($value)
    {
        return $this->address . $value;
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
