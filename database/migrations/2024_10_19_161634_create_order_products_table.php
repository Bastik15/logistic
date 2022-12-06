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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('amount')->unsigned();
            $table->bigInteger('price')->unsigned();
            $table->timestamps();

            $table->index('product_id', 'order_product_product_idx');
            $table->foreign('product_id', 'order_product_product_fk')->references('id')->on('products');

            $table->index('order_id', 'order_product_order_idx');
            $table->foreign('order_id', 'order_product_order_fk')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
