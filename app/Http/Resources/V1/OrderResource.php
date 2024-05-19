<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\MealResource;
use App\Models\User;
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
        $user_id = $this->driverOrderRequests->where('status', '1')->first();

        return [
            'id'=>$this->getKey(),
            'delivery_time'=>'13:40',
            'delivery_id'=>User::find($user_id),
            'status'=>$this->status,
            'total_price'=>$this->total_price,
            'meals'=>OrderDetailsResource::collection($this->orderDetails),
        ];
    }
}
