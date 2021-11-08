<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('patient.create');
});

Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
Route::post('/patient/create', [PatientController::class, 'store'])->name('patient.store');
