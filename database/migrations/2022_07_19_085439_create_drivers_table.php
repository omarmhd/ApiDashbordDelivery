<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {

            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();;

            $table->boolean('available')->default(0);
            $table->unique('user_id');
            $table->text('notes')->default('لا يوجد ملاحظات');

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
        Schema::dropIfExists('drivers');
    }
}
