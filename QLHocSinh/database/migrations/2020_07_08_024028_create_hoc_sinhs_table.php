<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocSinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_sinhs', function (Blueprint $table) {
            $table->Increments('MaHocSinh')->autoIncrement();
            $table->string('HoTen', 150)->collation('utf8_vietnamese_ci');
            $table->boolean('GioiTinh')->nullable();
            $table->date('NgaySinh', 6)->nullable();
            $table->string('NoiSinh', 150)->collation('utf8_vietnamese_ci');
            $table->string('DanToc', 150)->collation('utf8_vietnamese_ci');
            $table->integer('MaLop');
            $table->integer('MaNamHoc');
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
        Schema::table('hoc_sinhs', function (Blueprint $table) {
            $table->integer('MaLop');
            $table->integer('MaNamHoc');
        });
        Schema::dropIfExists('hoc_sinhs');
    }
}
