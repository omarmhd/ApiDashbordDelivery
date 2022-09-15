<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\MealResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'delivery_time'=>'13:40',
            'status'=>$this->status,
            'total_price'=>$this->total_price,
            'meals'=>OrderDetailsResource::collection($this->orderDetails),
        ];
    }
}
