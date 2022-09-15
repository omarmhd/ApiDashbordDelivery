<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\MealResource;
use App\Http\Resources\SliderResource;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Slider;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $sliders = Slider::where('status', 1)->limit(12)->orderByDesc('order_index')->get();
        $resturantes = Restaurant::limit(4)->get();
        $meals = Meal::limit(2)->get();
        $categories = Category::limit(5)->get();

        return[
            'sliders' => SliderResource::collection($sliders),
            'resturantes' => RestaurantResource::collection($resturantes),
            'meals' => MealResource::collection($meals),
            'categories' => CategoryResource::collection($categories),
        ];
    }
}
