<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_id')->required();
            $table->text('name');
            $table->text('tripping_voltage');
            $table->text('output_voltage');
            $table->text('battery_voltage');
            $table->text('battery_make');
            $table->text('install_date');
            $table->text('temperature');
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
        Schema::dropIfExists('batteries');
    }
}
