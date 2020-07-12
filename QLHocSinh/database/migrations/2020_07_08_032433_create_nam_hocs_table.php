<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nam_hocs', function (Blueprint $table) {
            $table->Increments('MaNamHoc')->autoIncrement();
            $table->string('TenNamHoc', 150)->collation('utf8_vietnamese_ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nam_hocs');
    }
}
