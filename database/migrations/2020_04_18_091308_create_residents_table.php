<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('rt');
            $table->string('rw')->default('02');
            $table->string('status_perkawinan');
            $table->string('status_kependudukan')->default('Menetap');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('nik')->unique();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->bigInteger('patriarch_id')->unsigned()->nullable();
            $table->foreign('patriarch_id')->references('id')->on('patriarches')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
}
