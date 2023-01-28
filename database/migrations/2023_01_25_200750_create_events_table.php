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
            $table->string('main_image')->nullable();
            $table->string('location');
            $table->boolean('featured_event')->default(0);
            $table->boolean('published')->default(0);
            $table->string('fb_page')->nullable();
            $table->string('ig_page')->nullable();
            $table->string('website')->nullable();
            $table->string('external_link')->nullable();
            //$table->string('results')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
