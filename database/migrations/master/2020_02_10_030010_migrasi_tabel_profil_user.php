<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelProfilUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('master_sys')->create('profil_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('id_negara_hp')->nullable();
            $table->string('no_hp', 25)->nullable();
            $table->text('foto_path')->nullable();
            $table->unsignedInteger('id_negara_asal')->nullable();
            $table->text('alamat_asal')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->unsignedInteger('id_agama')->nullable();
            $table->unsignedInteger('id_jenis_kelamin')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_ktp', 25)->nullable();
            $table->string('no_kk', 25)->nullable();
            $table->integer('usia')->nullable();
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
        Schema::connection('master_sys')->dropIfExists('profil_user');
    }
}
