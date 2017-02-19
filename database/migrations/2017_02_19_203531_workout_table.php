<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workout_group_id')->unsigned()->index();
            $table->integer('exercise_id')->unsigned()->index();
            $table->integer('sets')->default(1)->index();
            $table->integer('reps')->default(10)->index();
            $table->dateTime('due_at')->nullable();
            $table->dateTime('completed_at')->nullable();
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
        Schema::dropIfExists('workouts');
    }
}
