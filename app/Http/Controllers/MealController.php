<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMealRequest;
use App\Models\Meal;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service\UploadService;
use Yajra\DataTables\DataTables;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Meal::latest()->get();
            return DataTables::of($data)

                ->addColumn('action', function($data){
                    $actionBtn = ' <a  data-id='.$data->id.' class="delete btn btn-danger btn-bg"><i class="fa fa-trash"></i></a>
 <a href='.route('meal.edit',$data).'  class="btn btn-primary btn-bg"><i class="fa fa-pencil"></i></a>

 ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return  view('dashboard.meals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMealRequest $request,UploadService $service )
    {

        $data = $request->except('bread_name', 'bread_price', 'sweet_name', 'sweet_price', 'extras', '_token', 'extras', 'images');
        $data['extras'] = json_encode($request->extras);
        $meal = Meal::create($data);

        $breads = [];
        foreach ($request->bread_name  as $key => $value) {
            $breads[$key]['name'] = $request->bread_name[$key];
            $breads[$key]['price'] = $request->bread_price[$key];
            $breads[$key]['type'] = "bread";
        }


        $sweets = [];
        foreach ($request->sweet_name  as $key => $value) {
            $sweets[$key]['name'] = $request->sweet_name[$key];
            $sweets[$key]['price'] = $request->sweet_price[$key];
            $sweets[$key]['type'] = "sweet";
        }


        $extras = array_merge($sweets, $breads);
        $meal->extras()->createMany($extras);

        $images = [];

        foreach ($request->image as  $key => $value) {

            $images[$key]['name'] = $service->upload($value, 'images');

            $images[$key]['order'] = $key;
        }
        $meal->attachments()->createMany($images);

        session()->flash('success',"تم إضافة وجبة جديدة بنجاح");
        return redirect()->route('meal.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {

       $sweets=$meal->extrasReL->where('type','sweet');
       $breads=$meal->extrasReL->where('type','bread');


       return view('');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
