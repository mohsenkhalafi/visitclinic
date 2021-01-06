<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pcode')->unsigned();
            $table->integer('dcode')->unsigned();
            $table->string('date');
            $table->string('hour');
            $table->string('bimari');
            $table->integer('drtimeid');
            $table->string('maildate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedule');
    }
}
