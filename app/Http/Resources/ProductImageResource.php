<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'image_url' => $this->image_url,
            'thumb_image_url' => $this->thumb_image_url,
            'is_default' => $this->is_default,
        ];
    }
}
