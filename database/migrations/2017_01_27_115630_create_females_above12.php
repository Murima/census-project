<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFemalesAbove12 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('females_above_12', function (Blueprint $table)
        {
            $table->integer('live_male_births');
            $table->integer('houseNo');
            $table->integer('live_female_births');
            $table->integer('live_male_child_in_house');
            $table->integer('live_children_other_houses');
            $table->integer('dead_children');
            $table->string('date_last_child');
            $table->string('was_birth_notified');
            $table->string('gender_of_last_child');
            $table->string('is_last_child_alive');
            $table->string('category');

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
        Schema::drop('females_above_12');
    }
}
