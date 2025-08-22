<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'role_id', 'status')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all()->map(function ($item) {
            return ['label' => $item->name, 'value' => $item->id];
        });

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|exists:role,id',
        ], [], [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
            'role_id' => 'rol'
        ]);

        if ($request->role_id == 1) {
            return redirect()->back()->withInput()->withErrors(['role_id' => 'No se puede crear un usuario Administrador']);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status' => 'ACTIVO'
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
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
        $user = User::findOrFail($id);
        $roles = Role::all()->map(fn($item) => ['label' => $item->name, 'value' => $item->id]);
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|exists:role,id',
            'status' => 'required|in:ACTIVO,INACTIVO'
        ], [], [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'role_id' => 'rol',
            'status' => 'estado'
        ]);

        if ($request->role_id == 1) {
            return redirect()->back()->withInput()->withErrors(['role_id' => 'No se puede asignar el rol de Administrador']);
        }

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'status' => $request->status
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'INACTIVO'; // Valor permitido en el enum
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario inactivado exitosamente');
    }
}
