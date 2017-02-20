<?php
/*Controller for requesting task lists for enumerators
*/

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\FormStatusModel;
use App\Models\TasksModel;
use App\Models\User;

class TasksController extends Controller {

    public  function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        //



        $this->middleware('jwt.auth');
    }

    public function getTasks($email){
        /**
         * get all the tasks for the enumerator
         */

        $user = User::where('email',$email)->get()->first();

        if($user){

            $tasks = TasksModel::where('enumerator_id',$user->id)->get();
            foreach ($tasks as $task) {
                //dd($task->id);

                //get status from database
                $status=FormStatusModel::where('task_id',$task->task_id)->first();
                $task->post_status=$status->status;
                $task->save();

            }

            return response(json_encode($tasks));

        }
        return response(json([
            'error'=>'invalid_email',
        ]));
    }



}
