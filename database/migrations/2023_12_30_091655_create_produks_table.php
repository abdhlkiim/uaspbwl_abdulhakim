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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pro_id_kat')->required();
            $table->string('pro_no', 20)->required();
            $table->string('pro_nama', 50)->required();
            $table->text('pro_dekripsi')->required();
            $table->string('pro_stock', 20)->required();
            $table->string('pro_kodeproduksi', 50)->required();
            $table->string('pro_seri', 50)->required();
            $table->integer('pro_berat')->required();
            $table->enum('pro_tersedia', ['Y', 'N'])->required();
            $table->unsignedBigInteger('pro_id_user')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
