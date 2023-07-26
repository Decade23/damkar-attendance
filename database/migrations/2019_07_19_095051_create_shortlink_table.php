<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortlinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortlink', function (Blueprint $table) {
            $table->increments('id');
            $table->string('long_link');
            $table->string('short_link');
            $table->text('description');
            $table->integer('counter');
            
            $table->timestamps();
            $table->index(['long_link', 'short_link']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shortlink');
    }
}