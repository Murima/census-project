<?php

namespace App\Http\Controllers;

use App\Models\FormStatusModel;
use App\Models\ReferenceModel;
use App\Models\RejectionReason;
use App\Models\TasksModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use View;

class DashboardController extends Controller
{
    //
    public function index(){
        $formDetails = array();
        $status = FormStatusModel::all();
        $tasks =TasksModel::all();

        $references = ReferenceModel::all();
        $rejectReason = new RejectionReason();

        foreach ($references as $reference){
            $formDetails[] = FormStatusModel::where('status_id',$reference->status_id)->get();
        }

        return View::make('dashboard-official')->with('tasks', $tasks)
            ->with('status', $status)
            ->with('references', $references)
            ->with('formDetails', $formDetails)
            ->with('rejectReason', $rejectReason);

    }

    public function confirmForm($status_id, Request $request){
        /**
         * confirm form
         */

        if($request->isMethod('PUT')){


            $formStatus= FormStatusModel::where('status_id', $status_id)->get()->first();
            $formStatus->status="Accepted";

            $formStatus->save();

            $this->deleteReference($status_id);
            return $this->index();
        }

        $submittedDetails= FormStatusModel::where('status_id', $status_id)->get()->first();
        $ward = User::find($submittedDetails->enumerator_id)->ward;
        $assignedDetails = TasksModel::find($submittedDetails->task_id);


        return view('reference-form')->withWard($ward)
            ->with('submittedDetails', $submittedDetails)
            ->with('assignedDetails', $assignedDetails);

    }


    public function declineForm($status_id, Request $request){
        /**
         * decision on the referenced form
         */

        if($request->isMethod('PUT')){


            $formStatus= FormStatusModel::where('status_id', $status_id)->get()->first();
            $formStatus->status="Rejected";

            $formStatus->save();

            $this->deleteReference($status_id);
            return $this->index();
        }

        $submittedDetails= FormStatusModel::where('status_id', $status_id)->get()->first();
        $ward = User::find($submittedDetails->enumerator_id)->ward;
        $assignedDetails = TasksModel::find($submittedDetails->task_id);


        return view('reference-form')->withWard($ward)
            ->with('submittedDetails', $submittedDetails)
            ->with('assignedDetails', $assignedDetails);
    }


    private function deleteReference($status_id){
        /**
         * delete reference
         */
        $ref = ReferenceModel::where('status_id', $status_id)->first();
        $ref->delete();
    }


}
