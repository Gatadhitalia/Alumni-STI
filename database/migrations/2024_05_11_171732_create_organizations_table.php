<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alumni')->nullable();
            $table->string('nama_org');
            $table->string('periode_masuk_org');            
            $table->string('periode_keluar_org');    
            $table->string('jabatan_org');
            $table->string('kota');
            $table->string('negara');
            $table->longText('catatan');
            $table->timestamps();

            $table->foreign('id_alumni')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
