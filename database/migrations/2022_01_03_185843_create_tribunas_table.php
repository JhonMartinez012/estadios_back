<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTribunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('tribunas', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('nombre_tribuna',45);
            $table->string('capacidad',7);
            $table->double('valor_boleta',8,2);

            $table->unsignedBigInteger('estadio_id');
            $table->foreign('estadio_id')->references('id')->on('estadios');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('tribunas');
    }
}
