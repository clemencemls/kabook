<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\Department;
use App\Models\JobCategory;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function editAnimal(string $id)
    {
        $animalcategorie = AnimalCategory::findOrFail($id);
        return view('admin.animaledit', compact('animalcategorie'));
    }


    public function updateanimal(Request $request, string $id)
    {

        //trouver la categorie a modifier
        $animalcategorie = AnimalCategory::findOrFail($id);
        if ($animalcategorie) {
            $animalcategorie->update([
                'name' => $request->input('name')
            ]);
        }
        // renvoie de la vue
        return redirect()->back()->with('success', 'Categorie modifiée avec succss!');
    }

    public function editJob(string $id)
    {
        $jobcategorie = JobCategory::findOrFail($id);
        return view('admin.jobedit', compact('jobcategorie'));
    }

    public function updatejob(Request $request, string $id)
    {

        $jobcategorie = JobCategory::findOrFail($id);
        if ($jobcategorie) {
            $jobcategorie->update([
                'name' => $request->input('name')
            ]);
        }
        // renvoie de la vue
        return redirect()->back()->with('success', 'Categorie modifiée avec succss!');
    }

    public function editDepartment(string $id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departmentedit', compact('department'));
    }

    public function updateDepartment(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10',
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);

        return redirect()->back()->with('success', 'Catégorie modifiée avec succès !');
    }

    public function storeJob(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Créer une nouvelle catégorie
        $jobcategorie = JobCategory::create([
            'name' => $request->input('name'),
        ]);

        // Retour avec message de succès
        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');
    }


    public function storeAnimal(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Création de la nouvelle catégorie
        $animalCategory = AnimalCategory::create([
            'name' => $request->input('name'),
        ]);

        // Retour avec message de succès
        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');
    }

    public function storeDepartment(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10', // ajuste la longueur selon ta base
        ]);

        // Création du département
        $department = Department::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);

        // Retour avec un message de succès
        return redirect()->back()->with('success', 'Département ajouté avec succès !');
    }

    public function destroyJob(string $id)
    {
        //trouver la categorie a supprimé
        $jobcategorie = JobCategory::findOrFail($id);
        //supprimer avec la methode Eloquent delete()
        $jobcategorie->delete();
        //faire une redirection dans la meme page
        return redirect()->back()->with('success', 'Catégorie suprimée');
    }

    public function destroyAnimal(string $id)
    {
        //trouver la categorie a supprimé
        $animalcategorie = AnimalCategory::findOrFail($id);
        //supprimer avec la methode Eloquent delete()
        $animalcategorie->delete();
        //faire une redirection dans la meme page
        return redirect()->back()->with('success', 'Catégorie suprimée');
    }

    public function destroyDepartment(string $id)
    {
        //trouver la categorie a supprimé
        $department = Department::findOrFail($id);
        //supprimer avec la methode Eloquent delete()
        $department->delete();
        //faire une redirection dans la meme page
        return redirect()->back()->with('success', 'Department supprimé');
    }

    public function showUsers()
    {
        $professionals = Professional::all();
        return view('admin.users', compact('professionals'));
    }

    public function destroyUsers(string $id)
    {
        $pro = Professional::findOrFail($id);
        $user = $pro->user;
        $user->delete();

        //faire une redirection dans la meme page
        return redirect()->back()->with('success', 'Utilisateur suprimée');
    }


}
