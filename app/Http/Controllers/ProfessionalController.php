<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\JobCategory;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


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

        // il faut que je recupère l'id de l'user stocké dans le session à l'etape précedente
        $user_id = session('user_id');


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|digits:10',
            'job_categories' => 'required',
            'animal_categories' => 'required',
        ]);

        $professional = Professional::create([
            'user_id' => $user_id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'slug' => Str::slug($request->input('first_name') . ' ' . $request->input('last_name') . ' ' . Str::random(5)),
        ]);

        // je relis les catégories metiers cochés
        $professional->jobCategories()->attach($request->input('job_categories'));
        // pas de crochet ici à job_categories, les crochets sont dans le name. Laravel fait automatiquement 'job_categories' => ['1', '2', '3']

        // je relis les catégories animaux cochés
        $professional->animalCategories()->attach($request->input('animal_categories'));

        // redirection vers l'etape 2

        return redirect()->route('register.step2');
    }

    public function registerStep2()
    {

        return view('auth.register_step2');

    }
    public function DoregisterStep2(Request $request)
    {
        $user_id = session('user_id');
        // je recupère le professionel lié à cet user_id
        // $professional = Professional::where('user_id', $user_id)->first();

        $user = User::findOrFail($user_id);
        $professional = $user->professional;

        $request->validate([
            'company_name' => 'required',
            'siret' => 'nullable|digits:14',
            'description' => 'required',
            'education_background' => 'nullable',
            'experience_background' => 'nullable',
        ]);

        $professional->update([
            'company_name' => $request->input('company_name'),
            'siret' => $request->input('siret'),
            'description' => $request->input('description'),
            'education_background' => $request->input('education_background'),
            'experience_background' => $request->input('experience_background'),
        ]);

        // redirection vers l'etape 3
        return redirect()->route('register.step3');
    }

    public function registerStep3()
    {

        return view('auth.register_step3');

    }
    public function DoregisterStep3(Request $request)
    {
        $user_id = session('user_id');
        // je recupère le professionel lié à cet user_id
        // $professional = Professional::where('user_id', $user_id)->first();

        $user = User::findOrFail($user_id);
        $professional = $user->professional;

        $request->validate([
            'city' => 'required',
            'postal_code' => 'required',
            'address' => 'nullable',
            'is_mobile' => 'required',
        ]);

        $professional->update([
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'is_mobile' => $request->input('is_mobile'),
        ]);

        Auth::loginUsingId($user_id);
        // session()->forget('user_id');
        return redirect()->route('monprofil');
    }

    public function showMonprofil()
    {

        return view('professional.monprofil');
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
