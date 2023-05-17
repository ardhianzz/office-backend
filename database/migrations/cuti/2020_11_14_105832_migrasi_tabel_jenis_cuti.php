<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelJenisCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ecuti_sys')->create('jenis_cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 50)->nullable();
            $table->string('nama');
            $table->integer('min_pengajuan')->nullable();
            $table->integer('maks_pengajuan')->nullable();
            $table->integer('min_jumlah')->nullable();
            $table->integer('maks_jumlah')->nullable();
            $table->unsignedInteger('id_jenis_hari_cuti')->default(1);
            $table->boolean('is_lampiran')->default(0);
            $table->boolean('is_tanggal')->default(0);
            $table->text('nama_tanggal')->nullable();
            $table->unsignedInteger('id_parent')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
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
        Schema::connection('ecuti_sys')->dropIfExists('jenis_cuti');
    }
}
