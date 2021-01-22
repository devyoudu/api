<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use Sluggable;

    protected $fillable = [
        'category', 'subcategory_id', 'subcategory', 'display', 'image_url', 'icon_url', 'slug'
    ];

    public $timestamps = false;

    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(SubCategory::class, 'category_subcategories', 'category_id', 'subcategory_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category'
            ]
        ];
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
