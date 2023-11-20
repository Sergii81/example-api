<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'app_uuid' => $this->app_uuid,
            'stars' => $this->stars,
            'icon' => $this->icon,
            'name' => $this->name,
            'about' => $this->about
        ];
    }
}
