<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['subtitle', 'title', 'content'];

    protected $fillable = [
        'subtitle',
        'title',
        'content',
        'background_image',
    ];
}
