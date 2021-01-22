<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id'                        => $this->id,
            'category'                  => $this->category,
            'slug'                      => $this->slug,
            'icon_url'                  => $this->icon_url,
            'meta_description'          => $this->meta_description,
            'subcategories'             => $this->subcategories
        ];
    }
}
