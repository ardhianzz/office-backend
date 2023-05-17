<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelSuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('surat_masuk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat');
            $table->unsignedBigInteger('id_juu_penerima');
            $table->unsignedInteger('id_jenis_surat_masuk');
            $table->unsignedBigInteger('id_surat_forward')->nullable();
            $table->unsignedBigInteger('id_surat_disposisi')->nullable();
            $table->boolean('is_opened')->default(0);
            $table->timestamp('opened_at')->nullable();
            $table->boolean('is_hidden')->default(0);
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
        Schema::connection('esurat_trs')->dropIfExists('surat_masuk');
    }
}
