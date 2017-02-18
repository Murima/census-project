<?php

namespace App\Http\Controllers;

use App\Models\AcceptReason;
use App\Models\ReferenceModel;
use App\Models\RejectionReason;
use App\Models\TasksModel;
use App\Models\FormStatusModel;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

        return view('form-status')->with('formStatus',$formStatus)
            -> with('taskList',$taskList)
            ->with('users',$users);
    }

    public function rejectForm($task_id, $house_no, $status_id, Request $request){
        /**
         * reject form
         */

        if($request->isMethod('PUT')){

            $this->validate($request, [//check validation later
                'reason' => 'required',
                'talkedto' => 'required',
            ]);

            $form= FormStatusModel::where('task_id', $task_id)->where('house_no', $house_no)->get()->first();
            $form->talked_to= $request['talkedto'];
            $form->status="Pending";
            $reasonId= $request['reason'];
            $form->reason_id = $reasonId;

            $form->save();

            $this->saveFormReference($request, $task_id, $house_no, $status_id, $previous="Accepted");


            return $this->index();
        }

        $formDetails = FormStatusModel::where('house_no',$house_no)->where('task_id', $task_id)->get()->first();
        //$rejectionReason = RejectionReason::all();

        $rejectOptions = RejectionReason::pluck('reason','id');
        $userList = User::where('is_Admin', null)->where('is_enumerator',null)->pluck('firstname', 'id');

        return view('reject-form')->with('formDetails',$formDetails)
            ->with('rejectOptions', $rejectOptions)
            ->with('userList', $userList);

    }


    public function acceptForm($task_id, $house_no, $status_id, Request $request){


        if($request->isMethod('PUT')){

            $this->validate($request, [//check validation later
                'reason' => 'required',
                'talkedto' => 'required',
            ]);

            $form= FormStatusModel::where('task_id', $task_id)->where('house_no', $house_no)->get()->first();
            $form->talked_to= $request['talkedto'];
            $form->status="Pending";
            $reasonId= $request['reason'];
            //$reasonRejectionReason::find($reasonId);
            $form->reason_id = $reasonId;

            $form->save();
            $this->saveFormReference($request, $task_id, $house_no, $status_id, $previous="Rejected");

            return $this->index();
        }

        $formDetails = FormStatusModel::where('house_no',$house_no)->where('task_id', $task_id)->get()->first();
        //$rejectionReason = RejectionReason::all();

        $rejectOptions = AcceptReason::pluck('reason','id');
        $userList = User::where('is_Admin', null)->where('is_enumerator',null)->pluck('firstname', 'id');

        return view('reject-form')->with('formDetails',$formDetails)
            ->with('rejectOptions', $rejectOptions)
            ->with('userList', $userList);


    }

    private function saveFormReference($request, $taskId, $houseNo, $status_id, $previous)
    {
        /*
         * save the reference for acceptance or rejection
         */


        $reference = new ReferenceModel();
        $reference->official_id= $request['talkedto'];
        $reference->house_no= $houseNo;
        $reference->task_id= $taskId;
        $reference->referenced_by= Auth::user()->firstname;
        $reference->status_id= $status_id;
        $reference->previous_status=$previous;

        $exist= $reference::whereStatusId($status_id)->first();
        if (is_null($exist)){
            $reference->save();
        }
        return $this->index();
    }

    public function status($status){
    }

    public function testMe($cat=null){
        switch ($cat){
            case 1:
                $this->test1();
                break;
            case 2:
                break;
            default:
                $this->test1();
                break;
        }
    }

    public function test1(){
        return view('success');

    }




}
