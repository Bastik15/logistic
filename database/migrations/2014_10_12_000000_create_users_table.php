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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->default(1);
            $table->rememberToken();
            $table->timestamps();

            $table->index('role_id', 'user_role_idx');
            $table->foreign('role_id', 'user_role_fk')->on('roles')->references('id');
        });

        DB::table('users')->insert([
            ["email" => "user@mail.ru", "password" => '$2y$10$G8LXTkO6b4tbKCItRLMJpOKhNCyvh4jcvNMpbDTyDWFi1LeAUcrJu', "role_id" => "1"],
            ["email" => "admin@mail.ru", "password" => '$2y$10$G8LXTkO6b4tbKCItRLMJpOKhNCyvh4jcvNMpbDTyDWFi1LeAUcrJu', "role_id" => "2"],
            ["email" => "manager@mail.ru", "password" => '$2y$10$G8LXTkO6b4tbKCItRLMJpOKhNCyvh4jcvNMpbDTyDWFi1LeAUcrJu', "role_id" => "3"],
            ["email" => "worker@mail.ru", "password" => '$2y$10$G8LXTkO6b4tbKCItRLMJpOKhNCyvh4jcvNMpbDTyDWFi1LeAUcrJu', "role_id" => "4"],
            ["email" => "driver@mail.ru", "password" => '$2y$10$G8LXTkO6b4tbKCItRLMJpOKhNCyvh4jcvNMpbDTyDWFi1LeAUcrJu', "role_id" => "5"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
