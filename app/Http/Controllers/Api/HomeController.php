<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\V1\HomeResource;

class HomeController extends ApiBaseController
{
    public function index()
    {

        return $this->setSuccess(null, '200')
            ->addItem(new HomeResource(1))
            ->getResponse();
    }
}
