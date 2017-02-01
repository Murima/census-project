<?php

namespace App\Http\Controllers;

use App\Models\CensusEvent;
use App\Models\CensusId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RegistrationController extends Controller
{
    //
    //$table="census_event";

    public function createEvent(Request $request)
    {

        $id = CensusId::max('id')+10010;
        $new_id = new CensusId();
        $new_id->id=$id;
        $new_id->save();

        $censusID = $id;
        $censusName = $request['censusName'];
        $daterange = $request['daterange'];

        $event = new CensusEvent();
        $event->census_id = $censusID;
        $event->census_name = $censusName;
        $event->daterange = $daterange;

        $event->save();

        $numbEvents = $event->getNumberofEvents();
        $request->session()->flash('alert-success', 'Event successfully added!');

        return \View::make('dashboard')->with(compact('numbEvents'))->withId($id);
    }

    public function viewEvents(){
        $eventModels = CensusEvent::all();
        return view('dashboard-view-events')->with('events',$eventModels);
    }

    public function editEvent(Request $request, $id){

        $event = CensusEvent::whereCensusId($id)->get()->first();

        if ($request->isMethod('put')){
            $this->validate($request, [
                'censusID' => 'required',
                'daterange' => 'required',
                'censusName' => 'required'
            ]);
            $censusID = $request['censusID'];
            $censusName = $request['censusName'];
            $daterange = $request['daterange'];

            $event->census_id = $censusID;
            $event->census_name = $censusName;
            $event->daterange = $daterange;
            $event->save();

            $request->session()->flash('alert-success','successfully edited!');
            return $this->viewEvents();
        }

        return View::make('dashboard-edit-event')->withEvent($event);


    }

    public function deleteEvent(Request $request, $id){
        if ($id){
            $event = CensusEvent::whereCensusId($id)->get()->first();
            $event->delete();

            $censusId = CensusId::whereId($id)->get()->first();
            $censusId->delete();

            $request->session()->flash('alert-success','successfully deleted!');

            return $this->viewEvents();
        }
    }


}

