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
            'identifier' => 'required',
            'password'   => 'required',
        ], [
            'identifier.required' => 'Nomor WhatsApp atau nama wajib diisi.',
            'password.required'   => 'Password wajib diisi.',
        ]);

        $identifier = $request->identifier;
        $password   = $request->password;
        $user       = null;

        // Coba cocokkan sebagai nomor WhatsApp dulu
        $candidate = User::where('whatsapp', $identifier)->first();

        if ($candidate && Hash::check($password, $candidate->password)) {
            $user = $candidate;
        }

        // Jika tidak ketemu via WhatsApp, cari berdasarkan nama
        if (!$user) {
            $candidates = User::where('name', $identifier)->get();

            foreach ($candidates as $c) {
                if (Hash::check($password, $c->password)) {
                    $user = $c;
                    break;
                }
            }
        }

        // Jika masih tidak ketemu
        if (!$user) {
            return back()
                ->withErrors(['identifier' => 'Nomor WhatsApp/nama atau password salah.'])
                ->withInput(['identifier' => $identifier]);
        }

        Auth::login($user, $request->boolean('remember'));

        return $user->role === 'user'
            ? redirect('/dashboard')
            : redirect('/admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}