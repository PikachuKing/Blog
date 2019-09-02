<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'link', 'image', 'status'];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = asset('storage/uploads/'.$value);
    }
}
