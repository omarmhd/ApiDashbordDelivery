<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'كوبونات',
            'singular_name' => 'كوبون'
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
            $data = Coupon::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('code', function ($data) {
                    return $data->code;
                })
                ->addColumn('ammount', function ($data) {
                    return $data->ammount;
                })
                ->addColumn('uses', function ($data) {
                    return $data->uses;
                })
                ->addColumn('status', function ($data) {
                    return $data->extras;
                })
                ->addColumn('start_avilable_at', function ($data) {
                    return $data->start_avilable_at;
                })
                ->addColumn('end_avilable_at', function ($data) {
                    return $data->end_avilable_at;
                })
                ->rawColumns(['id', 'code', 'ammount', 'uses', 'status', 'start_avilable_at', 'end_avilable_at'])
                ->make(true);
        }

        return view('dashboard.coupons.index')->with('public_content', $this->public_content);
    }

    public function all()
    {
        $coupons = Coupon::query();

        return DataTables::of($coupons)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.coupons.create')->with('public_content', $this->public_content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        // [
        //     'code' => '123456666',
        //     'ammount' => '200',
        //     'uses' => '2',
        //     'start_avilable_at' => date('Y-m-d H:i:s'),
        //     'end_avilable_at' => date('Y-m-d H:i:s'),
        // ]
        Coupon::firstOrCreate($request->validated());
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponRequest  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
