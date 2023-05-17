<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelPemberkasanSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('esurat_trs')->create('pemberkasan_surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_surat');
            $table->boolean('is_qrcode');
            $table->boolean('is_header_footer');
            $table->unsignedInteger('id_jenis_pemberkasan')->nullable();
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
        Schema::connection('esurat_trs')->dropIfExists('pemberkasan_surat');
    }
}
