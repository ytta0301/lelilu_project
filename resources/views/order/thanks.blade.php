<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terima Kasih!</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'DM Sans', sans-serif;
      background: #f9f9f7;
      min-height: 100vh;
      display: flex;
      flex-direction: column;        /* ← tambah */
      align-items: center;
      justify-content: center;
      padding: 24px;
    }
    .card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 4px 40px rgba(0,0,0,0.07);
      padding: 52px 48px;
      text-align: center;
      max-width: 480px;
      width: 90%;
      animation: fadeUp 0.4s ease both;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .icon { font-size: 3rem; margin-bottom: 20px; }
    h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      margin-bottom: 12px;
    }
    h1 em { color: #F5C800; font-style: italic; }
    p {
      color: #7a7a7a;
      font-size: 0.95rem;
      line-height: 1.65;
      margin-bottom: 32px;
    }
    
    .btn {
      display: inline-block;
      background: #F5C800;
      color: #2a2a2a;
      font-family: 'DM Sans', sans-serif;
      font-weight: 700;
      font-size: 0.95rem;
      padding: 14px 36px;
      border-radius: 50px;
      text-decoration: none;
      transition: background 0.2s, transform 0.15s;
    }
    .btn:hover { background: #e0b400; transform: translateY(-2px); }
  .disclaimer {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    background: #fffbea;
    border: 1.5px solid #F5C800;
    border-radius: 13px;
    padding: 14px 18px;
    font-size: 0.88rem;
    color: #2a2a2a;
    line-height: 1.6;
    width: 100%;                   /* ← full width dalam wrapper */
  }
  .disclaimer-icon { font-size: 1rem; flex-shrink: 0; margin-top: 1px; }
  .disclaimer-link {
    color: #2a2a2a;
    font-weight: 700;
    text-decoration: underline;
    text-underline-offset: 3px;
  }
  .disclaimer-link:hover { color: #e0b400; }

  .wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;           /* ← center semua child */
    gap: 16px;
    width: 100%;
    max-width: 480px;
  }

  .card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 40px rgba(0,0,0,0.07);
    padding: 52px 48px;
    text-align: center;
    width: 100%;                   /* ← full width dalam wrapper */
    animation: fadeUp 0.4s ease both;
  }
  </style>
</head>
<body>
  <div class="wrapper">   {{-- ← tambah wrapper --}}
    <div class="card">
      <div class="icon">🎉</div>
      <h1>Terima <em>Kasih!</em></h1>
      <p>
        Pesanan kamu sudah kami terima.<br>
        Admin kami akan segera menghubungi kamu via WhatsApp.
      </p>
      <a href="/" class="btn">Kembali</a>
    </div>

    @if(session('wa_url'))
    <div class="disclaimer">
      <span class="disclaimer-icon">⚠️</span>
      <span>Jika WhatsApp tidak terbuka otomatis, <strong>izinkan popup</strong> di browser kamu atau
        <a href="{{ session('wa_url') }}" target="_blank" class="disclaimer-link">klik di sini</a>
      </span>
    </div>
    @endif
  </div>   {{-- ← tutup wrapper --}}

  @if(session('wa_url'))
    <script>
      window.open("{{ session('wa_url') }}", '_blank');
    </script>
  @endif
</body>
</html>