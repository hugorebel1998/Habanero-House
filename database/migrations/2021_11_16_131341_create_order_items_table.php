<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->text('label_item')->nullable();
            $table->integer('cantidad')->default(1);
            $table->integer('descuento_status')->default(0);
            $table->date('fecha_caduca_descuento')->nullable();
            $table->integer('descuento')->default(0);
            $table->decimal('precio_original',11,2)->nullable();
            $table->decimal('precio_unitario', 11,2);
            $table->decimal('total', 11,2);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('orden_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('orden_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('inventory_id')->references('id')->on('product_inventaries');
            $table->foreign('variant_id')->references('id')->on('product_variants');
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
        Schema::dropIfExists('order_items');
    }
}
