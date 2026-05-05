<?php

use App\Models\Product;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\GeminiController;
=======
use App\Http\Controllers\AuthController; 

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> 661f3a379fe8aacdb56b7cda424285d8989c25c0

Route::get('/chatbot', [GeminiController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/ask', [GeminiController::class, 'ask'])->name('gemini.ask');
Route::post('/chatbot/clear', [GeminiController::class, 'clear'])->name('chatbot.clear');


Route::get("/bebek", (function()  {
    echo "bebek";
    $products = Product::where("price", ">", 10000)->get();
    dd($products);
}));

Route::get("/motor", function(){

    $ayam = Product::all();
    // $ayam = 1;
    $bebek = "bebek enak";
    return view("mawar", ["bebek" => $ayam]);
});
<<<<<<< HEAD

Route::get("/pesawat", function(){

    $ikan = Product::all();

    // kodingan
// $buah = Product::where("price", ">", 0)->get();
foreach ($ikan as &$buah) {
        $buah->jawa = 'hitam';
    if ($buah->price > 10000 && $buah->price < 18000){
        echo "Merah";
        $buah->jawa = 'Merah';
    } elseif ($buah->price > 18000 && $buah->price < 30000){
        $buah->jawa = 'Kuning';
        echo "Kuning";
    } elseif ($buah->price > 30000){
        $buah->jawa = 'Hijau';
        echo "Hijau";
}


}
// dd($hewan);
    return view("kardus", ["hiu" => $ikan]);

    // dd($ikan);

    // dd($ikan);
    // $ikan->price = Product::from("");
    // $ikan->jawa = Produ  ct::where("price");
    // echo "$ikan->price";
    // echo $jawa;
});

Route::get('/cina', function(){
    // $putih = "putih";

    // $hewan = [["Ayam Goreng", 15000], ["Bebek Bakar", 20000], ["Cicak Terbang", 100000],["Kuda Renang", 50000]];

    // for ($i=0; $i <= count($hewan) - 1; $i++) { 
    //     $hewan[$i][] = $putih;
    // }

$hewan = [["Ayam Goreng", 15000], ["Bebek Bakar", 20000], ["Cicak Terbang", 100000],["Kuda Renang", 50000]];
    $putih = "putih";
    for ($i=0; $i <= count($hewan) - 1; $i++) { 

        if ($hewan[$i][1] > 10000 && $hewan[$i][1] < 18000) {
            $hewan[$i][] = "Merah";
            echo "merah";
        } elseif ($hewan[$i][1] > 18000 && $hewan[$i][1] < 30000) {
            echo "kuning";
            $hewan[$i][] = "Kuning";
        } elseif ($hewan[$i][1] > 30000) {
            echo "hijau";
            $hewan[$i][] = "Hijau";
        } else {
            echo "Error";
        }  
    }

    dd($hewan);
});

Route::get("/pulau/{id}", function($waw){

    $ikan = Product::all();
    echo $waw;

foreach ($ikan as &$buah) {
        $buah->jawa = 'hitam';
    if ($buah->price < $waw){
        echo "Merah";
        $buah->jawa = 'Merah';
    } elseif ($buah->price == $waw){
        $buah->jawa = 'Kuning';
        echo "Kuning";
    } elseif ($buah->price > $waw){
        $buah->jawa = 'Hijau';
        echo "Hijau";
    }
}
    return view("kardus", ["hiu" => $ikan]);
});

Route::get('/index', function(){
        $siput = Post::all();
        dd($siput);
    return view("index", ["keong" => $siput]);
});
=======
Route::get('/dashbord', function () {
    return view('dashbord.dashbord'); // Folder.NamaFile
});

>>>>>>> 661f3a379fe8aacdb56b7cda424285d8989c25c0
