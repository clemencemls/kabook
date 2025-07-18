<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\JobCategory;
use App\Models\Department;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $jobcategories = JobCategory::all();
        $animalcategories = AnimalCategory::all();
        $department = Department::all();
        return view('home.home', compact('jobcategories', 'animalcategories', 'department'));
    }

    public function searchPro(Request $request)
    {

        $request->validate([
            'departments' => 'required|array',
            'job_categories' => 'required|array',
            'animal_categories' => 'required|array',
        ]);

        // $professionals = Professional::whereHas('jobCategories', function ($q) use ($request) {
        //     $q->whereIn('id', $request->job_categories);
        // })
        //     ->whereHas('animalCategories', function ($q) use ($request) {
        //         $q->whereIn('id', $request->animal_categories);
        //     })
        //     ->whereHas('departments', function ($q) use ($request) {
        //         $q->whereIn('id', $request->departments);
        //     })
        //     ->get();

        $professionals = Professional::query();

        // Filtrer par catégories métiers uniquement si "all" n'est pas sélectionné
        if (!in_array('all', $request->input('job_categories'), true)) {
            $professionals->whereHas('jobCategories', function ($q) use ($request) {
                $q->whereIn('id', $request->input('job_categories'));
            });
        }

        if (!in_array('all', $request->input('animal_categories'), true)) {
            $professionals->whereHas('animalCategories', function ($q) use ($request) {
                $q->whereIn('id', $request->input('animal_categories'));
            });
        }

        if (!in_array('all', $request->input('departments'), true)) {
            $professionals->whereHas('departments', function ($q) use ($request) {
                $q->whereIn('id', $request->input('departments'));
            });
        }

        // Récupération finale des objets Eloquent
        $professionals = $professionals->get();

        $count = $professionals->count();
        $jobcategories = JobCategory::all();
        $animalcategories = AnimalCategory::all();
        $department = Department::all();


        return view('home.searchpro', compact('professionals', 'count', 'jobcategories', 'animalcategories', 'department'));
    }

    function showMonprofil($id)
    {

        $professional = Professional::findOrFail($id);



        return view('home.profil', compact('professional'));
    }
}
