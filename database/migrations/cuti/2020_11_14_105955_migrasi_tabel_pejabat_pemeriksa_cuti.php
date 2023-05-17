<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelPejabatPemeriksaCuti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ecuti_sys')->create('pejabat_pemeriksa_cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_juu')->nullable();
            $table->unsignedInteger('id_juu_pemeriksa')->nullable();
            $table->integer('urutan')->nullable();
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
        Schema::connection('ecuti_sys')->dropIfExists('pejabat_pemeriksa_cuti');
    }
}
