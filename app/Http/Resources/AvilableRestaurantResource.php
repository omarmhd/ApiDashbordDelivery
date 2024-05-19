<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvilableRestaurantResource extends JsonResource
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
            'id'=>$this->getKey(),
            'name'=>$this->name,
            'description'=>$this->description,
            'address'=>$this->address,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'phone'=>$this->phone,
            'active'=>$this->active,
            'delivery_time'=>$this->delivery_time,
            'review'=>$this->review,
            'attachments'=>$this->attachments,
            // 'links' => [
            //     'self' => route('meals.show',['meal'=>$this->id]),
            // ],
        ];
    }
}
