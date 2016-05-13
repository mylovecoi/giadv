<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkdvvtxtxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkdvvtxtx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masokk')->nullable();
            $table->string('masothue')->nullable();
            $table->date('ngaynhap')->nullable();
            $table->string('socv')->nullable();
            $table->string('socvlk')->nullable();
            $table->date('ngayhieuluc')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('trangthai')->nullable();
            $table->text('ghichu')->nullable();
            $table->date('ngaychuyen')->nullable();
            $table->text('lydo')->nullable();
            $table->string('nguoinop')->nullable();
            $table->string('sdtnn')->nullable();
            $table->string('faxnn')->nullable();
            $table->string('emailnn')->nullable();
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
        Schema::drop('kkdvvtxtx');
    }
}
