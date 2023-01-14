<?php

namespace App\Http\Resources;

use App\Http\Resources\V1\AttachmentsResource;
use App\Http\Resources\V1\ExtraResource;
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
            'id'=>$this->getKey(),
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,
            'extra_ingredients'=>json_decode($this->extras),
            'restaurant'=>$this->restaurant->name,
            'category'=>$this->category->name,
            'review'=>$this->review,
            'delivery_time'=>$this->restaurant->delivery_time,
            'created_at'=>$this->created_date,
            'extras_breads'=> ExtraResource::collection($this->extrasReL->where("type","bread")),
            'extras_sweet'=> ExtraResource::collection($this->extrasReL->where("type","sweet")),
            'extras_suggested'=> ExtraResource::collection($this->extrasReL->where("type","suggested")),
            'attachments'=> AttachmentsResource::collection($this->attachments),
            // 'links' => [
            //     'self' => route('meals.show',['meal'=>$this->id]),
            // ],
        ];
      }
}
