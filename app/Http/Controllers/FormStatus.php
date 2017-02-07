<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use App\Models\FormStatusModel;
use Illuminate\Http\Request;

class FormStatus extends Controller
{
    //
    public  function index(){
        $formDetails = array();

        $tasks = TasksModel::all();

        $formStatus = FormStatusModel::all();
        for ($i=0;$i<$tasks->count();$i++){


        }

        return view('form-status');
    }


}
