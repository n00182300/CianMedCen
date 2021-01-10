<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Doctor;
use App\Models\Patient;

class VisitController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $visits = Visit::all();
      return view('admin.visits.index',[
        'visits'=>$visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $doctors = Doctor::all();
      $patients = Patient::all();

      return view('admin.visits.create',[
        'doctors' => $doctors,
        'patients' => $patients
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'date' => 'required|max:191',
        'startTime' => 'required',
        'endTime' => 'required',
        'cost' => 'required'
      ]);

      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->startTime = $request->input('startTime');
      $visit->endTime = $request->input('endTime');
      $visit->cost = $request->input('cost');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();

      return redirect()->route('admin.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('admin.visits.show',[
        'visit' => $visit
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $visit = Visit::findOrFail($id);

      return view('admin.visits.edit',[
        'visit' => $visit
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'date' => 'required|max:191',
        'startTime' => 'required',
        'endTime' => 'required',
        'cost' => 'required'
      ]);

      //
      // $visit->name = $request->input('name');
      // $visit->address = $request->input('address');
      // $visit->phone = $request->input('phone');
      // $visit->email = $request->input('email');
      // $visit->save();

      $visit = Visit::findOrFail($id);
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->date = $request->input('date');
      $visit->startTime = $request->input('startTime');
      $visit->endTime = $request->input('endTime');
      $visit->cost = $request->input('cost');

      return redirect()->route('admin.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);
      $visit->delete();

      return redirect()->route('admin.visits.index');
    }
}
