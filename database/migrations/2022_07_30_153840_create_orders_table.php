<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('total_price', 4, 2);
            $table->enum('status', ['NOT_GET_YET', 'GET_ORDER', 'IN_WAY', 'IN_LOCATION'])->default('NOT_GET_YET');
            $table->dateTime('total_arrive_time');
            $table->enum('payment_way', ['VISA', 'MASTER', 'BY_HAND']);
            $table->dateTime('delivery_time')->nullable();
            $table->dateTime('time_of_receipt')->nullable();
            $table->string('notes')->nullable();
            $table->enum('rate', [1, 2, 3, 4, 5])->default(5);
            // $table->foreignId('driver_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('orders');
    }
}
