<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Blog extends Model
{
    use HasAdvancedFilter;

    protected $filterable = [
        'id',
        'title',
        'details',
        'image',
        'slug',
        'status',
        'featured',
        'meta_title',
        'meta_desc',
        'language_id',
    ];

    public $orderable = [
        'id',
        'title',
        'details',
        'image',
        'slug',
        'status',
        'featured',
        'meta_title',
        'meta_desc',
        'language_id',
    ];

    protected $fillable = [
        'title',
        'details',
        'image',
        'slug',
        'status',
        'featured',
        'meta_title',
        'meta_desc',
        'language_id',
    ];

    protected $dates = ['created_at'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\BlogCategory', 'category_id')->withDefault();
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'language_id')->withDefault();
    }
}
