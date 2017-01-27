<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use App\Models\User;
use DB;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use View;

class TaskListController extends Controller
{
    //
    //$table="census_event";

    public function searchUser(Request $request)
    {
        $query = Input::get('search-user');

        if($query !='') {
            /*$user = DB::table('users')
                ->where('is_enumerator', '=', 1)
                ->where(function ($query)
                {
                    $query->where('firstname', 'LIKE', '%' . $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%')
                        ->orWhere('id', 'LIKE', '%' . $query . '%')
                        ->orWhere('lastname', 'LIKE', '%' . $query . '%')
                        ->orWhere('county', 'LIKE', '%' . $query . '%')
                        ->orWhere('ward', 'LIKE', '%' . $query . '%');

                })->get();*/


            $user = User::where(function ($query) {
                $query->whereNotNull('is_enumerator');

            })->where('firstname', 'LIKE', '%' . $query . '%')
                ->orWhere('email', 'LIKE', '%' . $query . '%')
                ->orWhere('id', 'LIKE', '%' . $query . '%')
                ->orWhere('lastname', 'LIKE', '%' . $query . '%')
                ->orWhere('county', 'LIKE', '%' . $query . '%')
                ->orWhere('ward', 'LIKE', '%' . $query . '%')


                ->get();
            $userCount = count($user);

            if ($userCount > 0) {
                $status = array();

                foreach ($user as $enum) {

                    $tasks = TasksModel::where('enumerator_id', $enum->id)->count();

                    $status[$enum->id] = $tasks;
                }

                return view('dashboard-official-search')->withStatus($status)->withDetails($user)->withQuery($query);
            } else {
                return view('dashboard-official-search')->withMessage('No Enumerators found. Try to search again !');
            }

        }
        return view('dashboard-official-search')->withMessage('No Enumerators found. Try to search again !');
    }

    public function getTaskForm($id)
    {
        if ($id) {

            $user = User::where('id', $id)->get()->first();

            return \View::make('create-tasklist')->with('user', $user);

        }

        return view('503');
    }

    public function assignTask($id, Request $request)
    {

        $this->validate($request, [
            'duration' => 'required',
            'location' => 'required',
            'enumerator_id' => 'required',
            'task_id' => 'required|unique:task_list|max:2'

        ]);

        $taskID = $request['task_id'];
        $location = $request['location'];
        $duration = $request['duration'];
        $status = $request['status'];

        $tasks = new TasksModel();
        $tasks->enumerator_id = $id;
        $tasks->task_name=$location;
        $tasks->task_id = $taskID;
        $tasks->status= $status;
        $tasks->task_duration = $duration;

        $tasks->save();


        $request->session()->flash('alert-success','successfully added!');


        return $this->getTaskForm($id);


    }

    public function editTask($enumerator_id , $task_id, Request $request){
        $user = User::where('id', $enumerator_id)->get()->first();
        $task =  TasksModel::where('task_id',$task_id)->get()->first();

        if($request->isMethod('PUT')){
            $this->validate($request, [
                'duration' => 'required',
                'location' => 'required',
                'enumerator_id' => 'required',
                'task_id' => 'required|max:2'
            ]);

            $taskID = $request['task_id'];
            $location = $request['location'];
            $duration = $request['duration'];
            $status = $request['status'];

            //$tasks = TasksModel::find($taskID);
            $tasks =  TasksModel::where('task_id',$taskID)->get()->first();
            $tasks->enumerator_id = $enumerator_id;
            $tasks->task_name=$location;
            $tasks->task_id = $taskID;
            $tasks->status= $status;
            $tasks->task_duration = $duration;

            $tasks->save();

            $request->session()->flash('alert-success','successfully edited!');

            return $this->viewTasks($enumerator_id);
            //return View::make('edit-tasklist')->with('user', $user)->with('task', $task);

        }
        // $request->flash();
        //return redirect('edit-tasklist')->withInput();
        return View::make('edit-tasklist')->with('user', $user)->with('task', $task);
    }

    public function viewTasks($enumerator_id){

        $user = User::where('id', $enumerator_id)->get()->first();
        $tasks  = TasksModel::where('enumerator_id', $enumerator_id)->get();
        return view('view-tasklist')->withTasks($tasks)->with('user', $user);

    }

    public function  deleteTask($taskID, $enumerator_id, Request $request){


        if($taskID){
            $task =  TasksModel::where('task_id',$taskID)->get()->first();
            $task->delete();

            $request->session()->flash('alert-success','successfully deleted!');
            return $this->viewTasks($enumerator_id);

        }


    }
}

