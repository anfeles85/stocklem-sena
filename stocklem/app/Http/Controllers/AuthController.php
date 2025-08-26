<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'g-recaptcha-response' => 'required|captcha'
    ];

    private $traductionAttributes = array(
        'email' => 'correo',
        'password' => 'contraseña',
        'g-recaptcha-response' => 'captcha'
    );
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            if(Auth::user()->status == 'ACTIVO')
            {
                return redirect()->route('index');
            }
            else
            {
                return redirect()->back()->withInput()->withErrors('error', 'Su usuario esta inactivo');
            }
        }
        return view('auth.login');
    }



    /**
     * Login de usuarios
     */
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if($user && $user->status !== 'ACTIVO')
        {
            return back()->withErrors(['Su usuario esta inactivo',]);
        }

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('index');
        }

        return back()->withErrors([
            'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
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
    }
}
