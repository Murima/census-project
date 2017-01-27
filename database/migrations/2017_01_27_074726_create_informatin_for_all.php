<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformatinForAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('information_for_all', function (Blueprint $table)
        {
            $table->string('household_estate');
            $table->integer('houseNo');
            $table->integer('head_id');
            $table->string('occupant_relationship_to_head');
            $table->integer('occupant_age');
            $table->string('occupant_lineage');
            $table->string('is_occupant_usual_member');
            $table->string('occupant_tribe_nationality');
            $table->string('occupant_religion');
            $table->string('occupant_marital_status');
            $table->string('occupant_POB');
            $table->string('previous_residence');
            $table->string('date_of_moving_in');
            $table->string('is_father_alive');
            $table->string('is_mother_alive');



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
        Schema::drop('information_for_all');
    }
}
