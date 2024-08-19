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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('no_bukti', 15);
            $table->date('tanggal_bukti');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->decimal('penghasilan_bruto', 15, 2);
            $table->decimal('pph', 15, 2);
            $table->string('kode_objek_pajak', 50);
            $table->string('pasal', 50);
            $table->integer('masa_pajak');
            $table->year('tahun_pajak');
            $table->string('status', 50);
            $table->integer('rev_no');
            $table->string('posting', 50);
            $table->string('id_sistem', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
