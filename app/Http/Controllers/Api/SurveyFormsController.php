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
            $formStatus=$this->checkDate($forms['date'], $user[0]->id);

            if($formStatus){

                $this->saveStatus($user,$status="Accepted", $category);

            }
            else{
                $this->saveStatus($user, $status="Rejected", $category);
            }
//TODO unset the columns that will not be saved.

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
        unset($forms['date']);

        $all = new InformationAll($forms);
        $all->save();

    }
    protected function femalesAbove12($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();

        $forms['head_id']=$this->headId;
        $forms['houseNo']=$this->houseNo;

        $all  = new FemalesAbove12($forms);
        $all->save();
    }

    protected function personsAbove3($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();


        $all  = new PersonsAbove3($forms);
        $all->save();
    }

    protected function informationICT($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();


        $all  = new InformationOnICT($forms);
        $all->save();
    }

    protected function personsDisabilities($forms){
        /**
         * store form to DB
         */

        Eloquent::unguard();

        $all  = new PersonsWithDisabilities($forms);
        $all->save();
    }

    protected function labourForce($forms){
        /**
        /**
         * store form to DB
         */

        Eloquent::unguard();

        $all  = new LabourForce($forms);
        $all->save();
    }

    protected function householdAssets($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();


        $all  = new HouseholdAssets($forms);
        $all->save();
    }
    protected function householdConditions($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();


        $all  = new HouseholdConditions($forms);
        $all->save();
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
        $task = TasksModel::where('status', 'open')->where('date', $dateSubmitted)->get()->first();



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
        else{
            $this->task_id=0;
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

        $formStatus->save();

        $task = TasksModel::where('task_id', $this->task_id)->get();
        if ($task){
            $task->post_status = $status;
            $task->save();
        }
    }

}
