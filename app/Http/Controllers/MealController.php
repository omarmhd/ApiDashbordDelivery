<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service\UploadService;

class MealController extends Controller
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
        return view('dashboard.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,UploadService $service )
    {


        $data=$request->except('bread_name','bread_price','sweet_name','sweet_price','extras','_token','extras','images');
        $data['extras']=json_encode($request->extras);
        $meal=Meal::create($data);



        $breads = [];
        foreach ($request->bread_name  as $key => $value) {
            $breads[$key]['name'] = $request->bread_name[$key];;
            $breads[$key]['price'] = $request->bread_price[$key];;
            $breads[$key]['type'] = "bread";;

        }


        $sweets = [];
        foreach ($request->sweet_name  as $key => $value) {
            $sweets[$key]['name'] = $request->sweet_name[$key];;
            $sweets[$key]['price'] = $request->sweet_price[$key];;
            $sweets[$key]['type'] = "sweet";;

        }


        $extras=array_merge( $sweets, $breads);
        $meal->extras()->createMany($extras);

        $images=[];

        foreach($request->image as  $key =>$value){



                $images[$key]['name'] = $service->upload($value, 'images');

                $images[$key]['order'] = $key;

        }
        $meal->attachments()->createMany($images);



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
        //
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
