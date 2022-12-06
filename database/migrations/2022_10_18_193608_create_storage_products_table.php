<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('storage_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->integer('price')->nullable();

            $table->timestamps();


            $table->index('storage_id', 'user_storage_idx');
            $table->index('product_id', 'user_product_idx');
            $table->foreign('storage_id', 'user_storage_fk')->on('storages')->references('id');
            $table->foreign('product_id', 'user_product_fk')->on('products')->references('id');
        });

        DB::table('storage_products')->insert([
            ["storage_id" => 1, "product_id" => 1, "amount" => 30, "price" => 8990],
            ["storage_id" => 1, "product_id" => 2, "amount" => 60, "price" => 4990],
            ["storage_id" => 1, "product_id" => 3, "amount" => 28, "price" => 8990],
            ["storage_id" => 1, "product_id" => 4, "amount" => 16, "price" => 18990],
            ["storage_id" => 1, "product_id" => 5, "amount" => 35, "price" => 7990],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_products');
    }
};
