<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'token' => $this->createToken("API TOKEN")->plainTextToken,
            "id"=> $this->getKey(),
            "first_name"=> $this->first_name,
            "last_name"=> $this->last_name,
            "phone"=> $this->phone,
            "avatar"=> null,
            "gender"=> $this->gender,
            "email"=>$this->email,
            "address"=> $this->address,

            "latitude"=> $this->latitude,
            "longitude"=> $this->longitude,
            "total_orders"=>$this->orders->sum("total_price"),
            "count_orders"=>$this->orders->count("count_orders"),
            "created_at"=> $this->created_at,
            "place_id"=> $this->place_id,
        ];
    }
}
