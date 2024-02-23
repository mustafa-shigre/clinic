<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class LoginFormController extends Controller
{
    public function show(Request $request)
    {

        $doctors = Doctor::all();
        return view('loginForm', ['doctors' => $doctors]);
    }
}
