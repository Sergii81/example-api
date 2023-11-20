<?php

namespace App\Http\Resources\Setting;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'app_name' => $this->app_name,
            'app_author' => $this->app_author,
            'app_icon' => $this->app_icon,
            'image_set' => $this->image_set,
            'app_rating' => $this->app_rating,
            'fb_continue' => $this->fb_continue,
            'about' => $this->about
        ];
    }
}
