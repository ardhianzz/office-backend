<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelDelegasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('delegasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_juu_penerbit')->nullable();
            $table->unsignedBigInteger('id_juu_delegasi')->nullable();
            $table->unsignedBigInteger('id_juu_penerima')->nullable();
            $table->unsignedBigInteger('id_surat')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->date('waktu_mulai')->nullable();
            $table->date('waktu_berakhir')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->unsignedBigInteger('id_juu_delegasi_penerima')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('delegasi');
    }
}
