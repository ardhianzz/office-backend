<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelSuratForward extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('surat_forward', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat_masuk');
            $table->unsignedBigInteger('id_juu_pengirim');
            $table->unsignedBigInteger('id_juu_penerima');
            $table->unsignedBigInteger('id_parent')->nullable();
            $table->longText('keterangan')->nullable();
            $table->text('detail_aksi')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('surat_forward');
    }
}
