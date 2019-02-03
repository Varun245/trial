<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('trainer_name');
            $table->string('topic_name');
            $table->text('description');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedInteger('room_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');  
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
        Schema::dropIfExists('trainings');
    }
}
