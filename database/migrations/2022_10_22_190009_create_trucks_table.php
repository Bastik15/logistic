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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();

            $table->index('user_id', 'truck_user_idx');
            $table->foreign('user_id', 'truck_user_fk')->on('users')->references('id');
        });

        DB::table('trucks')->insert([
            ["name" => "Volvo FH16", "number" => 'Р777АХ'],
            ["name" => "Volvo FH", "number" => 'А333ЕА'],
            ["name" => "Volvo FE", "number" => 'У888КХ'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks');
    }
};
