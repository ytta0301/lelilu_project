<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        // Kalau tidak login, kirim data kosong
        if (!auth()->check()) {
            return view('history.history', ['pemesanans' => collect()]);
        }

        $status = $request->query('status'); // dari filter tab

        $query = Pemesanan::where('user_id', auth()->user()->id_user)
                          ->orderBy('created_at', 'desc');

        if ($status && $status !== 'semua') {
            $query->where('status', $status);
        }

        $pemesanans = $query->get();

        return view('history.history', compact('pemesanans'));
    }
}