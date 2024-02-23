<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    public function index()
    {

        $user   = \request()->user();
        $bookings = $user->bookings;
       //dd($bookings);
        return view('patients.index', ['bookings' => $bookings]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|numeric',
            'sex' => 'required|in:male,female',
            'specialization' => 'required|exists:specializations,id',
            'doctor' => 'required|exists:users,id',
            'available_time' => 'required|exists:available_dates,id',
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'sex' => $request->sex,
        ]);

        Booking::query()->create([
           'patient_id'=> $patient->id,
           'doctor_id'=>  $request->input('doctor'),
           'available_date_id'=>  $request->input('available_time'),
        ]);
        Session::flash('success'," عزيزي {$patient->name} تم تسجيل  حجزك عند الطبيب ف الساعة{$request->input('available_time')}" );

        return back();
    }
    public function destroy(Patient $patient)
    {

        $patient->delete();

        
        return back()->with('success', 'Patient deleted successfully.');
    }


}
