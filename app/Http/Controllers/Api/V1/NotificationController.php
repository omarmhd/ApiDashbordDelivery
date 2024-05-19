<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\V1\NotficationResource;
use App\Models\notification;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationController extends ApiBaseController
{
    public function show()
    {
        $notifications = notification::where('user_id',auth()->user()->getKey())->get();

        return $this->setSuccess()->addItem(NotficationResource::collection($notifications))->getResponse();



    }
}
