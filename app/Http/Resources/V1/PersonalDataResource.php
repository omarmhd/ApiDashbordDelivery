<?php

namespace App\Http\Resources\V1;

use App\Models\Driver;
use App\Models\DriverOrderRequest;
use App\Models\Order;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalDataResource extends JsonResource
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
        $driver = User::where('id', $id)->get();
        $total_orders = DriverOrderRequest::where('driver_id', $id)->where('status', 1)->get()->count();
        $delivary_price = Settings::find(1)->delivary_price;

        return[
            'driver' => DriverResource::collection($driver),
            'total_orders' => $total_orders,
            'delivary_price' => $delivary_price * $total_orders,
        ];
    }
}
