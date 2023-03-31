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
        Schema::create('extra_pages', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('content')->default('');
            $table->boolean('menu')->default(1);
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            //$table->timestamps();
        });
        Schema::table('clasifications', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_pages');
        Schema::table('clasifications', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
