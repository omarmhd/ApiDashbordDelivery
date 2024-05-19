<?php

namespace App\Http\Resources\V1;

use App\Models\Driver;
use App\Models\DriverOrderRequest;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DriverOrdersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // return $driver_orders;
        // dd($driver_orders);
        // $driver_orders = DriverOrderRequest::where('driver_id', $id)->select([
        //     'driver_orders' => Order::select('total_price')
        //         ->whereColumn('id', 'driver_order_requests.order_id')
        // ])->get();
        // DriverOrderRequest::where('driver_id', $id)->get('order_id');

        return [
            'driver_orders' => DriverOrderRequestsResource::collection($this),
        ];
    }
}
