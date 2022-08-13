<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Service\UploadService;
use Illuminate\Http\Request;
use LDAP\Result;
use Yajra\DataTables\Facades\DataTables;

class RestaurantController extends Controller
{

    protected $public_content;

    public function __construct()
    {
        $this->public_content = collect([
            'name' => 'وجبات الطلب',
            'singular_name' => 'وجبة الطلب'
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
            $data = Restaurant::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('phone', function ($data) {
                    return $data->phone;
                })
                ->addColumn('active', function ($data) {
                    return $data->active;
                })
                ->addColumn('review', function ($data) {
                    return $data->review;
                })
                ->addColumn('address', function ($data) {
                    return $data->address;
                })
                ->addColumn('action', function ($data) {
                    $actionBtn = "<a href='" . route('restaurant.edit', $data->id)  . "' class='btn btn-warning btn-sm'><i class='fa fa-pencil-square-o'></i></a>
                                  <a data-id='$data->id' class='delete btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>";
                    return $actionBtn;
                })
                // ->addColumn('image', function ($data) {
                //     $imageTag = "<img class='img-thumbnail' src=" . asset("images") . "/" . $data->attachment->name . ">";
                //     return $imageTag;
                // })
                // ->addColumn('action', function ($data) {
                //     $actionBtn = '<a href="' . route('restaurant.edit', $data) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                ->rawColumns(['id', 'name', 'phone', 'active', 'review', 'address', 'action'])
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
        $restaurant = new Restaurant();
        return view('dashboard.restaurants.create', ['restaurant' => $restaurant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurantRequest $request, UploadService $service)
    {
        $data = $request->except(['image']);

        $restaurant = Restaurant::create($data);

        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $restaurant->attachment()->create($attachment);
        }

        session()->flash('success', 'تم إنشاء مطعم جديد بنجاح');
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
        return view('dashboard.restaurants.edit', compact('restaurant'))->with('public_content', $this->public_content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant, UploadService $service)
    {
        $restaurant->update($request->validated());

        if ($request->image) {
            $attachment['name'] = $service->upload($request->image, 'images');
            $restaurant->attachment->update($attachment);
        }

        session()->flash('success', 'تم تحديث المطعم بنجاح');
        return redirect()->route('restaurant.index');
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
