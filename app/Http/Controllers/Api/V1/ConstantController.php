<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\V1\ConstantResouece;
use App\Models\Constant;

class ConstantController extends ApiBaseController
{
    public function index()
    {
        $constants = Constant::where(['key'=>request('key')])->first()->children;
        return $this->setSuccess()->addItem(ConstantResouece::collection($constants))->getResponse();
    }
}
