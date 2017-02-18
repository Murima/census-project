<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('references', function (Blueprint $table)
        {
            $table->integer('official_id');
            $table->integer('house_no');
            $table->integer('task_id');
            $table->string('referenced_by');
            $table->integer('status_id');
            $table->string('previous_status');
            $table->primary(array('official_id', 'house_no'));

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
        Schema::drop('references');
    }
}
