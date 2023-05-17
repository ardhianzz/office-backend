<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelPemeriksaReimburse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ereimburse_trs')->create('pemeriksa_reimburse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_reimburse');
            $table->unsignedBigInteger('id_juu_pemeriksa');
            $table->text('path')->nullable();
            $table->text('nama')->nullable();
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
        Schema::connection('ereimburse_trs')->dropIfExists('pemeriksa_reimburse');
    }
}
