<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJustificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('socio_id');
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('evento_socios_id');
            $table->foreign('evento_socios_id')->references('id')->on('evento_socios')->onDelete('cascade')->onUpdate('cascade');
            $table->text('justificacion')->comment('describe una justificacion para no asistir al evento');
            $table->enum('status',[0,1,2])->default(1)->comment('0 aprobado, 1 pendiente,2 Aprobado');
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
        Schema::dropIfExists('justificacions');
    }
}
