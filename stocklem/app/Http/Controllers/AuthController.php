<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
<<<<<<< HEAD
     * Show the login form.
     */
    public function index()
    {
        if(Auth::check()) {
            return redirect()->route('index');
        }
        return view('auth.form');
    }

    /**
     * Login the user
     */
    public function login(Request $request)
    {
=======
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }

        return view('auth.login');
    }

    /**
     * Login de usuarios
     */
    public function login(Request $request){
>>>>>>> G4
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

<<<<<<< HEAD
        if(Auth::attempt($credentials)) {
=======
        if (Auth::attempt($credentials)){
>>>>>>> G4
            $request->session()->regenerate();
            return redirect()->intended('index');
        }

        return back()->withErrors([
<<<<<<< HEAD
            'email' => 'Credenciales incorrectas',
=======
            'email' => 'Estas credenciales no coinciden con nuestros registros.',
>>>>>>> G4
        ])->onlyInput('email');
    }

    /**
<<<<<<< HEAD
     * Logout the user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login.form');
=======
     * Cerrar la sesión del usuario
     */
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.index');
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
>>>>>>> G4
    }
}
