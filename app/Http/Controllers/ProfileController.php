<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('profile.profile', compact('user'));
    }
    
    // Tampilkan halaman profile
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    // Proses update data
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'         => 'required|string|max:255',
            'whatsapp'     => 'required|numeric|unique:users,whatsapp,' . $user->id_user . ',id_user',
            'old_password' => 'nullable',
            'new_password' => 'nullable|min:6|confirmed', // harus ada field new_password_confirmation
        ]);

        // Update nama & whatsapp
        $user->name  = $request->name;
        $user->whatsapp = $request->whatsapp;

        // Update password hanya kalau diisi
        if ($request->filled('old_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama salah.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil disimpan!');
    }
}