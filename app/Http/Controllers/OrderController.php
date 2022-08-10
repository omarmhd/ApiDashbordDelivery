<?php

namespace App\Http\Controllers;

use App\Models\{Order, User};
use App\Http\Requests\{StoreOrderRequest, UpdateOrderRequest};
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('total_price', function ($data) {
                    return $data->total_price;
                })
                ->addColumn('status', function ($data) {
                    return $data->status;
                })
                ->addColumn('total_arrive_time', function ($data) {
                    return $data->total_arrive_time;
                })
                ->addColumn('payment_way', function ($data) {
                    return $data->payment_way;
                })
                ->addColumn('driver', function ($data) {
                    return $data->driver == null ? 'None' : $data->driver->first_name;
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = "<a href='/order/" . $data->id . "/meal-details' class='info btn btn-info btn-sm'><i class='fa fa-eye'></i></a>
                                  <a href='/order/" . $data->id . "/select-driver' class='info btn btn-success btn-sm'><i class='fa fa-car'></i></a>
                                  <a href='/order/" . $data->id . "/edit' class='btn btn-warning btn-sm'><i class='fa fa-pencil-square-o'></i></a>
                                  <a data-id='$data->id' class='delete btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['id', 'total_price', 'status', 'total_arrive_time', 'payment_way', 'action'])
                ->make(true);
        }

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
    public function store(/*StoreOrderRequest $request*/)
    {
        // $order->validated();
        // dd(
        // $request->validate([
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
                // 'driver_id' => 2,
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
        $users = User::all();
        return view('dashboard.orders.edit', compact('order', 'users'))->with('public_content', $this->public_content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateorderRequest  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['status' => 'success']);
    }
}
