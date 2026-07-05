<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceSetting extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['subtitle', 'title', 'quote_title', 'quote_subtitle'];

    protected $fillable = [
        'subtitle',
        'title',
        'quote_title',
        'quote_subtitle',
    ];
}
