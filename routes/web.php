<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AvailableDateController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginFormController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\Specialization;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', [DashboardController::class , 'index']
    )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/doctorDashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

});

Route::middleware('guest')->group(function(){
    Route::get('/', function () {
    $specializations = Specialization::all();
    return view('loginForm', compact('specializations'));
    
});

    Route::post('/store-data', [PatientController::class, 'store'])->name('store-data');
    Route::get('/available-dates', [AvailableDateController::class, 'index'])->name('available_dates.index');
    Route::get('get-doctors/{specialization_id}', [DoctorController::class, 'getDoctors']);
    Route::get('get-available-time/{doctor_id}', [AvailableDateController::class, 'getAvailableTime']);
});







require __DIR__.'/auth.php';
