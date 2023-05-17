<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelDetailReimburse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ereimburse_trs')->create('detail_reimburse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_reimburse');
            $table->unsignedBigInteger('id_tanggungan')->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('jumlah')->default(0);
            $table->text('nama_instansi')->nullable();
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
        Schema::connection('ereimburse_trs')->dropIfExists('detail_reimburse');
    }
}
