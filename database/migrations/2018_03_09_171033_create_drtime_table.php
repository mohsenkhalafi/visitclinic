<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrtimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drtime', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('date');
            $table->Time('fhour');
            $table->Time('thour');
            $table->integer('dcode')->unsigned();
            $table->string('status');
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
        Schema::drop('drtime');
    }
}
