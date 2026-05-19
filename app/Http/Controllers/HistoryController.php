<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    // ── Daftar semua history pesanan milik user ──
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return view('history.history', ['pemesanans' => collect()]);
        }

        $status = $request->query('status');

        $query = Pemesanan::where('user_id', Auth::user()->id_user)
                          ->orderBy('created_at', 'desc');

        if ($status && $status !== 'semua') {
            $query->where('status', $status);
        }

        $pemesanans = $query->get();

        return view('history.history', compact('pemesanans'));
    }

    // ── Detail satu pesanan milik user ──
    public function show($id)
    {
        // Pastikan pesanan ini milik user yang sedang login
        $pemesanan = Pemesanan::with(['user', 'fileHasil'])
            ->where('user_id', Auth::user()->id_user)
            ->findOrFail($id);

        return view('detail.detail', compact('pemesanan'));
    }
}