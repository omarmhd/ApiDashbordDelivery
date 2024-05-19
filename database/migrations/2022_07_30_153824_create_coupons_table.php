<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('ammount');
            $table->integer('uses')->default(0);
            $table->enum('status', ['ACTIVE', 'NOT_ACTIVE'])->default('ACTIVE');
            $table->boolean('is_selected')->default(0); // 1: For coupon that is private for selected group of people, 0: For public use coupon
            $table->dateTime('start_avilable_at');
            $table->dateTime('end_avilable_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
