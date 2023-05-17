<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_juu_penerbit')->nullable();
            $table->unsignedInteger('id_jenis_surat')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('id_sifat_surat')->nullable();
            $table->unsignedBigInteger('posisi')->default(0);
            $table->timestamp('waktu_terbit')->nullable();
            $table->boolean('is_notified')->default(0);
            $table->boolean('is_send')->default(0);
            $table->boolean('is_backdate')->default(0);
            $table->boolean('is_opened_by_posisi')->default(0);
            $table->date('tanggal_backdate')->nullable();
            $table->unsignedInteger('id_bahasa')->default(1);
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
        Schema::connection('esurat_trs')->dropIfExists('surat');
    }
}
