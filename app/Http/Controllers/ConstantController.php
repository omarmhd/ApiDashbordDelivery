<?php

namespace App\Http\Controllers;

use App\Models\Constant;
use App\Http\Requests\StoreConstantRequest;
use App\Http\Requests\UpdateConstantRequest;
use Yajra\DataTables\Facades\DataTables;

class ConstantController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        Constant::where(['key' => request('key')])->firstOrFail();
        $this->public_content = collect([
            'name' => trans('general.' .  request('key')),
            'singular_name' =>  trans('general.' .  request('key')),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($key)
    {
        return view('dashboard.constants.index')->with(['public_content' => $this->public_content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($key)
    {

        return view('dashboard.constants.create')->with(['public_content' => $this->public_content]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConstantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConstantRequest $request)
    {
        Constant::create(['parent_id' => $request->id, 'value' => $request->value]);
        session()->flash('success', 'تمت اضافة العنصر بنجاح');
        return redirect()->route('constants.index', ['key' => request('key')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function show(Constant $constant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function edit($key, Constant $constant)
    {
        return view('dashboard.constants.edit')->with(['public_content' => $this->public_content, 'constant' => $constant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConstantRequest  $request
     * @param  \App\Models\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function update($key, StoreConstantRequest $request, Constant $constant)
    {
        $constant->update(['value' => $request->value]);
        session()->flash('success', 'تمت تعديل العنصر بنجاح');
        return redirect()->route('constants.index', ['key' => request('key')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constant  $constant
     * @return \Illuminate\Http\Response
     */
    public function destroy($key, Constant $constant)
    {
        $constant->delete();
        session()->flash('success', 'تم حذف العنصر بنجاح');
        return redirect()->route('constants.index', ['key' => request('key')]);
    }

    public function datatable()
    {
        $data = Constant::with('children')->where('key', request('key'))->first()->children();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $actionBtn = '<a href="' . route('constants.edit', ['key' => request('key'), 'constant' => $data->id]) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })->rawColumns(['action'])->make(true);
    }
}
