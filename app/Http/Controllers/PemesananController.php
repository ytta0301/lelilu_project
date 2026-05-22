<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function create()
    {
        $user = Auth::user(); // null kalau belum login, ada datanya kalau sudah login
        return view('order.order', compact('user'));
    }
    public function thanks()
    {
        // Kalau tidak ada wa_url di session, tolak akses langsung
        if (!session('wa_url')) {
            return redirect()->route('order.create');
        }

        return view('order.thanks');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'whatsapp'  => 'required|string|max:20',
            'jenis'     => 'required|string',
            'brief'     => 'required|string',
            'referensi' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'whatsapp.required'  => 'Nomor WhatsApp wajib diisi.',
            'jenis.required'     => 'Ukuran banner wajib dipilih.',
            'brief.required'     => 'Deskripsi pemesanan wajib diisi.',
            'referensi.image'    => 'File harus berupa gambar.',
            'referensi.max'      => 'Ukuran gambar maksimal 5MB.',
        ]);

        $referensiPath = null;
        if ($request->hasFile('referensi')) {
            $referensiPath = $request->file('referensi')
                ->store('referensi', 'public');
        }

        Pemesanan::create([
            'user_id'   => Auth::id(),
            'nama'      => $request->nama,
            'whatsapp'  => $request->whatsapp,
            'jenis'     => $request->jenis,
            'brief'     => $request->brief,
            'referensi' => $referensiPath,
            'harga'     => null,
            'status'    => 'pending',
        ]);

        $pesan = urlencode(
            "Halo, saya ingin pesan banner!\n\n" .
            "Nama: {$request->nama}\n" .
            "WhatsApp: {$request->whatsapp}\n" .
            "Ukuran: {$request->jenis}\n" .
            "Deskripsi: {$request->brief}"
        );

        $nomorAdmin = env('WA_ADMIN');

        return redirect()->route('order.thanks')
            ->with('wa_url', "https://wa.me/{$nomorAdmin}?text={$pesan}");
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('detail.detail', compact('pemesanan'));
    }
}