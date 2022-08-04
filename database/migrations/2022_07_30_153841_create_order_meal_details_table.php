<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMealDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_meal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete()->cascadeOnUpdate();
            //Meal Details
            $table->foreignId('meal_id')->constrained('meals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('number_of_meals')->default(1);
            $table->json('extras')->nullable();
            //Extras details
            // $table->json('categories')->nullable();// category_id, category_ammount
            $table->double('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_meal_details');
    }
}
