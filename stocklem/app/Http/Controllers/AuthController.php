<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('auth.index')->withInput()->withErrors($validator->errors());
        } else {
            $credentials = $request->only(['email', 'password']);
            $user = User::where('email', $credentials['email'])->first();

            if ($user && $user->status !== 'ACTIVO') {
                return redirect()->route('auth.index')->with('error', 'Su usuario está inactivo');
            }

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('index');
            } else {
                return redirect()->route('auth.index')->with('error', 'Credenciales incorrectas');
            }
        }
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
