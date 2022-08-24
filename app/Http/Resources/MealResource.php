<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
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
            'data' => [
                'name'=>$this->name,
                'price'=>$this->price,
                'description'=>$this->description,
                'extra_ingredients'=>$this->extras,
                'extras'=>$this->extrasReL,
                'attachments'=>$this->attachments,


            ],
            'links' => [
                'self' => route('meals.show',['meal'=>$this->id]),
            ],
        ];    }
}
