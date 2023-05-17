<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelPejabatPemeriksaReimburse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ereimburse_sys')->create('pejabat_pemeriksa_reimburse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_juu')->nullable();
            $table->unsignedInteger('id_unit')->nullable();
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
        Schema::connection('ereimburse_sys')->dropIfExists('pejabat_pemeriksa_reimburse');
    }
}
