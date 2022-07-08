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
        Schema::create('jadwal_sharings', function (Blueprint $table) {
            $table->id();
            $table->string('tittle');
            $table->string('deskripsi');
            $table->string('jadwal');
            $table->string('image');
            $table->foreignId('id_kategori')->constrained('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_sharings');
    }
};
