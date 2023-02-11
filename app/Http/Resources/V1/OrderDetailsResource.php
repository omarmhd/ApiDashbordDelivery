<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\MealResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getKey(),
            'number_of_meals' => $this->number_of_meals,
            'total_price' => $this->total_price,
            'meal' => new MealResource($this->meal),
            'extras'=>  json_decode($this->extras, true),
            'meal_extras'=>  json_decode($this->meal_extras, true),
            'attachments'=> AttachmentsResource::collection($this->attachments),
        ];
    }
}
