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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('unit_sum');
            $table->integer('profit');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('credit')->default(0);
            $table->integer('paid_amount')->nullable();
            $table->string('sell_to')->nullable();
            $table->string('sell_by');
            $table->timestamp('purchase_date')->useCurrent();
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
        Schema::dropIfExists('sells');
    }
};
