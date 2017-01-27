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
use Debugbar;
use Eloquent;
use Illuminate\Http\Request;

class SurveyFormsController extends Controller
{
    //
    public function receiveSurveyData($email,Request $request){
        /**
         * receive and sort the data using category value
         */

        if ($request->has("form"))
        {
            $forms = $request->form;
            //dd($forms);
            //$forms_JObject = json_decode($forms);

            $category = $forms['category'];
            unset($forms['location']); //TODO check location at the moment delete

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

        $all = new InformationAll($forms);
        $all->save();

    }
    protected function femalesAbove12($forms){
        /**
         * store form to DB
         */
        Eloquent::unguard();

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

    }


}
