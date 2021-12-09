<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->integer('numero_orden')->nullable();
            $table->integer('orden_tipo')->default(0);
            $table->decimal('subtotal', 11,2)->nullable()->default(0);
            $table->decimal('deliver', 11,2)->nullable();
            $table->decimal('total', 11, 2)->nullable();
            $table->integer('metodo_pago')->nullable();
            $table->text('info_pago')->nullable();
            $table->dateTime('fecha_pago')->nullable();
            $table->integer('user_addeerss_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
