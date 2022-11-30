<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\V1\OrderResource;
use App\Models\Extras;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderMealDetails;
use Illuminate\Support\Facades\DB;

class OrderController extends ApiBaseController
{

    public function index()
    {
        $orders = Order::where('user_id',auth()->user()->getKey())->get();
        return $this->setSuccess()->addItem(OrderResource::collection($orders))->getResponse();
    }

    public function show($id)
    {
        $order = Order::where('user_id',auth()->user()->getKey())->findOrFail($id);
        return $this->setSuccess()->addItem(new OrderResource($order))->getResponse();
    }

    public function store(StoreOrderRequest $request)
    {
        $order = $request->except('meals');
        $meals = $request->meals;
        try {
            DB::beginTransaction();

           $order = auth()->user()->orders()->create($order);

            // $order = Order::create($order);
            $total_price = 0;

            foreach ($meals as $meal) {
                $meal_price = Meal::where('id',$meal['meal_id'])->firstOrFail();
                $total_extra_price = Extras::whereIn('id',array_column($meal['extras'], 'id'))->get()->sum('price');
                OrderMealDetails::create([
                    'order_id' => $order->getKey(),
                    'meal_id' => $meal['meal_id'],
                    'total_price' => $meal_price->price,
                    'number_of_meals' => $meal['number_of_meals'],
                    'extras' => json_encode($meal['extras']),
                    'meal_extras' => json_encode($meal['meal_extras']),
                ]);

                $total_price += ($meal_price->price * $meal['number_of_meals']) + $total_extra_price;
            }
            $order->total_price = $total_price;
            $order->save();
            DB::commit();
            return $this->setSuccess(trans('messages.send_your_order'))
                ->getResponse();
        } catch (\Exception $e) {
            dd( $e->getMessage());
            DB::rollback();
             return $this->setError(trans('messages.something_wrong'))
            ->getResponse();
            // throw $e;
        }

    }


}
