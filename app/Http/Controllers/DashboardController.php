<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pesanans = Pemesanan::where('user_id', Auth::id())
            ->with('fileHasil')
            ->latest()
            ->take(3)
            ->get();

        return view('/dashboard/dashboard', compact('pesanans'));
    }
}