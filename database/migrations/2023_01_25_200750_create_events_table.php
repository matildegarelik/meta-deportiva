<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('clasification');
            $table->string('name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('description');
            $table->string('main_image');
            $table->string('location');
            $table->boolean('featured_event');
            $table->string('fb_page');
            $table->string('ig_page');
            $table->string('website');
            $table->string('external_link');
            $table->string('results');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('organizador_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('organizador_id')->references('id')->on('users');
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
        Schema::dropIfExists('events');
    }
};
