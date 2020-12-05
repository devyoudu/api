<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'image_name'    => $this->image_name,
            'image_url'     => $this->image_url,
            'is_default'    => $this->is_default,
        ];
    }
}
