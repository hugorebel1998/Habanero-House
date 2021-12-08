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
            $table->string('nombre_razon_social')->nullable();
            $table->string('nombre_encargado')->nullable();
            $table->string('telefono_razon_social')->nullable();
            $table->string('email_razon_social')->nullable();
            $table->integer('monto_minimo_de_compra')->nullable()->default(1);
            $table->string('direccion_razon_social')->nullable();
            $table->string('mantenimiento')->nullable()->default(0);
            $table->string('restaurante_galeria')->nullable();
            $table->integer('precio_envio')->nullable()->default(0);
            $table->decimal('valor_por_defecto',11,2)->nullable()->default(0);
            $table->decimal('cantidad_de_envio_min',11,2)->nullable()->default(0);
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->softDeletes();
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
