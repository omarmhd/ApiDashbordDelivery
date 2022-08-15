<?php

namespace App\Http\Controllers;

use App\Models\DriverOrderRequest;
use App\Http\Requests\StoreDriverOrderRequestRequest;
use App\Http\Requests\UpdateDriverOrderRequestRequest;
use App\Models\Driver;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DriverOrderRequestController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'السائقين',
            'singular_name' => 'سائق'
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
            $data = DriverOrderRequest::where('order_id', $order_id)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('order_id', function ($data) {
                    return $data->order_id;
                })
                ->addColumn('driver_id', function ($data) {
                    //
                    return $data->driver->first_name;
                })
                ->addColumn('status', function ($data) {
                    return $data->status;
                })
                ->rawColumns(['id', 'order_id', 'driver_id', 'status'])
                ->make(true);
        }

        return view('dashboard.driverOrderRequest.index', compact('order_id'))->with('public_content', $this->public_content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order_id)
    {
        $drivers = User::whereRoleIs('driver')->get();
        return view('dashboard.driverOrderRequest.create', compact('order_id', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriverOrderRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverOrderRequestRequest $request, $order_id)
    {
        DriverOrderRequest::create($request->validated());
        // Notify driver about that order
        session()->flash('success', 'تم إرسال طلب التوصيل للسائق بنجاح');
        return redirect()->route('order.select_driver.index', compact('order_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriverOrderRequest  $DriverOrderRequest
     * @return \Illuminate\Http\Response
     */
    public function show(DriverOrderRequest $DriverOrderRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriverOrderRequest  $DriverOrderRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverOrderRequest $DriverOrderRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverOrderRequestRequest  $request
     * @param  \App\Models\DriverOrderRequest  $DriverOrderRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverOrderRequestRequest $request, DriverOrderRequest $DriverOrderRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriverOrderRequest  $DriverOrderRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverOrderRequest $DriverOrderRequest)
    {
        //
    }
}
