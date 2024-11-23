<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwitchgearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switchgears', function (Blueprint $table) {
            $table->id();
            $table->text('panel_number');
            $table->unsignedBigInteger('inspection_id');
            $table->text('manufacturer');
            $table->text('year');
            $table->text('circuit');
            $table->text('switching_operations');
            $table->text('serial_number');
            $table->text('op_locks');
            $table->text('check_earth_connections');
            $table->text('ops_diagram');
            $table->text('check_sf14');
            $table->text('general_condition');
            $table->text('check_interlocks');
            $table->text('cables_and_ducts');
            $table->text('comments');
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
        Schema::dropIfExists('switchgears');
    }
}
