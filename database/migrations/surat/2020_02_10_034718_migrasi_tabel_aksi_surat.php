<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelAksiSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::connection('esurat_sys')->create('aksi_surat', function (Blueprint $table) {
          $table->increments('id');
          $table->string('kode', 50)->nullable();
          $table->string('nama');
          $table->text('awalan')->nullable();
          $table->text('pesan')->nullable();
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
        Schema::connection('esurat_sys')->dropIfExists('aksi_surat');
    }
}
