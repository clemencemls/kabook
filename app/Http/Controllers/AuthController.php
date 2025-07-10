<?php

namespace App\Http\Controllers;

use App\Models\AnimalCategory;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login()
    {

        return view('auth.login');
    }

    public function DoLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            $request->session()->regenerate();

            return redirect()->intended('monprofil');
            // intended : 	Redirige vers la page initialement demandée, ou vers 'dashboard' par défault
        }

        return redirect()->back()->withErrors([
            'email' => 'Email ou mot de passe incorrect',
        ])->onlyInput('email');
    }


    public function register()
    {
        return view('auth.register');

    }

    public function DoRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        // sauvegarde de l'id du user en session
        session(['user_id' => $user->id]);

        // redirection vers l'etape 1
        return redirect()->route('register.step1');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        //
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
