<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelPenomoranSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('penomoran_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('waktu');
            $table->string('nomor');
            $table->unsignedInteger('status')->default(1);
            $table->unsignedBigInteger('id_surat')->nullable();
            $table->unsignedInteger('id_jenis_surat')->nullable();
            $table->unsignedBigInteger('id_jabatan_unit')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('penomoran_surat');
    }
}
