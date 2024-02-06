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
        Schema::create('neraca', function (Blueprint $table) {
            $table->id();
            $table->integer('periode');
            $table->string('bulan');
            // $table->string('kode_akun')->primary();;
            $table->string('kode_akun');
            $table->foreign('kode_akun')->references('kode_akun')->on('akuns')->onDelete('cascade');
            $table->string('nama_akun');
            $table->integer('nominal')->default(0);
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
        Schema::dropIfExists('neraca');
    }
};
