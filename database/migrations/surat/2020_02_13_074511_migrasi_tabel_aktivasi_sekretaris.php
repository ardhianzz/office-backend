<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelAktivasiSekretaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('aktivasi_sekretaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pengaktivasi_sekretaris')->nullable();
            $table->unsignedBigInteger('id_juu_sekretaris')->nullable();
            $table->unsignedInteger('id_tipe_aktivasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_berakhir')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('aktivasi_sekretaris');
    }
}
