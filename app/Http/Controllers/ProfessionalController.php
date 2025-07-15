<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\Department;
use App\Models\JobCategory;
use App\Models\Professional;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class ProfessionalController extends Controller
{
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
            'job_categories' => 'required|array',
            'animal_categories' => 'required|array',
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
        $departments = Department::all();

        return view('auth.register_step3', compact('departments'));

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
            'departments' => 'required|array',
        ]);

        $professional->update([
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'is_mobile' => $request->input('is_mobile'),

        ]);

        // je relis le ou les  départements cochés
        $professional->departments()->attach($request->input('departments'));

        Auth::loginUsingId($user_id);
        session()->forget('user_id');
        return redirect()->route('monprofil');
    }

    public function showMonprofil()
    {
        $professional = Auth::user()->professional;

        return view('professional.monprofil', compact('professional'));
    }

    public function showParametre()
    {

        return view('professional.parametres');
    }


    public function editInfos()
    {

        // $jobcategories = Auth::user()->professional->jobCategories;
        // $animalcategories = Auth::user()->professional->animalCategories;

        $professional = Auth::user()->professional;

        $jobcategories = JobCategory::all();
        $animalcategories = AnimalCategory::all();

        return view('professional.editinfos', compact('jobcategories', 'animalcategories', 'professional'));
    }

    public function updateInfos(Request $request)
    {
        $professional = Auth::user()->professional;
        if ($professional) {
            $professional->update([
                'company_name' => $request->input('company_name'),
                'last_name' => $request->input('last_name'),
                'first_name' => $request->input('first_name'),
                // 'job_categories' => $request->input('job_categories'),
                // 'animal_categories' => $request->input('animal_categories'),
                'is_mobile' => $request->input('is_mobile'),
            ]);

            // Mise à jour des relations N-N avec sync (Méthode Eloquent)
            if ($request->has('job_categories')) {
                $professional->jobCategories()->sync($request->input('job_categories'));
            }

            if ($request->has('animal_categories')) {
                $professional->animalCategories()->sync($request->input('animal_categories'));
            }
        }
        //renvoie de la vue
        return redirect()->route('monprofil')->with('success', 'Informations modifiés avec succes!');
    }


    public function editReseaux()
    {
        $professional = Auth::user()->professional;

        return view('professional.editreseaux', compact('professional'));
    }

    public function updateReseaux(Request $request)
    {

        $professional = Auth::user()->professional;
        if ($professional) {
            $professional->update([
                'website' => $request->input('website'),
                'instagram' => $request->input('instagram'),
                'facebook' => $request->input('facebook'),
            ]);
        }
        //renvoie de la vue
        return redirect()->route('monprofil')->with('success', 'Informations modifiés avec succes!');

    }

    public function editGeneral()
    {
        $professional = Auth::user()->professional;
        $departments = Department::all();

        return view('professional.editgeneral', compact('professional', 'departments'));
    }

    public function updateGeneral(Request $request)
    {

        $professional = Auth::user()->professional;
        if ($professional) {
            $professional->update([
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'phone' => $request->input('phone'),
                'postal_code' => $request->input('postal_code'),
                'siret' => $request->input('siret'),

            ]);

            if ($request->has('departments')) {
                $professional->departments()->sync($request->input('departments'));
            }
        }
        //renvoie de la vue
        return redirect()->route('monprofil')->with('success', 'Informations modifiés avec succes!');

    }




    public function editText()
    {
        $professional = Auth::user()->professional;

        return view('professional.edittext', compact('professional'));
    }


    public function updateText(Request $request)
    {

        $professional = Auth::user()->professional;
        if ($professional) {
            $professional->update([
                'description' => $request->input('description'),
                'education_background' => $request->input('education_background'),
                'experience_background' => $request->input('experience_background'),
            ]);
        }
        //renvoie de la vue
        return redirect()->route('monprofil')->with('success', 'Informations modifiés avec succes!');

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
    public function destroy()
    {
        /** @var User $user */
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Compte supprimé avec succès.');

    }
}
