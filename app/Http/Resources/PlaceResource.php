<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PlaceResource extends JsonResource
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
          'name' => $this->name,
          'description' => $this->description,
          'address' => $this->address,
          'phone' => $this->phone,
          'image' => $this->image_url,
          'latitude' => $this->latitude,
          'longitude' => $this->longitude,
          'sub_district' => $this->subDistrict,
          'is_favourited' => Auth::guard('sanctum')->check() ? Auth::guard('sanctum')->user()->places()->pluck('places.id')
          ->contains($this->id) : false,
        ];
    }
}
