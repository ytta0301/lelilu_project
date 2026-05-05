<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('/account/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'whatsapp' => 'required|string|unique:users,whatsapp',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'whatsapp' => $request->whatsapp,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('/account/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('whatsapp', $request->whatsapp)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'whatsapp' => 'Nomor WhatsApp atau password salah.',
            ])->withInput();
        }

        Auth::login($user, $request->boolean('remember'));

        return redirect('/dashboard'); // sesuaikan tujuan setelah login
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}