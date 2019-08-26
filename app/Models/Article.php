<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'description', 'content', 'is_draft', 'view_number', 'published_at'
    ];


}
