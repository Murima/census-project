<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsAbove3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('persons_above_3', function (Blueprint $table)
        {
            $table->string('education_status');
            $table->integer('highest_education_level');
            $table->integer('occupant_no');
            $table->integer('head_id');
            $table->string('house_no');
            $table->primary(array('occupant_no', 'head_id', 'house_no'));

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
        Schema::drop('persons_above_3');
    }
}
