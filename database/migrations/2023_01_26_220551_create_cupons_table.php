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
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->float('discount_amount')->default(0);
            $table->integer('percentage')->default(0);
            $table->date('valid_from')->useCurrent();
            $table->date('valid_to')->nullable();
            $table->integer('usage_limit')->default(999);
            $table->bigInteger('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
