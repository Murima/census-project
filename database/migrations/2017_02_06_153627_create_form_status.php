<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('form_status', function (Blueprint $table)
        {
            $table->integer('status_id');
            $table->integer('enumerator_id');
            $table->integer('task_id');
            $table->string('location');
            $table->integer('house_no');
            $table->string('category');
            $table->string('date');
            $table->string('time');
            $table->string('status');
            $table->string('talked_to')->nullable()->default(NULL);;
            $table->integer('reason_id')->nullable()->default(NULL);;
            $table->primary(array('status_id','task_id', 'house_no'));

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
        Schema::drop('form_status');
    }
}
