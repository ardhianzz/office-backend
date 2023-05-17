<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelJabatanUnitPenerimaSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_sys')->create('jabatan_unit_penerima_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_jenis_surat');
            $table->unsignedBigInteger('id_jabatan_unit');
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
        Schema::connection('esurat_sys')->dropIfExists('jabatan_unit_penerima_surat');
    }
}
