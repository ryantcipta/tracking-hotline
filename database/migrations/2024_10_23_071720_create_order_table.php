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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('no_pop_hotline');
            $table->string('tgl_order');
            $table->string('no_po_md');
            $table->string('tgl_proses_md');
            $table->string('cm');
            $table->string('nama_dealer');
            $table->string('nama_konsumen');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('type_motor');
            $table->string('tahun');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->string('no_po_ahm');
            $table->string('tgl_order_ke_ahm');
            $table->string('part_no');
            $table->string('description');
            $table->string('qty');
            $table->string('etd_ahm');
            $table->string('ps_ahm');
            $table->string('tgl_supply_ahm');
            $table->string('tgl_gi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
