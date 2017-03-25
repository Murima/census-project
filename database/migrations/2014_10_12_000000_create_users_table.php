<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            $table->string('county');
            //only specific to enumerators

            $table->boolean('is_enumerator')->nullable()->default(NULL);
            $table->boolean('is_official')->nullable()->default(NULL);
            $table->boolean('is_admin')->nullable()->default(NULL);
            $table->string('phone_number')->nullable()->default(NULL);
            $table->string('headoffice')->nullable()->default(NULL);
            $table->string('reportsto')->nullable()->default(NULL);
            $table->string('supervisor_phone')->nullable()->default(NULL);
            $table->string('ward')->nullable()->default(NULL);

            $table->rememberToken();
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
        Schema::dropIfExists('user_table');


    }
}
