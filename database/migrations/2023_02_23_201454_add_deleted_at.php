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
        Schema::table('questions', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('organizers', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('cupons', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('participantes', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('organizers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('cupons', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('participantes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
