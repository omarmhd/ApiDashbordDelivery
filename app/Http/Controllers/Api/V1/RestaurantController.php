<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\V1\RestaurantResource;
use App\Models\Restaurant;

class RestaurantController extends ApiBaseController
{
    public function index()
    {
        $restaurant = Restaurant::get();
        return $this->setSuccess('', 200)
        ->addItem(RestaurantResource::collection($restaurant))
        ->getResponse();
    }
}
