<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('products');
            $table->string('quantity');
            $table->string('price');
            $table->string('unit_sum');
            $table->string('order_sum');
            $table->integer('credit')->default(0);
            $table->string('purchase_from')->nullable();
            // $table->foreign('purchase_by')->references('id')->on('users');
            $table->string('purchase_by');
            $table->string('description');
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
        Schema::dropIfExists('purchase_orders');
    }
};
