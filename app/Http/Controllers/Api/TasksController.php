<?php
/*Controller for requesting task lists for enumerators
*/

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
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
        $user = User::where('email',$email)->get()->first();

        if($user){

            $tasks = TasksModel::where('enumerator_id',$user->id)->get();

            return response(json_encode($tasks));

        }
        return response(json([
            'error'=>'invalid_email',
        ]));
    }


}
