<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('urban', 100);
            $table->string('sub_district', 100);
            $table->string('city', 100);
            $table->tinyInteger('province_code');
            $table->char('postal_code', 6);

            $table->index('city');
            $table->index('sub_district');
            $table->index('province_code');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subdistricts');
    }
}
