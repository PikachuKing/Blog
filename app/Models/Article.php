<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\CommonMarkConverter;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'description', 'content', 'is_draft', 'view_number', 'published_at'
    ];

    protected $casts = [
        'content' => 'array',
    ];

    /**
     * set the published_at attribute.
     * @param $value
     */
    public function setIsDraftAttribute($value)
    {
        if (!$value){
            $this->attributes['published_at'] = Carbon::now();
        }
    }

    /**
     * Set the description attribute.
     *
     * @param $value
     */
    public function setDescriptionAttribute($value)
    {
        $data = [
            'raw' => $value,
            'html' => (new CommonMarkConverter())->convertToHtml($value),
        ];
        $this->attributes['description'] = json_encode($data);
    }

    /**
     * Set the content attribute.
     *
     * @param $value
     */
    public function setContentAttribute($value)
    {
        $data = [
            'raw' => $value,
            'html' => (new CommonMarkConverter())->convertToHtml($value),
        ];
        $this->attributes['content'] = json_encode($data);
    }


    /**
     * Set the slug attribute.
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['slug'] = translug($value);
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
