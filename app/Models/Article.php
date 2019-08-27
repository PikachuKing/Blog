<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'description', 'content', 'is_draft', 'view_number', 'published_at'
    ];

    /**
     * 不为草稿时设置发布时间
     * @param $value
     */
    public function setIsDraftAttribute($value)
    {
        if (!$value){
            $this->attributes['published_at'] = Carbon::now();
        }
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }
}
