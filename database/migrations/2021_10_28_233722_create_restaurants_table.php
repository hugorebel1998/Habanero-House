<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_encargado')->nullable();
            $table->string('nombre_razon_social');
            $table->string('telefono_razon_social');
            $table->string('email_razon_social')->nullable();
            $table->string('direccion_razon_social')->nullable();
            $table->string('mantenimiento')->nullable()->default(0);
            $table->string('restaurante_galeria')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
