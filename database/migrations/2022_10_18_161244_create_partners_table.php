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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('role_id');

            $table->timestamps();
            $table->index('role_id', 'partners_role_idx');
            $table->foreign('role_id', 'partners_role_fk')->on('role_partners')->references('id');
        });

        DB::table('partners')->insert([
            ['title' => 'ООО "Горизонт"', 'role_id' => 1],
            ['title' => 'ООО "Мебель Черноземья"', 'role_id' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
};
