<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
     public function index()
    {
        
        $doctors = Doctor::all();
        return view('doctors.index', ['doctors' => $doctors]);
    }

    public function getDoctors($specialization_id)
    {

        $doctors = User::query()->where('specialization_id','=',$specialization_id)->get();
        return response()->json($doctors);
    }
}
