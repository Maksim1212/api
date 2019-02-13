<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
         ///   $table->integer('user_id');
            $table->string('name');
            $table->string('condition');
            $table->integer('age');
            $table->string('free');
            $table->timestamp('start_route_at')->nullable();
            $table->timestamp('finish_route_at')->nullable();
            $table->timestamp('start_repairs_at')->nullable();
            $table->timestamp('finish_repairs_at')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
