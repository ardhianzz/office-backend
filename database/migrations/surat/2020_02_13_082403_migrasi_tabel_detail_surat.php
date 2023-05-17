<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelDetailSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('detail_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat');
            $table->longText('perihal')->nullable();
            $table->text('lampiran')->nullable();
            $table->longText('isi')->nullable();
            $table->text('tampilan_dari')->nullable();
            $table->text('tampilan_penerima')->nullable();
            $table->text('tampilan_tembusan')->nullable();
            $table->integer('jumlah_ttd')->default(1);
            $table->string('tempat')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('alasan')->nullable();
            $table->unsignedInteger('id_jenis_pemberkasan')->nullable();
            $table->bigInteger('nominal')->nullable();
            $table->string('nomor')->nullable();
            $table->integer('nomor_urut')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('detail_surat');
    }
}
