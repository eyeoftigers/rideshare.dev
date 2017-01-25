<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutes extends Migration
{
     public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ride_id')->unsigned();
            $table->foreign('ride_id')->references('id')->on('rides');

            $table->float('from_geolat',10,6);
            $table->float('from_geolng',10,6);
      
            $table->float('to_geolat',10,6);
            $table->float('to_geolng',10,6);

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
        Schema::dropIfExists('routes');
    }
}
