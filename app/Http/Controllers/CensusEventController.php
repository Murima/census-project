<?php

namespace App\Http\Controllers;

use App\Models\CensusEvent;
use Illuminate\Http\Request;

class CensusEventController extends Controller
{
    //
    //$table="census_event";

    public function createEvent(Request $request)
    {


        $censusID = $request['censusID'];
        $censusName = $request['censusName'];
        $daterange = $request['daterange'];

        $event = new CensusEvent();
        $event->census_id= $censusID;
        $event->census_name= $censusName;
        $event->daterange= $daterange;

        $event->save();

        $numbEvents= $event->getNumberofEvents();
        $request->session()->flash('alert-success','Event successfully added!');

        return view('dashboard')->with('numberofEvents', $numbEvents);
    }



}
