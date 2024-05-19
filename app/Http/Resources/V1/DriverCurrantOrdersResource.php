<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DriverCurrantOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $id = auth()->user()->id;

        $driver_orders = DB::table('driver_order_requests')
            ->join('orders', 'orders.id', '=', 'driver_order_requests.order_id')
            ->where('driver_order_requests.driver_id', '=', $id)
            ->where('driver_order_requests.status', '==', 0)
            ->get();

        return [
            'driver_orders' => DriverOrderRequestsResource::collection($driver_orders),
        ];
    }
}
