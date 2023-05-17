<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelPenerimaSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('penerima_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat');
            $table->unsignedBigInteger('id_juu_penerima');
            $table->text('tampilan')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('penerima_surat');
    }
}
