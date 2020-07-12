<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->Increments('MaLop')->autoIncrement();
            $table->string('TenLop', 150)->collation('utf8_vietnamese_ci');
            $table->integer('MaKhoiLop');
            $table->integer('MaNamHoc');
            $table->integer('SiSo');
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
        Schema::dropIfExists('lops');
    }
}
