<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Service\UploadService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'السلايدرات',
            'singular_name' => 'سلايد'
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
            $data = Slider::latest()->get();
            return DataTables::of($data)
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('image', function ($data) {
                    $img = '<img src="' . asset('images') . "/" . $data->attachment->name . '" alt="" class="img-fluid img-thumbnail" style="width:40%">';
                    return $img;
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('order_index', function ($data) {
                    return $data->order_index;
                })
                ->addColumn('status', function ($data) {
                    return $data->status == 0 ? 'معطل' : 'فعال';
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="' . route('slider.edit', $data) . '" class="edit btn btn-success btn-sm"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" data-id="' . $data->id . '"   class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })->rawColumns(['id', 'image', 'name', 'status', 'action'])
                ->make(true);
        }

        return  view('dashboard.slider.index')->with('public_content', $this->public_content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create')->with('public_content', $this->public_content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request, UploadService $service)
    {
        $data = $request->except('_token', 'image');
        $extras = Slider::create($data);

        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $extras->attachment()->create($attachment);
        }
        session()->flash('success', 'تم إنشاء السلايدر بنجاح');
        return  redirect()->route('slider.index');
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
    public function edit(Slider $slider)
    {
        $image = asset('images') . "/" . $slider->attachment->name;
        return view('dashboard.slider.edit',compact(['slider','image']))->with('public_content', $this->public_content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider, UploadService $service)
    {
        $data = $request->except('_token', 'image');

        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $slider->attachment->update($attachment);
        }
        $slider->update($data);

        session()->flash('success', 'تم تعديل سلايدر بنجاح');

        return  redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return response()->json(['status' => 'success']);
    }
}
