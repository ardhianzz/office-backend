<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelReimburse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('ereimburse_trs')->create('reimburse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total')->default(0);
            $table->unsignedInteger('status')->default(1);
            $table->unsignedBigInteger('posisi')->default(0);
            $table->timestamp('approved_at')->nullable();
            $table->boolean('is_send')->default(0);
            $table->boolean('is_opened_by_posisi')->default(0);
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
        Schema::connection('ereimburse_trs')->dropIfExists('reimburse');
    }
}
