<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelRiwayatLembur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('elembur_trs')->create('riwayat_lembur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_lembur');
            $table->unsignedBigInteger('id_juu');
            $table->unsignedInteger('id_aksi_lembur');
            $table->text('detail_aksi')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::connection('elembur_trs')->dropIfExists('riwayat_lembur');
    }
}
