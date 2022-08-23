<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $data = User::whereRoleIs('driver')->latest()->get();

        if ($request->ajax()) {


            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('notes', function ($data) {
                    return $data->driver->notes;
                })
                ->addColumn('available', function ($data) {
                    return $data->driver->available == 1 ? 'متاح' : 'غير متاح';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('driver.edit', [$data]) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['notes', 'available', 'action'])
                ->make(true);
        }

        return view('dashboard.users.drivers.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $driver = Driver::findorfail($id);

        return view('dashboard.users.drivers.edit', ['driver' => $driver]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $driver = Driver::where('user_id', $id)->update($data);
        if ($driver) {
            return redirect()->route('driver.index')->with('success', 'تم التعديل بنجاح');
        } else {
            return redirect()->back()->with('error', 'خطأ في عملية تعديل البيانات');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {

        $delete = $driver->delete();
        if ($delete) {

            return redirect()->route('driver.index')->with('success', 'تم الحذف بنجاح');
        } else {
            return redirect()->back()->with('error', 'خطأ في عملية الحذف');
        }
    }
}
