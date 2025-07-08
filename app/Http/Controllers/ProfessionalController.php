<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\JobCategory;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function registerStep1()
    {
        $jobcategories = JobCategory::all();
        $animalcategories = AnimalCategory::all();

        return view('auth.register_step1', compact('jobcategories', 'animalcategories'));

    }

    public function DoregisterStep1(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'job_categories' => 'required',
            'animal_categories' => 'required',
        ]);

        // il faut que je recupère l'id de l'user stocké dans le session à l'etape précedente
        $user_id = session('user_id');

        $professional = Professional::create([
            'user_id' => $user_id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'slug' => Str::slug($request->input('first_name') . ' ' . $request->input('last_name') . ' ' . Str::random(5), ),
        ]);

        // je relis les catégories metiers cochés
        $professional->jobCategories()->attach($request->input('job_categories'));
        // pas de crochet ici à job_categories, les crochets sont dans le name. Laravel fait automatiquement 'job_categories' => ['1', '2', '3']

        // je relis les catégories animaux cochés
        $professional->animalCategories()->attach($request->input('animal_categories'));


        // redirection vers l'etape 2
        return redirect()->route('register.step2');
    }

    public function registerStep2(Request $request)
    {


        return view('auth.register_step2');

    }
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
