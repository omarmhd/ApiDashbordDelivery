<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\V1\DriverCurrantOrdersResource;
use App\Http\Resources\V1\DriverOrdersResource;
use App\Http\Resources\V1\PersonalDataResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class DriverController extends ApiBaseController
{
    public function index()
    {

        $id = auth()->user()->id;
        // $id = 10;

        $driver_orders = DB::table('orders')
            ->join('driver_order_requests', 'orders.id', '=', 'driver_order_requests.order_id')
            ->where('driver_order_requests.driver_id', '=', $id)
            ->get();

        return $this->setSuccess(null, '200')
            ->addItem(new PersonalDataResource($driver_orders))
            ->getResponse();
    }

    public function orders()
    {
        $id = auth()->user()->id;
        // $id = 10;

        $driver_orders = DB::table('orders')
            ->join('driver_order_requests', 'orders.id', '=', 'driver_order_requests.order_id')
            ->where('driver_order_requests.driver_id', '=', $id)
            ->get();
        return $this->setSuccess(null, '200')
            ->addItem(new DriverOrdersResource($driver_orders))
            ->getResponse();
    }

    public function received_orders()
    {
        $id = auth()->user()->id;
        // $id = 10;

        $driver_orders = DB::table('orders')
            ->join('driver_order_requests', 'orders.id', '=', 'driver_order_requests.order_id')
            ->where('driver_order_requests.driver_id', '=', $id)
            ->where('status',  0)
            ->get();
        return $this->setSuccess(null, '200')
            ->addItem(new DriverOrdersResource($driver_orders))
            ->getResponse();
    }

    public function driver_completed_orders(){

        $id = auth()->user()->id;
        // $id = 10;

        $driver_orders = DB::table('orders')
            ->join('driver_order_requests', 'orders.id', '=', 'driver_order_requests.order_id')
            ->where('driver_order_requests.driver_id', '=', $id)
            ->where('driver_order_requests.status', '=', 3)
            ->get();
        return $this->setSuccess(null, '200')
            ->addItem(new DriverCurrantOrdersResource($driver_orders))
            ->getResponse();
    }

    public  function driver_accept_reject_order(Request $request){

        $id = auth()->user()->id;

       $edit= DB::table('driver_order_requests')->where("order_id",$request->order_id)->where("driver_id",$id)
            ->update([
            'status'=>$request->status
        ]);
       dd($edit);
        $driver_orders = DB::table('driver_order_requests')->where("order_id",$request->order_id)->where("driver_id",$id)->get();
        return $this->setSuccess(null, '200')
            ->addItem(new DriverCurrantOrdersResource($driver_orders))
            ->getResponse();

    }

    public function currantOrders(){

        $id = auth()->user()->id;
        // $id = 10;

        $driver_orders = DB::table('orders')
            ->join('driver_order_requests', 'orders.id', '=', 'driver_order_requests.order_id')
            ->where('driver_order_requests.driver_id', '=', $id)
            ->where('driver_order_requests.status', '=', 1)
            ->get();
        return $this->setSuccess(null, '200')
            ->addItem(new DriverCurrantOrdersResource($driver_orders))
            ->getResponse();
    }
}
