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
        Schema::table('events', function (Blueprint $table) {
            $table->bigInteger('clasification_id')->unsigned()->index()->nullable();
            $table->foreign('clasification_id')->references('id')->on('clasifications');
            $table->dropColumn('clasification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('clasification_id');
            $table->dropColumn('clasification_id');
            $table->string('clasification');
        });
    }
};
