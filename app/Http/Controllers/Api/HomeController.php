<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Slider;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class HomeController extends ApiBaseController
{
    public function index()
    {

        return $this->setSuccess(null, '200')
            ->addItem(new HomeResource(1))
            ->getResponse();
    }

}
