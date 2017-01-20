<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use App\Models\User;
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

        $user = User::where(function ($query) {
            $query->where('is_enumerator', 1);

        })->where('firstname', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('id', 'LIKE', '%' . $query . '%')
            ->orWhere('lastname', 'LIKE', '%' . $query . '%')
            ->orWhere('county', 'LIKE', '%' . $query . '%')
            ->orWhere('ward', 'LIKE', '%' . $query . '%')->get();

        if (count($user) > 0) {

            return view('dashboard-official-search')->withDetails($user)->withQuery($query);
        } else {
            return view('dashboard-official-search')->withMessage('No Enumerators found. Try to search again !');
        }


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
        {
            debug(Input::old());

            $this->validate($request, [
                'duration' => 'required',
                'location' => 'required',
                'enumerator_id' => 'required|unique:task_list',
                'task_id' => 'unique:task_list|max:2'

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

            return view('create-tasklist');

        }

    }

    public function editTask($id,Request $request){
        $user = User::where('id', $id)->get()->first();
        $task =  TasksModel::find($id);

        if($request->isMethod('post')){
            $this->validate($request, [
                'duration' => 'required',
                'location' => 'required',
                'enumerator_id' => 'required|unique:task_list',
                'task_id' => 'unique:task_list|max:2'

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

            //$tasks->save();

        }
        return View::make('edit-tasklist')->with('user', $user)->with('task', $task);
    }
}

