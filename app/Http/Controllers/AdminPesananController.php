<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPesananController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemesanan::with('user')->latest();

        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('id_pemesanan', 'like', "%{$search}%")
                  ->orWhere('jenis', 'like', "%{$search}%")
                  ->orWhere('harga', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%")
                         ->orWhere('whatsapp', 'like', "%{$search}%");
                  });
            });
        }

        $pemesanans = $query->paginate(10)->withQueryString();

        $totalPesanan  = Pemesanan::count();
        $totalPending  = Pemesanan::where('status', 'pending')->count();
        $totalProses   = Pemesanan::where('status', 'proses')->count();
        $totalSelesai  = Pemesanan::where('status', 'selesai')->count();

        return view('admin.pesanan', compact(
            'pemesanans', 'totalPesanan', 'totalPending', 'totalProses', 'totalSelesai'
        ));
    }
}
