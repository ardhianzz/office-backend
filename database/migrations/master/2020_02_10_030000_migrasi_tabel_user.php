<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiTabelUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('master_sys')->create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik')->unique();
            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_notified')->default(1);
            $table->integer('autosave')->default(15);
            $table->text('access_token')->nullable();
            $table->text('token_reset_password')->nullable();
            $table->unsignedBigInteger('id_juu_aktif')->nullable();
            $table->unsignedBigInteger('id_juu_default')->nullable();
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
        Schema::connection('master_sys')->dropIfExists('user');
    }
}
