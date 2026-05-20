<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortofolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::aktif()->latest()->paginate(6);

        return view('portofolio.portofolio', compact('portfolios'));
    }
}