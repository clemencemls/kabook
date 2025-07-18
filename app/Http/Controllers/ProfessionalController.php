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
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone' => ['required', 'regex:/^0[1-9]\d{8}$/'],
            'job_categories' => 'required|array',
            'job_categories.*' => 'uuid|exists:job_categories,id',
            'animal_categories' => 'required|array',
            'animal_categories.*' => 'uuid|exists:animal_categories,id',
            // Si un utilisateur modifie le HTML pour envoyer 9999 alors que ce job n’existe pas, Laravel refusera la requête avec une erreur de validation.
        ]);

        // stockage temporaire en session
        $step1Data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'job_categories' => $request->input('job_categories'),
            'animal_categories' => $request->input('animal_categories'),
        ];

        session(['register_data.step1' => $step1Data]);

        // redirection vers l'étape 2
        return redirect()->route('register.step2');
    }


    public function registerStep2()
    {

        return view('auth.register_step2');

    }


    public function DoregisterStep2(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:50',
            'siret' => 'nullable|digits:14',
            'description' => 'required|string|min:1|max:1000',
            'education_background' => 'nullable|string|max:100',
            'experience_background' => 'nullable|string|max:100',
        ]);

        // stockage temporaire en session
        $step2Data = [
            'company_name' => $request->input('company_name'),
            'siret' => $request->input('siret'),
            'description' => $request->input('description'),
            'education_background' => $request->input('education_background'),
            'experience_background' => $request->input('experience_background'),
        ];

        session(['register_data.step2' => $step2Data]);

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
        $request->validate([
            'city' => 'required|string|max:50',
            'postal_code' => 'required|digits:5',
            'address' => 'nullable|string|max:255',
            'is_mobile' => 'required|boolean',
            'departments' => 'required|array',
            'departments.*' => 'integer|exists:departments,id',
        ]);

        // Récupérer toutes les données des étapes précédentes
        $data = array_merge(
            session('register_data.step0', []),
            session('register_data.step1', []),
            session('register_data.step2', []),
            $request->only(['city', 'postal_code', 'address', 'is_mobile', 'departments'])
        );

        // Création du User
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Création du Professional
        $professional = Professional::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'slug' => Str::slug($data['first_name'] . ' ' . $data['last_name'] . ' ' . Str::random(5)),
            'company_name' => $data['company_name'],
            'siret' => $data['siret'],
            'description' => $data['description'],
            'education_background' => $data['education_background'],
            'experience_background' => $data['experience_background'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'address' => $data['address'],
            'is_mobile' => $data['is_mobile'],
        ]);

        // $professional->jobCategories()->attach($data['job_categories']);
        // $professional->animalCategories()->attach($data['animal_categories']);
        // $professional->departments()->attach($data['departments']);

        // "Attacher" les relations many to many et verifier que les id existent bien, pour renforcer la sécurité
        // J'evite d’associer des IDs invalides au professionnel

        $idvalidJob = JobCategory::whereIn('id', $data['job_categories'])->pluck('id')->toArray();
        $professional->jobCategories()->sync($idvalidJob);

        $idvalidAnimal = AnimalCategory::whereIn('id', $data['animal_categories'])->pluck('id')->toArray();
        $professional->animalCategories()->sync($idvalidAnimal);

        $idvalidDepartment = Department::whereIn('id', $data['departments'])->pluck('id')->toArray();
        $professional->departments()->sync($idvalidDepartment);

        // Nettoyer la session
        session()->forget('register_data');

        // Connecter l'utilisateur
        Auth::login($user);

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
