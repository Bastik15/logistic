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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('storage_id')->default(1);
            $table->unsignedBigInteger('status_id')->default(1);
            $table->boolean('is_performed')->default(0);
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->date('deadline');

            $table->timestamps();


            $table->index('type_id', 'orders_type_idx');
            $table->index('partner_id', 'orders_partner_idx');
            $table->index('client_id', 'orders_client_idx');
            $table->index('storage_id', 'orders_storage_idx');
            $table->index('status_id', 'orders_status_idx');
            $table->index('driver_id', 'orders_driver_idx');

            $table->foreign('type_id', 'orders_type_fk')->on('type_orders')->references('id');
            $table->foreign('partner_id', 'orders_partner_fk')->on('partners')->references('id');
            $table->foreign('client_id', 'orders_client_fk')->on('users')->references('id');
            $table->foreign('storage_id', 'orders_storage_fk')->on('storages')->references('id');
            $table->foreign('status_id', 'orders_status_fk')->on('statuses')->references('id');
            $table->foreign('driver_id', 'orders_driver_fk')->on('users')->references('id');
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
};
