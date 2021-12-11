<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['boleta','factura'])->default('boleta');
            $table->unsignedBigInteger('socio_id');
            $table->foreign('socio_id')->references('id')->on('users');
            $table->text('concepto',500);
            $table->double('total',10,2);
            $table->double('igv',8,2);
            $table->double('opgravadas',8,2);
            $table->double('opinafectas',8,2);
            $table->double('opexoneradas',8,2);
            $table->enum('estadofe',[0,1,2])->default(0);
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
        Schema::dropIfExists('pagos');
    }
}
