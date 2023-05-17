<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelJabatanUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('master_sys')->create('jabatan_unit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->integer('level')->nullable();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->unsignedInteger('id_unit')->nullable();
            $table->boolean('is_nama_jabatan_unit')->default(0);
            $table->boolean('is_single')->default(0);
            $table->unsignedBigInteger('id_parent')->nullable();
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
        Schema::connection('master_sys')->dropIfExists('jabatan_unit');
    }
}
