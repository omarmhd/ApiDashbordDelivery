<?php

namespace App\Http\Controllers;

use App\Models\UsedCoupon;
use App\Http\Requests\StoreUsedCouponRequest;
use App\Http\Requests\UpdateUsedCouponRequest;

class UsedCouponController extends Controller
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
     * @param  \App\Http\Requests\StoreUsedCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsedCouponRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsedCoupon  $usedCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(UsedCoupon $usedCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsedCoupon  $usedCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(UsedCoupon $usedCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsedCouponRequest  $request
     * @param  \App\Models\UsedCoupon  $usedCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsedCouponRequest $request, UsedCoupon $usedCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsedCoupon  $usedCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsedCoupon $usedCoupon)
    {
        //
    }
}
