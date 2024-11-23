<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransformersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transformers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_id');
            $table->text('name');
            $table->text('manufacturer');
            $table->text('year');
            $table->text('conservator');
            $table->text('insulate_props');
            $table->text('tap_changer_pos');
            $table->text('breather');
            $table->text('rating_kva');
            $table->text('oil_vol');
            $table->text('prim_voltage');
            $table->text('sec_voltage');
            $table->text('sited');
            $table->text('tx_serial');
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
        Schema::dropIfExists('transformers');
    }
}
