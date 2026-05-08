<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::with('user')->latest()->get();

        return view('testimoni.testimoni', compact('testimonis'));
    }
}