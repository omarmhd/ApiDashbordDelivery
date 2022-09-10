<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RestaurantResource;
use App\Models\Restaurant;
use App\Traits\ApiResponder;

class RestaurantController extends Controller
{
    use ApiResponder;
    public function index()
    {
        $restaurant = Restaurant::get();
        return $this->setSuccess('', 200)
        ->addItem(RestaurantResource::collection($restaurant))
        ->getResponse();
    }
}
