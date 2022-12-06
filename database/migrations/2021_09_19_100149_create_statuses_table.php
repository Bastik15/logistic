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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ["name" => "Новое"],
            ["name" => "На рассмотрении"],
            ["name" => "Принято к доставке"],
            ["name" => "В пути"],
            ["name" => "Доставлено"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
};
