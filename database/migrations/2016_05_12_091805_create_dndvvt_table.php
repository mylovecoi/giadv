<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDndvvtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dndvvt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masothue',30)->nullable();
            $table->string('tendn')->nullable();
            $table->string('diachidn')->nullable();
            $table->string('dienthoaidn')->nullable();
            $table->string('giayphepkddn')->nullable();
            $table->string('faxdn')->nullable();
            $table->string('diadanh')->nullable();
            $table->string('chucdanhky')->nullable();
            $table->string('nguoiky')->nullable();
            $table->string('noidknopthuedn')->nullable();
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
        Schema::drop('dndvvt');
    }
}
