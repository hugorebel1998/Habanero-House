<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->string('nombre')->unique();
            $table->string('slug');
            $table->decimal('precio', 11,2)->default('0.00')->nullable();
            $table->integer('indescuento');
            $table->integer('descuento');
            $table->date('fecha_caduca_descuento')->nullable();
            // $table->integer('cantidad'); //Inventario
            $table->string('codigo_producto')->nullable();
            $table->string('imagen_producto');
            $table->text('descripcion');
            $table->unsignedBigInteger('editor_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
