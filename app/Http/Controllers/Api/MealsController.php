<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MealCollection;
use App\Http\Resources\MealResource;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function index(){
        $meal=Meal::with('extrasReL','attachments')->get();
        return MealResource::collection(Meal::all());

    }
}
