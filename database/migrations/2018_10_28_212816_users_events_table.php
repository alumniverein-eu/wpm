<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users_events', function (Blueprint $table) {
          $table->increments('id');
          $table->string('number')->nullable();
          $table->string('role')->nullable();
          $table->json('data')->nullable();
          $table->boolean('attendance')->default(0);
          $table->integer('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
          $table->integer('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
          $table->rememberToken();
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
        Schema::dropIfExists('users_events');
    }
}
