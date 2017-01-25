<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members');

            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars');

            $table->integer('seat')->unsigned();
            $table->integer('seat_left')->unsigned();

            $table->decimal('cost',5,2);
            $table->decimal('cost_perhead',5,2);

            $table->dateTime('date_time');      

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
        Schema::dropIfExists('rides');
    }
}