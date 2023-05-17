<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelTanggalHariLibur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ecuti_sys')->create('tanggal_hari_libur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode', 50)->nullable();
            $table->unsignedBigInteger('id_hari_libur');
            $table->date('tanggal')->nullable();
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
        Schema::connection('ecuti_sys')->dropIfExists('tanggal_hari_libur');
    }
}
