<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
     * Show the form for editing the authenticated user's profile
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit'.compact('user'));
    }

    /**
     * Update the authenticated user's profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,'.$user->id
            ],
            ],[
                'email.required' => 'el correo es obliagtorio',
                'email.email' => 'debe ser un correo valido',
                'email.unique' => 'este correo ya esta en uso'
            ],[
                'email' => 'correo electronico'
            ]);

            $user->email = $request->email;
            $user->save();

            return redirect()->route('profile.edit')->with('success', 'correo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
