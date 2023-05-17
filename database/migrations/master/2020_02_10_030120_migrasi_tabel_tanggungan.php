<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelTanggungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('master_sys')->create('tanggungan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_karyawan')->nullable();
            $table->string('nama')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedInteger('id_jenis_kelamin')->nullable();
            $table->unsignedInteger('status_hubungan_tanggungan')->nullable();
            $table->unsignedInteger('status_pernikahan')->default(1);
            $table->integer('usia')->nullable();
            $table->integer('plan')->nullable();
            $table->unsignedInteger('status')->default(1);
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
        Schema::connection('master_sys')->dropIfExists('tanggungan');
    }
}
