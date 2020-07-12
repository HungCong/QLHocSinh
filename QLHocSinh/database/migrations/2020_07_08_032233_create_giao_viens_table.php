<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaoViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_viens', function (Blueprint $table) {
            $table->Increments('MaGiaoVien')->autoIncrement();
            $table->string('HoTen', 150)->collation('utf8_vietnamese_ci');
            $table->boolean('GioiTinh')->nullable();
            $table->date('NgaySinh', 6)->nullable();
            $table->string('DiaChi', 150)->collation('utf8_vietnamese_ci');
            $table->string('DienThoai', 150)->collation('utf8_vietnamese_ci');
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
        Schema::dropIfExists('giao_viens');
    }
}
