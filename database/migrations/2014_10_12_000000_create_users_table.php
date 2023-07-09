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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('npk')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->nullable();
            $table->foreignId('lokasi_id')->constrained()->onDelete('cascade');
            $table->foreignId('lokasi_estate_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('lokasi_id')
            // ->references('id')->on('lokasis');
        });
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
