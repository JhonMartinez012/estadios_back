<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadioMotivoInactividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadio_motivo_inactividad', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('estadio_id');
            $table->unsignedBigInteger('motivo_inactividad_id');

            $table->date('fecha');
            
            $table->foreign('estadio_id')->references('id')->on('estadios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('motivo_inactividad_id')->references('id')->on('motivos_inactividades')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');

            
            $table->timestamps();
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
        Schema::dropIfExists('estadio_motivo_inactividad');
    }
}
