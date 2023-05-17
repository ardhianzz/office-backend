<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelKatukatransJenisTransportasiLpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('elpd_sys')->create('katukatrans_jenis_transportasi_lpd', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_katukatrans');
            $table->unsignedInteger('id_jenis_transportasi');
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
        Schema::connection('elpd_sys')->dropIfExists('katukatrans_jenis_transportasi_lpd');
    }
}
