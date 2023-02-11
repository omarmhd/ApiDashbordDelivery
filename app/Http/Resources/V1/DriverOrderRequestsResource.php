<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverOrderRequestsResource extends JsonResource
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
            'id' => $this->id,
            'driver_id' => $this->driver_id,
            'order_id' => $this->order_id,
            'order'=>$this->order,
            'user'=>$this->order->user,




            'status' => $this->status,
        ];
    }
}
