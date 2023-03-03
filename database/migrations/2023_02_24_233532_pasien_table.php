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
        Schema::create('Pasien', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->tinyInteger('Umur');
            $table->string('Gender');
            $table->tinyInteger('Role_as');
            $table->string('Penyakit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
