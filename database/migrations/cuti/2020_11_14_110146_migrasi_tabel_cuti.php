<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ecuti_trs')->create('cuti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_jenis_cuti')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->unsignedBigInteger('posisi')->default(0);
            $table->date('tanggal')->nullable();
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->boolean('is_send')->default(0);
            $table->boolean('is_opened_by_posisi')->default(0);
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
        Schema::connection('ecuti_trs')->dropIfExists('cuti');
    }
}
