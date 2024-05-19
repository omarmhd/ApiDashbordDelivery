<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExtraRequest;
use App\Http\Requests\UpdateExtraRequest;
use App\Models\Extras;
use App\Service\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Extras::latest()->get();
            return DataTables::of($data)
                // ->addColumn('id', function ($data) {
                //     return $data->id;
                // })
                ->addColumn('image', function ($data) {
                    $img = '<img src="' . asset('images') . "/" . optional($data->attachment)->name . '" alt="" class="img-fluid img-thumbnail" style="width:40%">';
                    return $img;
                })
                // ->addColumn('name', function ($data) {
                //     return $data->name;
                // })
                // ->addColumn('price', function ($data) {
                //     return $data->price;
                // })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('extra.edit', $data->getKey()) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->getKey() . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns([ 'image','action'])
                ->make(true);
        }

        return  view('dashboard.extras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extra = new Extras();
        return view('dashboard.extras.create', ['extra' => $extra]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExtraRequest $request, UploadService $service)
    {

        $data = $request->except('_token', 'image');
        $extras = Extras::create($data);

        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $extras->attachment()->create($attachment);
        }
        Session::flash('success', 'تم إضافة الإضافة بنجاح');
        return  redirect()->route('extra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function show(Extras $extras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function edit(Extras $extra)
    {
        return view('dashboard.extras.edit', ['extra' => $extra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExtraRequest $request, Extras $extra, UploadService $service)
    {

        $data = $request->except('_token', 'image');



        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $extra->attachment->update($attachment);
        }
        $extra->update($data);

        session()->flash('success', 'تم إنشاء إضافة وجبة جديدة بنجاح');

        return  redirect()->route('extra.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Extras  $extras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extras $extras)
    {
        //
    }
}
