<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\V1\ConstantResouece;
use App\Http\Resources\V1\SettingsResource;
use App\Models\Constant;
use App\Models\Settings;
use Illuminate\Http\Resources\Json\JsonResource;

class ConstantController extends ApiBaseController
{
    public function index()
    {
        $constants = Constant::where(['key'=>request('key')])->first()->children;
        return $this->setSuccess()->addItem(ConstantResouece::collection($constants))->getResponse();
    }

    public function setting(){
        $settings = Settings::findorfail(1);

        return $this->setSuccess()->addItem( new SettingsResource($settings))->getResponse();

    }
}
