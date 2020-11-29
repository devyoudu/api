<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'subcategory_id', 'subcategory', 'display', 'image_url', 'icon_url', 'hex_color', 'parent_id'
    ];
}
