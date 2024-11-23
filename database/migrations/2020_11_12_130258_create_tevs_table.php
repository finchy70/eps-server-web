<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tevs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_id');
            $table->text('panel_name');
            $table->text('switch_position');
            $table->text('busbar_right');
            $table->text('busbar_left');
            $table->text('switch_tank');
            $table->text('ct_chamber');
            $table->text('volt_txs');
            $table->text('term_box');
            $table->text('ultra_sonic_test');
            $table->text('tx_background_readings_metal');
            $table->text('tx_hv_box');
            $table->text('tx_main_body');
            $table->text('tx_ultra_sonic_test');

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
        Schema::dropIfExists('tevs');
    }
}
