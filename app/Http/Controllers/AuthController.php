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
            'email' => 'required|max:50',
            'password' => 'required|min:4'
        ]);

        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        ) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('monprofil');
            }
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
            'email' => 'required|email|unique:users,email|max:50',
            'password' => 'required|min:4'
        ], [
            'email.unique' => 'Cet email a déjà un compte.',
        ]);
        // stockage temporaire en session
        $step0Data = $request->only('email', 'password');
        session(['register_data.step0' => $step0Data]);

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
