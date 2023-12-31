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
        Schema::create('recruitskus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('nik')->unique();
            $table->string('npk')->nullable();
            $table->string('nama');
            // //$table->string('asal')->nullable();
            $table->foreignId('province_id')->constrained()->onDelete('cascade');
            $table->foreignId('regency_id')->constrained()->onDelete('cascade');

            $table->string('ketklaim')->nullable();
            $table->string('statuskaryawan')->nullable();
            $table->string('k0')->nullable();
            $table->string('k1')->nullable();
            $table->string('k2')->nullable();
            $table->string('k3')->nullable();
            $table->string('statuspgs')->nullable();
            $table->string('status')->nullable();
            $table->string('statusgahead')->nullable();
            $table->string('statushrhead')->nullable();
            $table->string('statuscma')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('dokumen_ktp')->nullable();
            $table->string('dokumen_ktpistri')->nullable();
            $table->string('dokumen_kk')->nullable();
            $table->string('tanggal_verif')->nullable();
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitskus');
    }
};
