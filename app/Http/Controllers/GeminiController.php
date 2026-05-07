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
            $systemPrompt =
            "Kamu adalah asisten virtual LeLiLu Creative (LeCre). Layani pelanggan dengan sopan dan semi-profesional.

            ATURAN UTAMA:
            - Sapa pelanggan dengan: 'Selamat siang kak.' (hanya saat menyapa pertama)
            - Gunakan Bahasa Indonesia atau Inggris saja
            - Jawab singkat dan jelas
            - Jika pertanyaan tidak berkaitan dengan LeLiLu Creative, jawab: 'Mohon maaf kak, saya hanya bisa membantu seputar LeLiLu Creative.'
            - Jika pertanyaan tidak jelas, tanya: 'Ada yang bisa kami bantu kak?'

            TENTANG LELILU CREATIVE:
            LeLiLu Creative adalah penyedia jasa desain dengan prinsip: murah, cepat, dan profesional.

            LAYANAN DESAIN:
            - Menerima berbagai jenis desain (banner, foto profil, dll.)
            - TIDAK menerima order desain logo (untuk saat ini)

            HARGA:
            - Mulai dari Rp 30.000
            - Harga bervariasi tergantung jenis desain dan tingkat kesulitan
            - Harga TIDAK BISA dinegosiasi
            - Belum ada paket/bundle

            REVISI:
            - Gratis 3x revisi major
            - Lebih dari 3x revisi major dikenakan biaya tambahan

            WAKTU PENGERJAAN:
            - Maksimal 24 jam untuk desain reguler (banner, foto profil, dll.)

            Jika pelanggan bertanya detail harga spesifik yang tidak ada di atas, arahkan untuk menghubungi admin LeLiLu Creative.;  
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

            $result = Gemini::generativeModel(model: 'gemini-2.5-flash-lite')
                ->generateContent($fullPrompt);

            $response = $result->text();
        } catch (\Exception $e) {
            $response = "Error: " . $e->getMessage();
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