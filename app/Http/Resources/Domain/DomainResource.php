<?php

namespace App\Http\Resources\Domain;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
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
            'date_create' => $this->date_create,
            'date_take' => $this->date_take,
            'date_ban' => $this->date_ban,
            'domain' => $this->domain,
            'status' => $this->status
        ];
    }
}
