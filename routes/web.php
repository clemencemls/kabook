<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfessionalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProfessionalController::class, 'index'])->name('home'); // HomePage
Route::get('login', [AuthController::class, 'login'])->name('login'); // formulaire de connexion
Route::post('DoLogin', [AuthController::class, 'DoLogin'])->name('DoLogin'); // post DoLogin
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('DoRegister', [AuthController::class, 'DoRegister'])->name('DoRegister');
Route::get('logout', [AuthController::class, 'logout'])->name('logout'); // se deconnecter
// Step1
Route::get('register/step1', [ProfessionalController::class, 'registerStep1'])->name('register.step1');
Route::post('DoRegister/step1', [ProfessionalController::class, 'DoregisterStep1'])->name('DoregisterStep1');
//step 2
Route::get('register/step2', [ProfessionalController::class, 'registerStep2'])->name('register.step2');
Route::post('DoRegister/step2', [ProfessionalController::class, 'DoregisterStep2'])->name('DoregisterStep2');
//step 3
Route::get('register/step3', [ProfessionalController::class, 'registerStep3'])->name('register.step3');
Route::post('DoRegister/step3', [ProfessionalController::class, 'DoregisterStep3'])->name('DoregisterStep3');

Route::get('monprofil', [ProfessionalController::class, 'showMonprofil'])->name('monprofil'); // profil

