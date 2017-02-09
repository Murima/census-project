<?php

namespace App\Http\Controllers;

use App\Models\RejectionReason;
use App\Models\TasksModel;
use App\Models\FormStatusModel;
use App\Models\User;
use Illuminate\Http\Request;
use View;

class FormStatus extends Controller
{
    //
    public  function index(){
            $taskList = array();
            $users= array();


        $formStatus = FormStatusModel::all();
        for ($i=0;$i<$formStatus->count();$i++){

            $task = TasksModel::where('enumerator_id', $formStatus[$i]->enumerator_id)->get();
            $taskList[]=$task;

            $user = User::where('id', $formStatus[$i]->enumerator_id)->get();
            $users[]=$user;
        }

        return view('form-status')->with('formStatus',$formStatus)-> with('taskList',$taskList)->with('users',$users);
    }

    public function rejectForm($task_id, $house_no, Request $request){

        if($request->isMethod('post')){

            $this->validate($request, [
                'reason' => 'required',
                'talkedto' => 'required',
            ]);


        }

        $formDetails = FormStatusModel::where('house_no',$house_no)->where('task_id', $task_id)->get()->first();
        //$rejectionReason = RejectionReason::all();

        $rejectOptions = RejectionReason::pluck('reason','id');
        return view('reject-form')->with('formDetails',$formDetails)->with('rejectOptions', $rejectOptions);

    }

    public function status($status){
        if ($status == 'Accepted')
        return true;

        else{
            return false;
        }
    }


}
