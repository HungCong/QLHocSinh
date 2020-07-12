<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiDungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->Increments('MaNguoiDung')->autoIncrement();
            $table->string('TenDangNhap', 150)->collation('utf8_vietnamese_ci');
            $table->string('MatKhau', 150)->collation('utf8_vietnamese_ci');
            $table->string('TenNguoiDung', 150)->collation('utf8_vietnamese_ci');
            $table->integer('MaLoaiNguoiDung');
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
        Schema::dropIfExists('nguoi_dungs');
    }
}
