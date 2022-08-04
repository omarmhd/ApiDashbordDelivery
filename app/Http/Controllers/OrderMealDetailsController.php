<?php

namespace App\Http\Controllers;

use App\Models\OrderMealDetails;
use App\Http\Requests\StoreOrderMealDetailsRequest;
use App\Http\Requests\UpdateOrderMealDetailsRequest;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderMealDetailsController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'وجبات الطلب',
            'singular_name' => 'وجبة الطلب'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order_id, Request $request)
    {
        if ($request->ajax()) {
            $data = OrderMealDetails::where('order_id', $order_id)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('order_id', function ($data) {
                    return $data->order_id;
                })
                ->addColumn('meal_id', function ($data) {
                    return $data->meal_id;
                })
                ->addColumn('number_of_meals', function ($data) {
                    return $data->number_of_meals;
                })
                ->addColumn('extras', function ($data) {
                    return $data->extras;
                })
                ->addColumn('total_price', function ($data) {
                    return $data->total_price;
                })
                ->rawColumns(['id', 'order_id', 'meal_id', 'number_of_meals', 'extras', 'total_price'])
                ->make(true);
        }

        return view('dashboard.orderMealDetails.index', compact('order_id'))->with('public_content', $this->public_content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order_id)
    {
        return view('dashboard.orderMealDetails.create', compact('order_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderMealDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderMealDetailsRequest $request, $order_id)
    {
        $extars = collect([
            'extra_id' => '1',
            'number_of_extras' => 3
        ])->toJson();
        OrderMealDetails::create([
            'order_id' => Order::first()->id,
            'meal_id' => Meal::first()->id,
            'number_of_meals' => 2,
            'extras' => $extars,
            'total_price' => 20,
        ]);

        return redirect()->route('order.meal_details.index', compact('order_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderMealDetails  $orderMealDetails
     * @return \Illuminate\Http\Response
     */
    public function show(OrderMealDetails $orderMealDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderMealDetails  $orderMealDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderMealDetails $orderMealDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderMealDetailsRequest  $request
     * @param  \App\Models\OrderMealDetails  $orderMealDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderMealDetailsRequest $request, OrderMealDetails $orderMealDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderMealDetails  $orderMealDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderMealDetails $orderMealDetails)
    {
        //
    }
}
