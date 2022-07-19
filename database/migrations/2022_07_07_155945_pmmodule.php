<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pmmodule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmmodule', function (Blueprint $table) {
            $table->id('id_pmmodule');
            $table->string('txtModuleName');
            $table->integer('id_locater');
            $table->tinyInteger('bitActive');
            $table->string('txtInsertedBy');
            $table->string('txtUpdatedBy');
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
