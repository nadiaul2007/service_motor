<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('data_service_id')
                  ->constrained('data_services')
                  ->cascadeOnDelete();

            $table->decimal('jumlah_biaya_servis', 12, 2);

            $table->enum('jenis_pembayaran', ['Cash/Tunai', 'Non Tunai'])
                  ->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_services');
    }
};