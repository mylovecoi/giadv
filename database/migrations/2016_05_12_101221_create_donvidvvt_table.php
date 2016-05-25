<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonvidvvtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvidvvt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masothue',30)->nullable();
            $table->string('tendonvi')->nullable();
            $table->string('diachi')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('giayphepkd')->nullable();
            $table->string('fax')->nullable();
            $table->string('diadanh')->nullable();
            $table->string('chucdanh')->nullable();
            $table->string('nguoiky')->nullable();
            $table->string('dknopthue')->nullable();
            $table->boolean('dvxk');
            $table->boolean('dvxb');
            $table->boolean('dvxtx');
            $table->boolean('dvk');
            $table->string('dvcc')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::drop('donvidvvt');
    }
}
