<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\census_forms\InformationAll;
use Debugbar;
use Eloquent;
use Illuminate\Http\Request;

class SurveyFormsController extends Controller
{
    //
    public function receiveSurveyData($email,Request $request){
        /**
         * receive and sort the data using category
         */

        if ($request->has("form"))
        {
            $forms = $request->form;
            //dd($forms);
            //$forms_JObject = json_decode($forms);

            $category = $forms['category'];
            switch ($category){

                case 1:
                    $this->informationAll($forms);
                    break;
                case 2:
                    break;
                case 3:
                    break;

            }


            return response()->json(['success' => 'Hurray bro!!'], 200);


        }

        return response()->json(['error' => 'token_expired'], 401);
    }

    protected function storeData(){

    }
    protected function informationAll($forms){
        /**
         * check location and store to DB
         */
        Eloquent::unguard();

        unset($forms['location']); //TODO check location at the moment delete
        $all = new InformationAll($forms);
        $all->save();

    }
    protected function

    protected function checkLocation(){

    }


}
