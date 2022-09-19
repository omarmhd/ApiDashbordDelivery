<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\V1\HomeResource as V1HomeResource;

class HomeController extends ApiBaseController
{
    public function index()
    {
        return $this->setSuccess(null, '200')
            ->addItem(new V1HomeResource(1))
            ->getResponse();
    }

}
