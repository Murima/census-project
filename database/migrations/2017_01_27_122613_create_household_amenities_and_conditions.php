<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdAmenitiesAndConditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('household_amenities_conditions', function (Blueprint $table)
        {
            $table->integer('dwelling_units');
            $table->integer('habitable_rooms');
            $table->string('tenure_status');
            $table->string('type_of_rented_house');
            $table->string('main_source_water');
            $table->string('mode_human_waste_disposal');
            $table->string('type_of_fuel');
            $table->string('type_of_lighting');
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
        Schema::drop('household_amenities_conditions');
    }
}
