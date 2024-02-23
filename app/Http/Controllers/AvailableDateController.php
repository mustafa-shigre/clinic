<?php

namespace App\Http\Controllers;

use App\Models\AvailableDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvailableDateController extends Controller
{
    public function index()
    {
        
        $availableDates = AvailableDate::all();
        return view('available_dates.index', ['availableDates' => $availableDates]);
    }
    public function getAvailableTime($doctor_id)
    {
        $bookedTimesId = DB::table('bookings')->select('available_date_id')
            ->where('doctor_id',$doctor_id)
            ->get()
            ->pluck('available_date_id')
            ->toArray();
        $availableTimes = AvailableDate::query()
            ->whereNotIn('id',$bookedTimesId)
            ->get();
        return response()->json($availableTimes);
    }
}
