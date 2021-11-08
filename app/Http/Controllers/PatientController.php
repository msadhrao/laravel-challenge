<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\PatientRequest;
use App\Events\PatientRegisteredEvent;

class PatientController extends Controller
{

    /**
     * Show the form for creating a new patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store the submit patient fomr in storage.
     *
     * @param  \App\Http\Requests\PatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try{
            $patient = Patient::create($request->validated());
        } catch(\PDOException $e) {
            $request->session()->flash('message.level', 'danger');
			$request->session()->flash('message.content', 'Some DB error occurred! Try Again!');
			return back()->withInput();
        }

        event(new PatientRegisteredEvent($patient));

		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Patient added successfully.');
		return back(); 
    }
}
