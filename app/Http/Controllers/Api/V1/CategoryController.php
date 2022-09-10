<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MealResource;
use App\Models\Category;
use App\Models\Meal;

class CategoryController extends ApiBaseController
{
    public function index()
    {
        $categories = Category::get();
        return $this->setSuccess()->addItem(CategoryResource::collection($categories))->getResponse();
    }

    public function show($id)
    {
        $meals = Meal::where('category_id', $id)->get();
        return $this->setSuccess()->addItem(MealResource::collection($meals))->getResponse();
    }
}
