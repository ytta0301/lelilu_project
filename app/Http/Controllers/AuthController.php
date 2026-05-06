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
        return view('account.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'whatsapp' => 'required|string|unique:users,whatsapp',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'whatsapp.required'  => 'Nomor WhatsApp wajib diisi.',
            'whatsapp.unique'    => 'Nomor WhatsApp sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'whatsapp' => $request->whatsapp,
            'password' => bcrypt($request->password),
            'role'     => 'user',
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function showLogin()
    {
        return view('account.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required|string',
            'password' => 'required|string',
        ], [
            'whatsapp.required' => 'Nomor WhatsApp wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('whatsapp', $request->whatsapp)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'whatsapp' => 'Nomor WhatsApp atau password salah.',
            ])->withInput();
        }

        Auth::login($user, $request->boolean('remember'));

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}