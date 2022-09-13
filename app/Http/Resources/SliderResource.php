<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'order_index'=>$this->order_index,
            'status'=>$this->status,
            'attachments'=>$this->attachments,
            // 'links' => [
            //     'self' => route('meals.show',['meal'=>$this->id]),
            // ],
        ];
    }
}
