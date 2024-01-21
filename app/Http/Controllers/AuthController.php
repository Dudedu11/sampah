<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function option()
    {
        return view('auth.option');
    }


    public function loginAction(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true])) {
            $user = Auth::user();
            session(['role' => $user->role_id]);
            session(['user' => $user->id]);
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Akun belum diverifikasi.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
