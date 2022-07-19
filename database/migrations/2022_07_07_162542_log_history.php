<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_history', function (Blueprint $table) {
            $table->id('id_log_history');
            $table->integer('id_pmmodule');
            $table->float('intOutputVoltage');
            $table->float('intOutputCurrent');
            $table->double('intOutputPower');
            $table->double('intOutputPowerTotal');
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
        //
    }
}
