<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Extras;
use App\Models\Meal;
use App\Models\Message;
use App\Models\Restaurant;
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
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '  <a href=' . route('meal.edit', $data) . '  class="btn btn-primary btn-bg"><i class="fa fa-pencil"></i></a>
                                    <a  data-id=' . $data->id . ' class="delete btn btn-danger btn-bg"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })->addColumn('active', function ($data) {
                    if ($data->active == 1) {
                        return "فَعَّال";
                    }
                    return "مُعَطَّلٌ";
                })->rawColumns(['active', 'action'])
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

        $meal = new Meal();
        $restaurants = Restaurant::select(['id', 'name'])->get();
        $extras = new Extras();
        $images = new Attachment();
        $categories=Category::all();


        return view('dashboard.meals.create', ['meal' => $meal, 'restaurants' => $restaurants, 'extras' => $extras, 'images' => $images,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMealRequest $request, UploadService $service)
    {

        $data = $request->except(
            'bread_name',
            'bread_price',
            'sweet_name',
            'sweet_price',
            'extras',
            '_token',
            'images'
        );
        $data['extras'] = json_encode($request->extras);
        $meal = Meal::create($data);


        $breads = [];
        if ($request->bread_name) {
            foreach ($request->bread_name  as $key => $value) {
                $breads[$key]['name'] = $request->bread_name[$key];;
                $breads[$key]['price'] = $request->bread_price[$key];;
                $breads[$key]['type'] = "bread";;
            }
        }

        $sweets = [];
        if ($request->sweet_name) {
            foreach ($request->sweet_name  as $key => $value) {
                $sweets[$key]['name'] = $request->sweet_name[$key];;
                $sweets[$key]['price'] = $request->sweet_price[$key];;
                $sweets[$key]['type'] = "sweet";;
            }
        }

        $extras = array_merge($sweets, $breads);
        $meal->extrasReL()->createMany($extras);

        $images = [];

        if ($request->images != null)
            foreach ($request->images as  $key => $value) {

                $images[$key]['name'] = $service->upload($value, 'images');

                $images[$key]['order'] = $key;
            }

        $meal->attachments()->createMany($images);

        session()->flash('success', "تم إضافة وجبة جديدة بنجاح");
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

        $sweets = $meal->extrasReL->where('type', 'sweet');
        $breads = $meal->extrasReL->where('type', 'bread');
        $extras = json_decode($meal->extras);
        $restaurants = Restaurant::select(['id', 'name'])->get();
        $images = $meal->attachments->pluck('name', 'order')->toArray();
        $categories = Category::get();

        return view(
            'dashboard.meals.edit',
            [
                'sweets' => $sweets,
                'breads' => $breads,
                'meal' => $meal,
                'extras' => $extras,
                'restaurants' => $restaurants,
                'images' => $images,
                'categories'=>$categories,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealRequest $request, Meal $meal, UploadService $service)
    {


        $data = $request->except('bread_name', 'bread_price', 'sweet_name', 'sweet_price', 'extras', '_token', 'extras', 'images');
        $data['extras'] = json_encode($request->extras);
        $meal->update($data);



        $breads = [];
        if ($request->bread_name) {
            foreach ($request->bread_name as $key => $value) {
                $breads[$key]['name'] = $request->bread_name[$key];;
                $breads[$key]['price'] = $request->bread_price[$key];;
                $breads[$key]['type'] = "bread";;
            }
        }
        $sweets = [];
        if ($request->sweet_name) {
            foreach ($request->sweet_name  as $key => $value) {
                $sweets[$key]['name'] = $request->sweet_name[$key];;
                $sweets[$key]['price'] = $request->sweet_price[$key];;
                $sweets[$key]['type'] = "sweet";;
            }
        }


        $extras = array_merge($sweets, $breads);
        $meal->extrasReL()->delete();

        $images = [];
        if ($request->image) {
            foreach ($request->image as $key => $value) {

                $name = $service->upload($value, 'images');

                $meal->attachments()->updateOrCreate(['name' => $name, 'order' => $key]);
            }
        }
        session()->flash('success', "تم تحديث   معلومات الوجبة  بنجاح");

        return redirect()->route('meal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
    }
}
