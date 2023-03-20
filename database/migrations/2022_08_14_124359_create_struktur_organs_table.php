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
        Schema::create('struktur_organs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('jabatan')->unique();
            $table->foreignId('id_angkatan')->constrained('angkatans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->string('image');
            $table->string('ig')->unique();
            $table->string('twitter')->unique();
            $table->string('fb')->unique();
            $table->string('linkedin')->unique();
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
        Schema::dropIfExists('struktur_organs');
    }
};
