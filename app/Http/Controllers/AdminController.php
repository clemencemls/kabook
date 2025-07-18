<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\Department;
use App\Models\JobCategory;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function showDashboard()
    {

        $professional = Professional::all();
        $count = $professional->count();
        $user = Auth::user();
        return view('admin.dashboard', compact('professional', 'user', 'count'));

    }

    public function showCategories()
    {
        $jobcategories = JobCategory::all();
        $animalcategories = AnimalCategory::all();
        $departments = Department::all();

        return view('admin.categories', compact('jobcategories', 'animalcategories', 'departments'));
    }

}
