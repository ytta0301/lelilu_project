<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
// Tambahkan import Facade Auth di bawah ini
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        // Gunakan Auth::check() agar Intelephense mengenalnya
        if (!Auth::check()) {
            return view('history.history', ['pemesanans' => collect()]);
        }

        $status = $request->query('status');

        // Gunakan Auth::user() untuk mengambil id_user
        $query = Pemesanan::where('user_id', Auth::user()->id_user)
                          ->orderBy('created_at', 'desc');

        if ($status && $status !== 'semua') {
            $query->where('status', $status);
        }

        $pemesanans = $query->get();

        return view('history.history', compact('pemesanans'));
    }
}