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
        Schema::create('perjalanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruitsku_id')->constrained()->onDelete('cascade');
            $table->string('kab_asal')->nullable();
            $table->string('kab_tiba')->nullable();
            $table->integer('org_transport')->nullable();
            $table->integer('org_cefetaria')->nullable();
            $table->integer('kolom1')->nullable();
            $table->integer('kolom2')->nullable();
            $table->float('total_cafetaria')->nullable();
            $table->float('total_transport')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('perjalanan');
    }
};
