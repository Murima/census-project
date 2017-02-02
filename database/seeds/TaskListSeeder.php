<?php

use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('task_list')->insert([

            array(
                'task_id'=>'1',
                'enumerator_id'=>'3',
                'task_name' => 'Akila One',
                'task_duration'=>'12hrs',
                'status'=>'open'
            ),
            array(
                'task_id'=>'2',
                'enumerator_id'=>'3',
                'task_name' => 'Akila Two',
                'task_duration'=>'12hrs',
                'status'=> 'open',
            )

        ]);
    }
}
