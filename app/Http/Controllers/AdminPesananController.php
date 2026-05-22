<?php

namespace App\Http\Controllers;

use App\Models\FileHasil;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPesananController extends Controller
{
    // ──────────────────────────────────────────
    //  INDEX — Daftar semua pesanan
    // ──────────────────────────────────────────
    public function index(Request $request)
    {
        $query = Pemesanan::with('user')->latest();

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('id_pemesanan', 'like', "%{$search}%")
                  ->orWhere('jenis', 'like', "%{$search}%")
                  ->orWhere('harga', 'like', "%{$search}%")
                  ->orWhere('nama', 'like', "%{$search}%")
                  ->orWhere('whatsapp', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%")
                         ->orWhere('whatsapp', 'like', "%{$search}%");
                  });
            });
        }

        $pemesanans   = $query->paginate(10)->withQueryString();
        $totalPesanan = Pemesanan::count();
        $totalPending = Pemesanan::where('status', 'pending')->count();
        $totalProses  = Pemesanan::where('status', 'proses')->count();
        $totalSelesai = Pemesanan::where('status', 'selesai')->count();

        return view('admin.pesanan', compact(
            'pemesanans', 'totalPesanan', 'totalPending', 'totalProses', 'totalSelesai'
        ));
    }

    // ──────────────────────────────────────────
    //  SHOW — Detail satu pesanan
    // ──────────────────────────────────────────
    public function show($id)
    {
        $pemesanan = Pemesanan::with(['user', 'fileHasil'])->findOrFail($id);
        return view('admin.input', compact('pemesanan'));
    }

    // ──────────────────────────────────────────
    //  UPDATE — Simpan perubahan pesanan
    // ──────────────────────────────────────────
    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::with('fileHasil')->findOrFail($id);

        $request->validate([
            'harga'          => 'required|numeric|min:0',
            'status'         => 'required|in:pending,proses,selesai,dibatalkan',
            'gambar_hasil'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        // Update kolom di tabel pemesanans
        $pemesanan->update([
            'harga'  => $request->harga,
            'status' => $request->status,
        ]);

        // Proses upload gambar hasil (FileHasil)
        if ($request->hasFile('gambar_hasil')) {
            $path = $request->file('gambar_hasil')->store('hasil', 'public');

            if ($pemesanan->fileHasil) {
                // Hapus file lama dari storage
                Storage::disk('public')->delete($pemesanan->fileHasil->gambar_hasil);

                $pemesanan->fileHasil->update([
                    'gambar_hasil'      => $path,
                    'tanggal_upload'    => now()->toDateString(),
                    'tampil_portofolio' => $request->boolean('tampil_portofolio'),
                ]);
            } else {
                FileHasil::create([
                    'pemesanan_id'      => $pemesanan->id_pemesanan,
                    'gambar_hasil'      => $path,
                    'tampil_portofolio' => $request->boolean('tampil_portofolio'),
                    'tanggal_upload'    => now()->toDateString(),
                ]);
            }
        } elseif ($pemesanan->fileHasil?->id_file) {
            // Tidak ada upload baru, tapi bisa ubah tampil_portofolio
            // Cek id_file tidak null sebelum update agar tidak query WHERE id_file IS NULL
            $pemesanan->fileHasil->update([
                'tampil_portofolio' => $request->boolean('tampil_portofolio'),
            ]);
        }

        return redirect()->route('admin.pesanan')
            ->with('success', "Pesanan #{$pemesanan->id_pemesanan} berhasil diperbarui.");
    }
}