<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = [
        'category', 'subcategory_id', 'subcategory', 'display', 'image_url', 'icon_url', 'slug'
    ];

    public $timestamps = false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category'
            ]
        ];
    }
}
