<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessionalController;
use App\Models\Professional;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home'); // HomePage
Route::get('search', [HomeController::class, 'searchPro'])->name('search'); // Recherche d'un pro
Route::get('monprofil/{id}', [HomeController::class, 'showMonprofil'])->name('monprofil.pro'); // visite des profils

// Step1
Route::get('register/step1', [ProfessionalController::class, 'registerStep1'])->name('register.step1');
Route::post('DoRegister/step1', [ProfessionalController::class, 'DoregisterStep1'])->name('DoregisterStep1');
//step 2
Route::get('register/step2', [ProfessionalController::class, 'registerStep2'])->name('register.step2');
Route::post('DoRegister/step2', [ProfessionalController::class, 'DoregisterStep2'])->name('DoregisterStep2');
//step 3
Route::get('register/step3', [ProfessionalController::class, 'registerStep3'])->name('register.step3');
Route::post('DoRegister/step3', [ProfessionalController::class, 'DoregisterStep3'])->name('DoregisterStep3');


// Se connecter
Route::get('login', [AuthController::class, 'login'])->name('login'); // formulaire de connexion
Route::post('DoLogin', [AuthController::class, 'DoLogin'])->name('DoLogin')->middleware(['throttle:api']); // post DoLogin
Route::get('logout', [AuthController::class, 'logout'])->name('logout'); // se deconnecter

// S'inscrire
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('DoRegister', [AuthController::class, 'DoRegister'])->name('DoRegister');

Route::middleware(['auth'])->group(function () {

    Route::get('monprofil', [ProfessionalController::class, 'showMonprofil'])->name('monprofil'); // profil
    Route::get('paramètre', [ProfessionalController::class, 'showParametre'])->name('parametre'); // paramètres

    //Admin
    Route::get('dashboard', [AdminController::class, 'showDashboard'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('dashboard'); // dashboard admin
    Route::get('categories', [AdminController::class, 'showCategories'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('categories'); // Liste des catégories
    Route::get('animalcategorie/{id}/edit', [AdminController::class, 'editAnimal'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('editanimalcat'); // modifier
    Route::get('jobcategorie/{id}/edit', [AdminController::class, 'editJob'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('editjobcat'); // modifier
    Route::get('department/{id}/edit', [AdminController::class, 'editDepartment'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('editdepartment'); // modifier
    Route::put('animalcategorie/{id}/update', [AdminController::class, 'updateAnimal'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('updateanimalcat'); // modifier
    Route::put('jobcategorie/{id}/update', [AdminController::class, 'updateJob'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('updatejobcat'); // modifier
    Route::put('department/{id}/update', [AdminController::class, 'updateDepartment'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('updatedepartment'); // modifier
    Route::post('storejob', [AdminController::class, 'storeJob'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('job.store'); // créer une categorie
    Route::post('storeanimal', [AdminController::class, 'storeAnimal'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('animal.store');
    Route::post('storedepartment', [AdminController::class, 'storeDepartment'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('department.store');
    Route::delete('animalcategorie/{id}/delete', [AdminController::class, 'destroyAnimal'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('animal.destroy');
    Route::delete('jobcategorie/{id}/delete', [AdminController::class, 'destroyJob'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('job.destroy');
    Route::delete('department/{id}/delete', [AdminController::class, 'destroyDepartment'])->name('department.destroy');
    Route::get('users', [AdminController::class, 'showUsers'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('users'); // liste des users
    Route::delete('users/{id}/delete', [AdminController::class, 'destroyUsers'])->middleware(\App\Http\Middleware\CheckUserRole::class . ':admin')->name('users.destroy');// supprimer un user

    //Utilisateurs
    Route::get('professional/{id}/edit-infos', [ProfessionalController::class, 'editInfos'])->name('edit-infos'); //modifier infos principales
    Route::get('professional/{id}/edit-reseaux', [ProfessionalController::class, 'editReseaux'])->name('edit-reseaux'); //modifier reseaux sociaux
    Route::get('professional/{id}/edit-general', [ProfessionalController::class, 'editGeneral'])->name('edit-general'); //modifier infos general
    Route::get('professional/{id}/edit-text', [ProfessionalController::class, 'editText'])->name('edit-text'); // modifier description,parcours,formation

    Route::put('professional/update-infos', [ProfessionalController::class, 'updateInfos'])->name('update.infos');
    Route::put('professional/update-reseaux', [ProfessionalController::class, 'updateReseaux'])->name('update.reseaux');
    Route::put('professional/update-general', [ProfessionalController::class, 'updateGeneral'])->name('update.general');
    Route::put('professional/update-text', [ProfessionalController::class, 'updateText'])->name('update.text');

    Route::delete('professional/delete', [ProfessionalController::class, 'destroy'])->name('professional.destroy');  // supprimer son compte
});

