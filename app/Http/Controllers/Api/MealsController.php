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

        try {
        $meal=Meal::with('extrasReL','attachments')->get();
        return MealResource::collection($meal);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }}


    public function show(Meal $meal){
        try {

            return MealResource::collection($meal);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }}

}
