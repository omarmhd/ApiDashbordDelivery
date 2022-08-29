<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MealResource;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        return CategoryResource::collection(Category::all());

    }

    public function show($id){
        $meals=Meal::where('category_id',$id)->get();

        return MealResource::collection($meals);

    }
}
