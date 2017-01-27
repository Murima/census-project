<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Debugbar;
use Illuminate\Http\Request;

class SurveyFormsController extends Controller
{
    //
    public function receiveSurveyData($email,Request $request)
    {
           if ($request->has("form"))
	   {
		   	
                    return response()->json(['success' => 'Hurray mate!!'], 200);

               
           }
	   
                    return response()->json(['error' => 'invalid_credentials'], 401);
    }
}
