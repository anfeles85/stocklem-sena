<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    private $traductionAttributes = [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'role_id' => 'rol',
        'status' => 'estado'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
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
     * Show the form for editing the authenticated user's profile
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }

    /**
     * Update the authenticated user's profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $updateRules = [
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id
        ];

        $validator = Validator::make($request->all(), $updateRules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('user.profile')
                             ->withInput()
                             ->withErrors($validator);
        }

        $user->email = $request->input('email');
        $user->save();

        session()->flash('success', 'Perfil actualizado correctamente.');
        return redirect()->route('user.profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
