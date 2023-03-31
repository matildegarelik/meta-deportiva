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
        Schema::table('event_inscriptos', function (Blueprint $table) {
            $table->string('estado')->default('Pendiente');
            $table->string('metodo_pago')->default('Efectivo');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('first_time')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_inscriptos', function (Blueprint $table) {
            $table->dropColumn('estado');
            $table->dropColumn('metodo_pago');
            $table->dropTimestamps();
            $table->dropSoftDeletes();
            $table->dropColumn('first_time');
        });
    }
};
