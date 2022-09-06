<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Traits\APITrait;
use Exception;

class OrderController extends Controller
{

    use APITrait;

    public function store(StoreOrderRequest $request){
        return $this->returnData('order','hello','This is an order');

        try{
            dd($request->all());
        }catch(Exception $e){
            return $this->returnError('404', 'Problem happen while store an order.');
        }
    }

    public function index(){
        try{
            return $this->returnData('order', 'hello','this is order');
        }catch(Exception $e){
            return $this->returnError('404', 'Order has some issues');
        }
    }
}
