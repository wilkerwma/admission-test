<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->integer('assigned_to');
            $table->integer('user_id')->unsigned();
            $table->integer('lane_id')->unsigned();
            $table->integer('board_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('tasks', function($table) {
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('lane_id')->references('id')->on('lanes');
          $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
