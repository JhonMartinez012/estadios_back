<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadios', function (Blueprint $table) {
            $table->id();
            $table->String('nombre_estadio',45);
            $table->text('acerca_estadio');
            $table->string('img_principal',45);

            $table->unsignedBigInteger('terreno_id');
            $table->unsignedBigInteger('ciudad_id');

            $table->foreign('terreno_id')->references('id')->on('terrenos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');

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
        Schema::dropIfExists('estadios');
    }
}
