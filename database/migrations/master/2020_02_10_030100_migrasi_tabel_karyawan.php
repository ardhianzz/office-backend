<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('master_sys')->create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nik', 15)->nullable();
            $table->unsignedBigInteger('id_kota_kerja')->nullable();
            $table->unsignedInteger('id_unit')->nullable();
            $table->unsignedInteger('id_level_karyawan')->nullable();
            $table->string('no_npwp', 25)->nullable();
            $table->string('no_bpjs_tenaga_kerja', 20)->nullable();
            $table->string('no_bpjs_kesehatan', 20)->nullable();
            $table->unsignedInteger('status_tanggungan')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_pensiun')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->integer('sisa_masa_kerja')->nullable();
            $table->unsignedInteger('id_bank_payroll')->nullable();
            $table->string('no_bank_payroll', 25)->nullable();
            $table->unsignedInteger('id_bank_sppd')->nullable();
            $table->string('no_bank_sppd', 25)->nullable();
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
        Schema::connection('master_sys')->dropIfExists('karyawan');
    }
}
