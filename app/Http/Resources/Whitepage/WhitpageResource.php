<?php

namespace App\Http\Resources\Whitepage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WhitpageResource extends JsonResource
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
            'filename' => $this->filename,
            'geo' => $this->geo,
            'status' => $this->status
        ];
    }
}
