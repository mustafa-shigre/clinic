<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \request()->user();

        $users = User::all();
        $specializations = Specialization::all(); 

        return view('dashboard', ['users' => $users, 'specializations' => $specializations]);


    }
}
