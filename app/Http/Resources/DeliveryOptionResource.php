<?php

namespace App\Http\Resources;

use App\Models\DeliveryOption;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryOptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'provider' => $this->provider,
            'service' => $this->service,
            'country' => $this->country,
            'weekends' => $this->weekends,
            'price' => $this->price,
        ];
    }
}
