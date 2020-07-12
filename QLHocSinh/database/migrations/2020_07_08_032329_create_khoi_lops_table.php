<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoiLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoi_lops', function (Blueprint $table) {
            $table->Increments('MaKhoiLop')->autoIncrement();
            $table->string('TenKhoiLop', 150)->collation('utf8_vietnamese_ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoi_lops');
    }
}
