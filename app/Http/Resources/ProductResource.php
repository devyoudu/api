<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'slug'                      => $this->slug,
            'base_code'                 => $this->base_code,
            'product_code'              => $this->product_code,
            'product_ncm'               => $this->product_ncm,
            'product_title'             => $this->product_title,
            'product_description'       => $this->product_description,
            'product_customization'     => $this->product_customization,
            'product_packing_size'      => $this->product_packing_size,
            'packing_type'              => $this->packing_type,
            'product_size'              => $this->product_size,
            'available_on_site'         => $this->available_on_site,
            'images'                    => ProductImageResource::collection(optional($this->images)),
            'categories'                => CategoryResource::collection(optional($this->categories)),
            'subcategories'             => SubCategoryResource::collection(optional($this->subcategories)),
            'colors'                    => ColorResource::collection(optional($this->colors)),
        ];
    }
}
