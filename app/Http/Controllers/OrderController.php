<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'الطلبات',
            'singular_name' => 'طلب'
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $orders = Order::query();

        // $orders = DataTables::of($orders)->toJson();

        return view('dashboard.orders.index' /*, compact('orders')*/)->with('public_content', $this->public_content);
    }

    public function all()
    {
        $orders = Order::query();

        return DataTables::of($orders)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.orders.create')->with('public_content', $this->public_content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $order)
    {
        // dd($order->all());
        // dd(User::first()->id);
        // $order->validated();
        // dd(
        // $order->validate([
        //     'user_id' => User::first()->id,
        //     'total_price' => '20',
        //     'status' => 'IN_WAY',
        //     'total_arrive_time' => date('Y-m-d H:i:s'),
        //     'payment_way' => 'VISA',
        //     'delivery_time' => date('Y-m-d H:i:s'),
        //     'time_of_receipt' => date('Y-m-d H:i:s'),
        //     'notes' => 'Hello World',
        //     'rate' => 1,
        //     'driver_id' => User::first()->id,
        // ])
        // );
        Order::firstOrCreate(
            // $order->validated()
            [
                'user_id' => User::first()->id,
                'total_price' => '20',
                'status' => 'IN_WAY',
                'total_arrive_time' => date('Y-m-d H:i:s'),
                'payment_way' => 'VISA',
                'delivery_time' => date('Y-m-d H:i:s'),
                'time_of_receipt' => date('Y-m-d H:i:s'),
                'notes' => 'Hello World',
                'rate' => 1,
                'driver_id' => User::first()->id,
            ]
        );
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
