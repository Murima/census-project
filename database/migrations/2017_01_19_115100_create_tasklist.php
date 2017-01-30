<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('task_list', function (Blueprint $table)
        {
            $table->string('task_id');
            $table->string('enumerator_id');
            $table->string('task_name');
            $table->string('task_duration');
            //$table->string('status');
            $table->rememberToken();

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
        Schema::dropIfExists('task_list');
    }
}
