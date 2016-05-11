<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKkdvvtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kkdvvt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('macosokd');
            $table->date('ngaynhap')->nullable();
            $table->string('socv')->nullable();
            $table->string('socvlk')->nullable();
            $table->date('ngayhieuluc')->nullable();
            $table->string('nguoinop')->nullable();
            $table->date('ngaynhan')->nullable();
            $table->string('trangthai')->nullable();
            $table->text('ghichu')->nullable();
            $table->date('ngaychuyen')->nullable();
            $table->text('lydo')->nullable();
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
        Schema::drop('kkdvvt');
    }
}
