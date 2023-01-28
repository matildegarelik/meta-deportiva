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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_last_name');
            $table->string('mother_last_name');
            $table->date('date_of_birth');
            $table->string('blood_type')->nullable();
            $table->string('allergies')->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->string('team')->nullable();
            $table->string('phone_number');
            $table->string('profile_picture')->nullable();
            // Emergency contact
            $table->string('ec_name')->nullable();
            $table->string('ec_relationship')->nullable();
            $table->string('ec_phone')->nullable();
            //Address
            $table->string('street_number')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes');
    }
};
