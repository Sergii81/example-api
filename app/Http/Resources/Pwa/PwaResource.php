<?php

namespace App\Http\Resources\Pwa;

use App\Http\Resources\Member\UserResource;
use App\Http\Resources\Review\ReviewResource;
use App\Http\Resources\Setting\SettingResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PwaResource extends JsonResource
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
            'sub' => $this->sub,
            'domain' => $this->domain,
            'template' => $this->template,
            'app_lang' => $this->app_lang,
            'owner' => UserResource::make($this->members),
            'owner_id' => UserResource::make($this->members)->uuid,
            'geo' => $this->geo,
            'pixel_id' => $this->pixel_id,
            'pixel_key' => $this->pixel_key,
            'link' => $this->link,
            'onesignal' => $this->onesignal,
            'whitepage' => $this->whitepage,
            'status' => $this->status,
            'settings' => SettingResource::make($this->settings),
            'reviews' => ReviewResource::collection($this->reviews)
        ];
    }
}
