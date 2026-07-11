<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'category',
        'thumbnail',
        'description',
        'project_url',
        'order_column',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order_column');
    }
}
