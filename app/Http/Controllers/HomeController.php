<?php

namespace App\Http\Controllers;

use App\Models\FileHasil;
use App\Models\Portfolio;
use App\Models\Testimoni;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Best Seller: portofolio yang is_aktif = true
        $portofolios = Portfolio::aktif()->latest()->get();

        // Testimoni: 4 terbaru
        $testimonis = Testimoni::with('user')->latest()->take(4)->get();

        // Statistik "Siapa Kami?"
        $projectSelesai = FileHasil::count();
        $klienAktif     = User::where('role', '!=', 'admin')->count();

        return view('welcome', compact(
            'portofolios',
            'testimonis',
            'projectSelesai',
            'klienAktif'
        ));
    }
}