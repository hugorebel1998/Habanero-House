<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverages', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(1);
            $table->string('nombre');
            $table->integer('tipo_covertura');
            $table->decimal('precio', 11,2);
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('state_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
        Schema::dropIfExists('coverages');
    }
}
