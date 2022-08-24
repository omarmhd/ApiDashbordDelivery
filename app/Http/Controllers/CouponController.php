<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Driver;
use App\Models\Role;
use App\Models\SelectedUsersCoupon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends MainController
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
                    return $data->status == 'ACTIVE' ? 'مفعل' : 'غير مفعل';
                })
                ->addColumn('is_selected', function ($data) {
                    return $data->is_selected;
                })
                ->addColumn('start_avilable_at', function ($data) {
                    return $data->start_avilable_at;
                })
                ->addColumn('end_avilable_at', function ($data) {
                    return $data->end_avilable_at;
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = "<a href='/coupon/" . $data->id . "/edit' class='btn btn-warning btn-sm'><i class='fa fa-pencil-square-o'></i></a>
                                  <a data-id='$data->id' class='delete btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
                    return $actionBtn;
                })
                ->rawColumns(['id', 'code', 'ammount', 'uses', 'status', 'start_avilable_at', 'end_avilable_at', 'action'])
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
    public function create(Request $request)
    {
        // $GLOBALS['old_selected'] = $request->old('selected');
        // if ($GLOBALS['old_selected'] != null)
        //     dd('enter');
        // dump($GLOBALS['old_selected']);
        // dd($request->old('selected'));
        // global $old_selected;
        // global $old_selected;
        // $GLOBALS['old_selected'] = $request->old('selected');


        // if ($request->ajax()) {
        //     $data = User::latest()->get();
        //     $old_request = old('selected');
        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('checkbox', function ($data) use ($old_request) {
        //             if ($old_request != null)
        //                 foreach ($old_request as $selected)
        //                     if ($selected == $data->id)
        //                         return "<input type='checkbox' class='checkboxes' value='$data->id' name='selected[]' checked />";
        //             return "<input type='checkbox' class='checkboxes' value='$data->id' name='selected[]'/>";
        //         })
        //         ->addColumn('name', function ($data) {
        //             return $data->first_name;
        //         })
        //         ->rawColumns(['checkbox', 'name'])
        //         ->make(true);
        // }

        $clients = User::whereRoleIs('client')->get();

        // $users = User::all();

        // $drivers = Driver::get('user_id');

        // foreach ($drivers as $driver)
        //     if ($driver->user_id == $user->id) {
        //         $users->forget($user->id);
        //         break;
        //     }

        return view('dashboard.coupons.create', compact('clients'))->with('public_content', $this->public_content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {

        $coupon = Coupon::firstOrCreate($request->validated());
        if ($request->is_selected) {
            $users = collect();
            foreach ($request->selected as $user) {
                $users->add(['user_id' => $user, 'coupon_id' => $coupon->id]);
            }
            SelectedUsersCoupon::insert($users->toArray());
        }

        session()->flash('success', 'تم إنشاء قسيمة شرائية جديدة بنجاح');
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
        $users = User::all();
        // dd($coupon);
        return view('dashboard.coupons.edit', compact('coupon', 'users'))->with('public_content', $this->public_content);
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
        $coupon->update($request->validated());
        session()->flash('success', 'تم تعديل القسيمة الشرائية بنجاح');
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {

        $coupon->delete();
        session()->flash('success', 'تم حذف القسيمة الشرائية');
        return redirect()->route('coupon.index');
    }
}
