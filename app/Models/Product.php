<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $protected = [
        'id'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'id', 'subcategory_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function colors()
    {
        return $this->hasMany(Color::class, 'id', 'color_id');
    }

    public function occasions(): HasOne
    {
        return $this->hasOne(Occasion::class, 'id', 'occasion_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'product_title'
            ]
        ];
    }
}
