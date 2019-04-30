<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventType;
use App\Event;
use App\Organization;
use Validator;
use Auth;



class ServiceController extends Controller
{
    public function addService(Request $request){
        $types = EventType::all();
        $orgs = Organization::where('OrganizationId', Auth::user()->CompanyId)->get();
  
        return view('addService', [
            'types' => $types,
            'orgs' => $orgs
        ]);
    }

    //TODO: Add new fields to validation service
    public function store(Request $request){
        $input = $request->all();

        $validation = Validator::make($input, [
            'title' => 'required',
            'address' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'type_select' => 'required',
            'org_select' => 'required',
            'city' =>'required',
            'state_select' => 'required',
            'zip_code' => 'required|numeric'
        ]);


        if($validation->fails()){
            return redirect('/service')
            ->withInput()
            ->withErrors($validation);

        }

        
        $newEvent = new Event();
        $newEvent->Title = request('title');
        $newEvent->Address = $request->address;
        $newEvent->Date = $request->date;
        $newEvent->StartTime = $request->start_time;
        $newEvent->EndTime = $request->end_time;
        $newEvent->EventTypeId = $request->type_select;
        $newEvent->OrganizationId = $request->org_select;
        $newEvent->City = $request->city;
        $newEvent->State = $request->state_select;
        $newEvent->ZipCode = $request->zip_code;
        $newEvent->UserId = Auth::user()->id;

        $newEvent->save();
        
        return redirect('/map');

    }

    public function getUserServices(){
        $events = Event::where('UserId', Auth::user()->id)->get();
        $types = EventType::all();

        return view('myservices', [
            'events' => $events,
            'types' => $types
        ]);
    }

    public function edit($eventId=null){
        if($eventId){
            $event = Event::find($eventId);
            $types = EventType::all();
            $orgs = Organization::where('OrganizationId', Auth::user()->CompanyId)->get();

            return view('editService', [
                'event' => $event,
                'types' => $types,
                'orgs' => $orgs
            ]);
        }

    }

    public function storeService($eventId, Request $request){
        $input = $request->all();

        $validation = Validator::make($input, [
            'title' => 'required',
            'address' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'type_select' => 'required',
            'org_select' => 'required',
            'city' =>'required',
            'state_select' => 'required',
            'zip_code' => 'required|numeric'
        ]);


        if($validation->fails()){
            return redirect('/service')
            ->withInput()
            ->withErrors($validation);

        }

        $event = Event::find($eventId);

        $event->Title = request('title');
        $event->Address = $request->address;
        $event->Date = $request->date;
        $event->StartTime = $request->start_time;
        $event->EndTime = $request->end_time;
        $event->EventTypeId = $request->type_select;
        $event->OrganizationId = $request->org_select;
        $event->City = $request->city;
        $event->State = $request->state_select;
        $event->ZipCode = $request->zip_code;


        $event->save();

        return redirect('/myservices');

    }

    public function deleteService($eventId=null, Request $request){
        if($eventId){
            Event::find($eventId)->delete();
            return redirect('/myservices');
        }
        
    }
}
