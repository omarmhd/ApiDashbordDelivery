<?php

namespace App\Http\Controllers;

use App\Models\OrderMealDetails;
use App\Http\Requests\StoreOrderMealDetailsRequest;
use App\Http\Requests\UpdateOrderMealDetailsRequest;

class OrderMealDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderMealDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderMealDetailsRequest $request)
    {
        //
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
