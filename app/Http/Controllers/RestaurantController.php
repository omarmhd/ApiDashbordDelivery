<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantRequest;
use App\Models\Attachment;
use App\Models\Restaurant;
use App\Models\User;
use App\Service\UploadService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Restaurant::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($data){
                        $imageTag = "<img class='img-thumbnail' src=".asset("images")."/".$data->attachment->name.">";
                    return $imageTag;
                })
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="'.route('restaurant.edit',$data).'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }


        return  view('dashboard.restaurants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant=new Restaurant();
        return view('dashboard.restaurants.create',['restaurant'=>$restaurant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurantRequest $request,UploadService $service)
    {

        $data=$request->except(['image']);

        $restaurant=Restaurant::create($data);

        if($request->image){
            $attachment['name']=$service->upload($request->image,'images');
            $restaurant->attachment()->create($attachment);
        }





        return redirect()->route('restaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
