<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPortofolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();

        $stats = [
            'total'   => Portfolio::count(),
            'aktif'   => Portfolio::aktif()->count(),
            'hapus'   => Portfolio::onlyTrashed()->count(),
            'kreator' => Portfolio::distinct('nama_kreator')->count('nama_kreator'),
        ];

        return view('admin.portofolio', compact('portfolios', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kreator' => 'required|string|max:100',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_aktif'     => 'boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('portfolios', 'public');
        }

        $portfolio = Portfolio::create($validated);

        return response()->json($portfolio, 201);
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'nama_kreator' => 'required|string|max:100',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_aktif'     => 'boolean',
        ]);

        if ($request->hasFile('gambar')) {
            if ($portfolio->gambar) {
                Storage::disk('public')->delete($portfolio->gambar);
            }
            $validated['gambar'] = $request->file('gambar')
                ->store('portfolios', 'public');
        }

        $portfolio->update($validated);

        return response()->json($portfolio);
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return response()->json(['message' => 'Portofolio berhasil dihapus.']);
    }
}
