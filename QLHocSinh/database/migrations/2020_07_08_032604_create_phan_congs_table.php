<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanCongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_congs', function (Blueprint $table) {
            $table->Increments('MaPhanCong')->autoIncrement();
            $table->integer('MaNamHoc');
            $table->integer('MaLop');
            $table->integer('MaMonHoc');
            $table->integer('MaGiaoVien');
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
        Schema::dropIfExists('phan_congs');
    }
}
