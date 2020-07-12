<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->Increments('MaDiem')->autoIncrement();
            $table->integer('MaHocSinh');
            $table->integer('MaLop');
            $table->integer('MaHocKy');
            $table->integer('MaNamHoc');
            $table->integer('MaLoaiDiem');
            $table->integer('MaMonHoc');
            $table->float('Diem', 8, 2);
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
        Schema::dropIfExists('diems');
    }
}
