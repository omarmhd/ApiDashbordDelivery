<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\V1\DriverCurrantOrdersResource;
use App\Http\Resources\V1\DriverOrdersResource;
use App\Http\Resources\V1\PersonalDataResource;

class DriverController extends ApiBaseController
{
    public function index()
    {
        return $this->setSuccess(null, '200')
            ->addItem(new PersonalDataResource(1))
            ->getResponse();
    }

    public function orders()
    {
        return $this->setSuccess(null, '200')
            ->addItem(new DriverOrdersResource(1))
            ->getResponse();
    }

    public function currantOrders(){
        return $this->setSuccess(null, '200')
            ->addItem(new DriverCurrantOrdersResource(1))
            ->getResponse();
    }
}
