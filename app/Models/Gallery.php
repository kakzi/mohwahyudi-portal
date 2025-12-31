<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class Gallery extends Model implements HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'type',
        'title',
        'date_published',
    ];

    protected $fillable = [
        'type',
        'title',
        'date_published',
        'image',
        'highlights',
        'status',
    ];
}
