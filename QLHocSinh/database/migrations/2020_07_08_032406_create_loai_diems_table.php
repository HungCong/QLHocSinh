<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_diems', function (Blueprint $table) {
            $table->Increments('MaLoaiDiem')->autoIncrement();
            $table->string('TenLoaiDiem', 150)->collation('utf8_vietnamese_ci');
            $table->integer('HeSo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_diems');
    }
}
