<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiNguoiDungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_nguoi_dungs', function (Blueprint $table) {
            $table->Increments('MaLoaiNguoiDung')->autoIncrement();
            $table->string('LoaiNguoiDung', 150)->collation('utf8_vietnamese_ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_nguoi_dungs');
    }
}
