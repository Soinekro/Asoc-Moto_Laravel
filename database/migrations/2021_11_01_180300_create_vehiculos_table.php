<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('socio_id');
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
            $table->string('placa',6)->unique();
            $table->string('titulo')->unique();
            $table->string('soat')->unique();
            $table->string('modeloVehiculo');
            $table->string('serieMotor')->unique();
            $table->enum('type_veh',['Torito','Normal']);
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
        Schema::dropIfExists('vehiculos');
    }
}
