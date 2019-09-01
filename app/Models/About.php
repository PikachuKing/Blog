<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\CommonMarkConverter;

class About extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'show', 'content'
    ];

    protected $casts = [
        'content' => 'array'
    ];

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
}
