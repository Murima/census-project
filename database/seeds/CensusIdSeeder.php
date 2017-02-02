<?php

use Illuminate\Database\Seeder;

class CensusIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('census_id')->insert([

            array(
                'id'=>'092009',
            )]);
    }
}
