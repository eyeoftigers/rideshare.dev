<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_preferences', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_id')->unsigned();
            $table->unique('member_id');
            $table->foreign('member_id')->references('id')->on('members');

            $table->integer('music_preference_id')->unsigned();
            $table->foreign('music_preference_id')->references('id')->on('music_preferences');

            $table->integer('chitchat_preference_id')->unsigned();
            $table->foreign('chitchat_preference_id')->references('id')->on('chitchat_preferences');

            $table->integer('smoking_preference_id')->unsigned();
            $table->foreign('smoking_preference_id')->references('id')->on('smoking_preferences');


            $table->integer('pet_preference_id')->unsigned();
            $table->foreign('pet_preference_id')->references('id')->on('pet_preferences');


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
        Schema::dropIfExists('member_preferences');
    }
}
