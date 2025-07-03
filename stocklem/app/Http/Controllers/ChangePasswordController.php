<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required|string|min:6'],
            'password' => ['required|string|min:6|confirmed'],
            'email' => 'required|string|min:12'
        ]);

        $currentPasswordstatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordstatus)
        {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Contraseña cambiada exitosamente');
        }
        else
        {
            return redirect()->back()->with('error', 'La contraseña actual no coincide con la contraseña antigua');
        }
    }
}
