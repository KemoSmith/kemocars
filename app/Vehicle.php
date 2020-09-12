<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function contact_info()
    {
        return $this->belongsToMany(ContactInfo::class);
    }
}
