<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealCollection;
use App\Http\Resources\MealResource;
use App\Models\Meal;
use App\Traits\ApiResponder;

class MealsController extends Controller
{
    use ApiResponder;
    public function index()
    {
        $meals = Meal::with('extrasReL', 'attachments')->get();
        return $this->setSuccess()->addItem(MealResource::collection($meals))->getResponse();
    }

    public function show($id)
    {
        $meal = Meal::findOrFail($id);
        return $this->setSuccess()->addItem(new MealResource($meal))->getResponse();
    }

    public function search()
    {
        $meals = Meal::when(request()->word,function($query){
            $query
            ->whereHas('restaurant',function($q2){
                $q2->where('delivery_time','like','%'.request()->word.'%');
             })
            ->orWhere('name','like','%'.request()->word.'%')
            ->orWhere('price','like','%'.request()->word.'%')
            ->orWhere('review','like','%'.request()->word.'%')
            ->orWhere('description','like','%'.request()->word.'%')
            ->orWhereJsonContains('extras',[request()->word]);
        })->get();
        return $this->setSuccess()->addItem(MealResource::collection($meals))->getResponse();
    }
}
