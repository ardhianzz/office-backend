<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelDetailPenginapanLpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('elpd_trs')->create('detail_penginapan_lpd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_lpd');
            $table->integer('malam')->default(0);
            $table->unsignedInteger('id_kategori_pembayaran')->nullable();
            $table->text('nama_penginapan')->nullable();
            $table->integer('harga')->default(0);
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
        Schema::connection('elpd_trs')->dropIfExists('detail_penginapan_lpd');
    }
}
