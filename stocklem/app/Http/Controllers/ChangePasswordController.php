<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{   
    public function index()
    {
        return view('auth.change_password');
    }
    
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|email|min:12',
        ], [], [
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña'
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'Contraseña cambiada exitosamente');
    }
}