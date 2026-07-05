<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations, Sortable;

    public $translatable = ['title', 'description', 'features'];

    protected $fillable = [
        'title',
        'icon',
        'description',
        'detail_image',
        'features',
        'price',
        'order_column',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
