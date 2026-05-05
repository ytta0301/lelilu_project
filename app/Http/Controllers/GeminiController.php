<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;

class GeminiController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function ask(Request $request)
    {

        $request->validate([
            'prompt' => 'required|string|max:200',
        ]);

        try {
            // Prepend system instruction directly into the prompt
            $systemPrompt = "Kamu adalah asisten LeLiLu Creative. Perlakukan saya sebagai pelanggan. Gunakan hanya Bahasa Indonesia atau Inggris, jawab singkat. jika user tidak jelas/singkat = jawab tidak tahu / apa yang bisa kami bantu
            Berikut adalah informasi LeLiLu :
            Brand Profile: Lelilu Creative (LeCre)

            Alasan nama LeLiLu: muncul tidak sengaja saat bersenandung LaLaLa~~~

            Esensi: Penyedia jasa (desain & joki) dengan prinsip Worth it: murah, cepat, dan profesional.

            Core Value: Memanjakan klien (customer-oriented).

            Karakter/Sifat: Reliable, Fast, Professional.

            Target Audiens: Gamer (saat ini), Brand kecil/UMKM (rencana ekspansi).

            Tone of Voice: Sopan & Semi-Profesional (Gunakan: Selamat siang kak. untuk menyapa saja).

            Visual Identity: * Warna Utama: Kuning.

            Gaya: Minimalis & Rapi.

            Kompetitor Utama: Nyok (Pasar Jual-Beli).

            Tujuan Identitas: Membangun citra yang rapi dan terpercaya untuk jangka pendek.

            Berikut harga produk kami:
            
            DAFTAR HARGA:
            Semua Produk : Rp 30.000  
            Jika pelanggan bertanya tentang harga, jawab berdasarkan daftar di atas saja.
            Jika produk tidak ada dalam daftar, katakan bahwa produk tersebut tidak tersedia.
            Jika ditanya selain tentang Lelilu Creative, jawab Tidak tahu.  
            \n\n";
            $fullPrompt = $systemPrompt . $request->input('prompt');

            // $fullPrompt = $request->input('prompt');

            // $models = Gemini::models()->list();

            // // dd($models);

            // $ayam = [];
            // foreach ($models->models as $model) {
            //     $ayam[] = $model->name;
            // }

            // dd($ayam);

            $result = Gemini::generativeModel(model: 'gemma-3-1b-it')
                ->generateContent($fullPrompt);

            $response = $result->text();
        } catch (\Exception $e) {
            $response = "Error: ";// . $e->getMessage();
        }

        $history = session('chat_history', []);
        $history[] = [
            'prompt' => $request->input('prompt'),
            'response' => $response,
        ];
        session(['chat_history' => $history]);

        return back();
    }

    public function clear()
    {
        session()->forget('chat_history');
        return redirect()->route('chatbot.index');
    }
}