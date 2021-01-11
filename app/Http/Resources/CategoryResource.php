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
            'subcategories'             => SubCategoryResource::collection(optional($this->child))
        ];
    }
}
