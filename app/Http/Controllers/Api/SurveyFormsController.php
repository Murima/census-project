<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\census_forms\FemalesAbove12;
use App\Models\census_forms\HouseholdAssets;
use App\Models\census_forms\HouseholdConditions;
use App\Models\census_forms\InformationAll;
use App\Models\census_forms\InformationOnICT;
use App\Models\census_forms\LabourForce;
use App\Models\census_forms\PersonsAbove3;
use App\Models\census_forms\PersonsWithDisabilities;
use App\Models\FormStatus;
use App\Models\FormStatusModel;
use App\Models\TasksModel;
use App\Models\User;
use Debugbar;
use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyFormsController extends Controller
{
    //
    protected $headId;
    public $houseNo;
    protected $occupantNo;
    protected $location;
    protected $task_id;
    protected $date;
    protected $isSaved;
    protected $hasTask;

    public function receiveSurveyData($email, Request $request){
        /**
         * receive and sort the data using category value
         */

        if ($request->has("form"))
        {
            $forms = $request->form;
            $forms = json_decode($forms, true);
            $category = $forms['category'];
            $this->location = $forms['location']; //TODO check location

            //form identifiers

            //dd($forms);
            if (array_key_exists('head_id', $forms)){
                $this->headId= $forms['head_id'];
                $this->houseNo = $forms['houseNo'];
                $this->occupantNo = $forms['occupant_No'];
            }
            else{
                $form=InformationAll::orderBy('created_at','desc')->first();
                $this->headId = $form->head_id;
                $this->houseNo= $form->houseNo;
                $this->occupantNo = $form->occupantNo;
            }

            $user = User::whereEmail($email)->get();

            /*$formStatus=$this->checkDate($forms['date'], $user[0]->id);*/


//TODO unset the columns that will not be saved.

            unset($forms['date']);
            unset($forms['category']);
            $forms['head_id']=$this->headId;
            $forms['house_no']=$this->houseNo;

            switch ($category){

                case 1:
                    $this->informationAll($forms);
                    break;
                case 2:
                    $this->femalesAbove12($forms);
                    break;
                case 3:
                    $this->personsAbove3($forms);
                    break;
                case 4:
                    $this->informationICT($forms);
                    break;
                case 5:
                    $this->labourForce($forms);
                    break;
                case 6:
                    $this->householdAssets($forms);
                    break;
                case 7:
                    $this->householdConditions($forms);
                    break;
                case 8:
                    $this->personsDisabilities($forms);
                    break;
            }
            /* if ($this->isSaved){
                 if($formStatus){

                     $this->saveStatus($user,$status="Accepted", $category);

                 }
                 else{
                     $this->saveStatus($user, $status="Rejected", $category);
                 }

             }*/
            /*else{
                return response()->json(['error'=>'error in saving'], 401);
            }*/


            return response()->json(['success' => 'Hurray bro!!'], 200);
        }

        else    {
            return response()->json(['error'=>'token_expired'], 401);
        }


    }


    protected function informationAll($forms){
        /**
         * check location and store to DB
         */

        Eloquent::unguard();

        $all = new InformationAll($forms);
        if($all->save()){
            $this->isSaved=true;
        }

    }
    protected function femalesAbove12($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();

        $all  = new FemalesAbove12($forms);
        $ocuuNo = $this->addOccupantNo($all, $forms['head_id']);
        $forms['occupant_no']= $ocuuNo;
        if($all->save()){
            $this->isSaved=true;
        }
    }

    protected function personsAbove3($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();

        unset($forms['location']);

        $all  = new PersonsAbove3($forms);
        $forms['occupant_no']= $this->addOccupantNo($all, $forms['head_id']);

        if($all->save()){
            $this->isSaved=true;
        }
    }

    protected function informationICT($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();

        $all  = new InformationOnICT($forms);
        $forms['occupant_no']= $this->addOccupantNo($all, $forms['head_id']);

        if($all->save()){
            $this->isSaved=true;
        }
    }

    protected function personsDisabilities($forms){
        /**
         * store form to DB
         */
        unset($forms['location']);
        $forms['head_id']=$this->headId;
        $forms['house_no']=$this->houseNo;

        Eloquent::unguard();

        $all  = new PersonsWithDisabilities($forms);
        $forms['occupant_no']= $this->addOccupantNo($all, $forms['head_id']);

        if($all->save()){
            $this->isSaved=true;
        }
    }

    protected function labourForce($forms){
        /**
        /**
         * store form to DB
         */

        Eloquent::unguard();

        $all  = new LabourForce($forms);
        $forms['occupant_no']= $this->addOccupantNo($all, $forms['head_id']);

        if($all->save()){
            $this->isSaved=true;
        }
    }

    protected function householdAssets($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();


        $all  = new HouseholdAssets($forms);
        if($all->save()){
            $this->isSaved=true;
        }
    }
    protected function householdConditions($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();


        $all  = new HouseholdConditions($forms);
        if($all->save()){
            $this->isSaved=true;
        }
    }

    protected function addOccupantNo($model, $headId){
        /**
         * increment the occupant_no
         */

        $exists =$model->where('head_id', $headId)->first();
        if ($exists){
            return $exists->occupant_no= $exists->occupant_no+1;
        }
        else{
            return 1;
        }

    }
    protected function checkLocation(){
        /**
         * check location with task location
         */


    }

    protected function checkDate($dateSubmitted, $id){
        /**
         * check date of submission
         */
        $this->date = $dateSubmitted;
        $task = TasksModel::where('status', 'open')
            ->where('date', $dateSubmitted)
            ->where('enumerator_id', $id)->first();



        if ($task) {
            //task is found
            $this->task_id = $task->task_id;
            $task->stauts = 'closed';

            $task->save();

            $todayDate = date('j-m-Y');

            if ($todayDate == $dateSubmitted) {
                return true;
            } else {
                return false;
            }
        }
        else{//get the min id of task undone
            $taskAssumed=TasksModel::where('status', 'open')
                ->where('enumerator_id',$id)
                ->orderBy('task_id')->first();
            if ($taskAssumed){
                $this->task_id=$taskAssumed->task_id;
                $taskAssumed->status='closed';
                $taskAssumed->save();
            }
            $this->hasTask=false;

            return false;
        }

    }


    protected function saveStatus($user,$status, $category){
        /**
         * save the status of the form
         */

        $formStatus = new FormStatusModel();

        $formStatus->house_no= $this->houseNo;
        $formStatus->task_id= $this->task_id;
        $formStatus->category=$category;
        $formStatus->date= $this->date;
        $formStatus->status=$status;
        $formStatus->location= $this->location;
        $formStatus->enumerator_id= $user[0]->id;
        $formStatus->time= date('h:m:s',time());


        $task = TasksModel::where('task_id', $this->task_id)->first();
        if ($task){
            $task->post_status = $status;
            $task->save();
            $formStatus->save();

        }
    }

}
