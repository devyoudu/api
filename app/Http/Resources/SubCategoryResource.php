<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                        => $this->id,
            'subcategory'               => $this->subcategory,
            'slug'                      => $this->slug,
            'icon_url'                  => $this->icon_url,
            'meta_description'          => $this->meta_description,
        ];
    }
}
