<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - LeLiLu Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #F4F4F0; }

        .sidebar { width: 230px; background: #1E1E1E; min-height: 100vh; padding: 20px 14px; display: flex; flex-direction: column; gap: 2px; }
        .sb-logo { font-size: 18px; font-weight: 700; color: #fff; padding: 4px 10px 20px; letter-spacing: 0.5px; }
        .sb-logo span { color: #FFD700; }
        .sb-section { font-size: 10px; color: #555; padding: 10px 10px 4px; letter-spacing: 0.6px; text-transform: uppercase; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 10px; font-size: 13px; color: #aaa; cursor: pointer; transition: background 0.2s; text-decoration: none; }
        .nav-item:hover { background: rgba(255,255,255,0.07); color: #ddd; }
        .nav-item.active { background: #FFD700; color: #000; font-weight: 600; }
        .nav-item svg { flex-shrink: 0; width: 17px; height: 17px; }

        .stat-card { background: #fff; border-radius: 16px; padding: 20px 22px; box-shadow: 0 1px 4px rgba(0,0,0,0.06); }
        .stat-num { font-size: 32px; font-weight: 700; color: #111827; line-height: 1.1; }
        .stat-lbl { font-size: 12px; color: #6B7280; margin-top: 4px; }

        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #F3F4F6; }
        th { text-align: left; padding: 11px 16px; font-size: 12px; font-weight: 500; color: #6B7280; }
        th:first-child { border-radius: 10px 0 0 10px; }
        th:last-child  { border-radius: 0 10px 10px 0; text-align: right; }
        td { padding: 13px 16px; font-size: 13px; color: #111827; border-bottom: 1px solid #F3F4F6; vertical-align: middle; }
        td:last-child { text-align: right; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #FAFAFA; }

        .thumb-img { width: 46px; height: 46px; border-radius: 10px; object-fit: cover; display: block; }
        .thumb-placeholder { width: 46px; height: 46px; border-radius: 10px; display: block; flex-shrink: 0; }

        .btn-action { font-size: 12px; padding: 5px 12px; border-radius: 8px; border: 1px solid #E5E7EB; background: transparent; color: #6B7280; cursor: pointer; transition: all 0.15s; font-family: 'Poppins', sans-serif; }
        .btn-action:hover { border-color: #FFD700; color: #000; background: #FFFBEA; }
        .btn-action.hapus { color: #EF4444; }
        .btn-action.hapus:hover { border-color: #FCA5A5; background: #FEF2F2; color: #DC2626; }

        .page-btn { width: 30px; height: 30px; border: 1px solid #E5E7EB; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; cursor: pointer; font-size: 14px; color: #374151; background: #fff; transition: background 0.15s; }
        .page-btn:hover { background: #F3F4F6; }
        .page-btn:disabled { opacity: 0.4; cursor: not-allowed; }
        .page-select { border: 1px solid #E5E7EB; border-radius: 8px; padding: 4px 8px; font-size: 12px; font-family: 'Poppins', sans-serif; color: #374151; background: #fff; cursor: pointer; }

        .search-wrap { position: relative; }
        .search-wrap svg { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); pointer-events: none; }
        .search-input { width: 220px; padding: 8px 12px 8px 34px; border: 1px solid #E5E7EB; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; color: #374151; background: #F9FAFB; outline: none; transition: border 0.2s; }
        .search-input:focus { border-color: #FFD700; background: #fff; }
        .search-input::placeholder { color: #9CA3AF; }

        .modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 50; display: none; align-items: center; justify-content: center; }
        .modal-overlay.open { display: flex; }
        .modal-box { background: #fff; border-radius: 20px; padding: 30px; width: 100%; max-width: 460px; box-shadow: 0 20px 60px rgba(0,0,0,0.18); animation: slideUp 0.25s ease; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
        .modal-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
        .modal-title { font-size: 15px; font-weight: 700; color: #111827; }
        .modal-close { width: 30px; height: 30px; border-radius: 8px; border: 1px solid #E5E7EB; background: transparent; cursor: pointer; display: flex; align-items: center; justify-content: center; color: #6B7280; font-size: 18px; line-height: 1; transition: background 0.15s; }
        .modal-close:hover { background: #F3F4F6; }

        .form-group { margin-bottom: 14px; }
        .form-label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 5px; }
        .form-input { width: 100%; padding: 9px 13px; border: 1px solid #E5E7EB; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; color: #111827; background: #F9FAFB; outline: none; transition: border 0.2s, background 0.2s; }
        .form-input:focus { border-color: #FFD700; background: #fff; box-shadow: 0 0 0 3px rgba(255,215,0,0.12); }
        .form-input::placeholder { color: #9CA3AF; }
        textarea.form-input { resize: none; height: 70px; }

        .dropzone { border: 2px dashed #E5E7EB; border-radius: 12px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.2s; background: #F9FAFB; }
        .dropzone:hover, .dropzone.drag { border-color: #FFD700; background: #FFFBEA; }

        .form-footer { display: flex; gap: 10px; margin-top: 20px; }
        .btn-submit { flex: 1; background: #FFD700; color: #000; font-weight: 600; font-size: 14px; padding: 11px; border-radius: 12px; border: none; cursor: pointer; font-family: 'Poppins', sans-serif; transition: background 0.15s; }
        .btn-submit:hover { background: #EFC900; }
        .btn-cancel { padding: 11px 20px; border-radius: 12px; border: 1px solid #E5E7EB; background: transparent; font-size: 14px; font-family: 'Poppins', sans-serif; color: #6B7280; cursor: pointer; }
        .btn-cancel:hover { background: #F3F4F6; }

        .toast { position: fixed; bottom: 24px; right: 24px; background: #1E1E1E; color: #fff; font-size: 13px; font-family: 'Poppins', sans-serif; padding: 12px 20px; border-radius: 12px; z-index: 999; opacity: 0; transform: translateY(10px); transition: all 0.3s; pointer-events: none; }
        .toast.show { opacity: 1; transform: translateY(0); }
        .toast.success { border-left: 4px solid #FFD700; }
        .toast.error   { border-left: 4px solid #EF4444; }

        .empty-cell { text-align: center; padding: 40px !important; color: #9CA3AF; font-size: 14px; }

        .toggle-wrap { display: flex; align-items: center; gap: 8px; }
        .toggle { position: relative; width: 38px; height: 22px; background: #D1D5DB; border-radius: 11px; cursor: pointer; transition: background 0.2s; }
        .toggle.on { background: #FFD700; }
        .toggle::after { content: ''; position: absolute; top: 2px; left: 2px; width: 18px; height: 18px; background: #fff; border-radius: 50%; transition: transform 0.2s; }
        .toggle.on::after { transform: translateX(16px); }
        .toggle-label { font-size: 12px; color: #6B7280; }
    </style>
</head>
<body>

<div class="flex min-h-screen">

    @include('layout.sidebar')

    <main class="flex-1 p-7 overflow-y-auto">

        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="stat-card">
                <p class="stat-num" id="statTotal">{{ $stats['total'] }}</p>
                <p class="stat-lbl">Total portofolio</p>
            </div>
            <div class="stat-card">
                <p class="stat-num" id="statAktif">{{ $stats['aktif'] }}</p>
                <p class="stat-lbl">Aktif ditampilkan</p>
            </div>
            <div class="stat-card">
                <p class="stat-num">{{ $stats['kreator'] }}</p>
                <p class="stat-lbl">Kreator terdaftar</p>
            </div>
            <div class="stat-card">
                <p class="stat-num" id="statHapus">{{ $stats['hapus'] }}</p>
                <p class="stat-lbl">Dihapus</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between gap-4 mb-5">
                <h2 class="text-lg font-bold text-gray-900 whitespace-nowrap">Daftar Portofolio</h2>
                <div class="flex items-center gap-3">
                    <div class="search-wrap">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9CA3AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <input class="search-input" id="searchInput" type="text" placeholder="Cari portofolio...">
                    </div>
                    <button id="btnTambah" class="bg-[#FFD700] text-black font-semibold text-sm px-5 py-2.5 rounded-xl hover:bg-yellow-400 transition whitespace-nowrap">
                        + Tambah Portofolio
                    </button>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Gambar</th>
                        <th>Nama Kreator</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>

            <div class="flex items-center justify-between mt-5 text-sm text-gray-500">
                <span><span id="pgInfo" class="font-semibold text-gray-800">0</span> dari <span id="pgTotal">0</span></span>
                <div class="flex items-center gap-2">
                    <span class="text-xs">Halaman</span>
                    <select class="page-select" id="pageSelect"></select>
                    <button class="page-btn" id="btnPrev" disabled>&#8592;</button>
                    <button class="page-btn" id="btnNext" disabled>&#8594;</button>
                </div>
            </div>

        </div>
    </main>
</div>

<div class="modal-overlay" id="modalOverlay">
    <div class="modal-box">
        <div class="modal-header">
            <span class="modal-title" id="modalTitle">Tambah Portofolio</span>
            <button class="modal-close" id="btnCloseModal">&times;</button>
        </div>

        <input type="hidden" id="editId" value="">

        <div class="form-group">
            <label class="form-label">Nama Kreator</label>
            <input type="text" class="form-input" id="inputNama" placeholder="Contoh: Suki Art Collection">
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-input" id="inputDesc" placeholder="Contoh: Desain grafis untuk brand baru"></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Gambar</label>
            <div id="dropzone"
                 onclick="document.getElementById('inputFile').click()"
                 style="display:flex;flex-direction:column;align-items:center;gap:6px;padding:20px;"
                 class="dropzone">
                <svg width="28" height="28" fill="none" stroke="#9CA3AF" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p style="font-size:12px;color:#9CA3AF;">Klik atau drag gambar ke sini</p>
                <p style="font-size:11px;color:#C0C5CE;">PNG, JPG, WEBP — maks 2MB</p>
            </div>

            <div id="previewWrap" style="display:none;align-items:center;gap:12px;margin-top:10px;">
                <img id="previewImg" src="" alt="preview"
                     style="width:60px;height:60px;border-radius:10px;object-fit:cover;">
                <button type="button" id="btnGanti"
                        style="font-size:12px;padding:5px 12px;border:1px solid #E5E7EB;border-radius:8px;
                               background:transparent;color:#6B7280;cursor:pointer;font-family:'Poppins',sans-serif;">
                    Ganti gambar
                </button>
            </div>

            <input type="file" id="inputFile" accept="Image/*" style="display:none">
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <div class="toggle-wrap">
                <div class="toggle on" id="toggleAktif"></div>
                <span class="toggle-label" id="toggleLabel">Aktif</span>
            </div>
        </div>

        <div class="form-footer">
            <button class="btn-submit" id="btnSimpan">Simpan</button>
            <button class="btn-cancel" id="btnBatal">Batal</button>
        </div>
    </div>
</div>

<div class="toast" id="toast"></div>

<script>
(function () {
    const PER_PAGE = 10;
    let page = 1;

    const initialStats = @json($stats);
    let deletedCount = initialStats.hapus;

    const initialData = @json($portfolios);
    let data = initialData.map(p => ({
        id: p.id,
        kode: p.kode,
        nama_kreator: p.nama_kreator,
        deskripsi: p.deskripsi || '-',
        gambar: p.gambar,
        gambar_url: p.gambar_url,
        is_aktif: p.is_aktif,
        created_at: p.created_at,
    }));

    const modal         = document.getElementById('modalOverlay');
    const modalTitle    = document.getElementById('modalTitle');
    const btnTambah     = document.getElementById('btnTambah');
    const btnClose      = document.getElementById('btnCloseModal');
    const btnBatal      = document.getElementById('btnBatal');
    const btnSimpan     = document.getElementById('btnSimpan');
    const editId        = document.getElementById('editId');
    const inputNama     = document.getElementById('inputNama');
    const inputDesc     = document.getElementById('inputDesc');
    const inputFile     = document.getElementById('inputFile');
    const previewImg    = document.getElementById('previewImg');
    const previewWrap   = document.getElementById('previewWrap');
    const dropzone      = document.getElementById('dropzone');
    const btnGanti      = document.getElementById('btnGanti');
    const tbody         = document.getElementById('tbody');
    const searchInput   = document.getElementById('searchInput');
    const statTotal     = document.getElementById('statTotal');
    const statAktif     = document.getElementById('statAktif');
    const statHapus     = document.getElementById('statHapus');
    const pgInfo        = document.getElementById('pgInfo');
    const pgTotal       = document.getElementById('pgTotal');
    const pageSelect    = document.getElementById('pageSelect');
    const btnPrev       = document.getElementById('btnPrev');
    const btnNext       = document.getElementById('btnNext');
    const toast         = document.getElementById('toast');
    const toggleAktif   = document.getElementById('toggleAktif');
    const toggleLabel   = document.getElementById('toggleLabel');

    let selectedFile = null;
    let existingImage = null;

    function getCsrfToken() {
        return document.querySelector('meta[name="csrf-token"]')?.content ?? '';
    }

    function formatDate(dateStr) {
        if (!dateStr) return '-';
        const d = new Date(dateStr);
        return d.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
    }

    const gradients = [
        'linear-gradient(135deg,#ff6ec7,#ffda00)',
        'linear-gradient(135deg,#00c8ff,#b4ff6e)',
        'linear-gradient(135deg,#a18cd1,#fbc2eb)',
        'linear-gradient(135deg,#f7971e,#ffd200)',
        'linear-gradient(135deg,#43e97b,#38f9d7)',
        'linear-gradient(135deg,#f953c6,#b91d73)',
        'linear-gradient(135deg,#4facfe,#00f2fe)',
        'linear-gradient(135deg,#fa709a,#fee140)',
    ];

    function randomGradient() {
        return gradients[Math.floor(Math.random() * gradients.length)];
    }

    function render() {
        const total = data.length;
        document.getElementById('statTotal').textContent = total;
        document.getElementById('statAktif').textContent = data.filter(d => d.is_aktif).length;
        document.getElementById('statHapus').textContent = deletedCount;

        const start = (page - 1) * PER_PAGE;
        const slice = data.slice(start, start + PER_PAGE);

        if (!slice.length) {
            tbody.innerHTML = `<tr><td colspan="7" class="empty-cell">Tidak ada data portofolio.</td></tr>`;
        } else {
            tbody.innerHTML = slice.map(row => {
                const imgHtml = row.gambar_url
                    ? `<img src="${row.gambar_url}" class="thumb-img">`
                    : `<div class="thumb-placeholder" style="background:${randomGradient()}"></div>`;
                const statusHtml = row.is_aktif
                    ? '<span style="color:#059669;font-weight:600;font-size:12px">Aktif</span>'
                    : '<span style="color:#9CA3AF;font-weight:500;font-size:12px">Nonaktif</span>';
                return `<tr>
                    <td class="font-semibold">${row.kode}</td>
                    <td>${imgHtml}</td>
                    <td>${row.nama_kreator}</td>
                    <td class="text-gray-500" style="max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">${row.deskripsi}</td>
                    <td>${statusHtml}</td>
                    <td class="text-gray-500">${formatDate(row.created_at)}</td>
                    <td>
                        <button class="btn-action btn-edit" data-id="${row.id}">Edit</button>
                        <button class="btn-action hapus ml-1" data-id="${row.id}">Hapus</button>
                    </td>
                </tr>`;
            }).join('');
        }

        const totalPages = Math.max(1, Math.ceil(data.length / PER_PAGE));
        const s = data.length ? start + 1 : 0;
        const e = Math.min(page * PER_PAGE, data.length);
        pgInfo.textContent = data.length ? `${s}–${e}` : '0';
        pgTotal.textContent = data.length;

        pageSelect.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            const opt = document.createElement('option');
            opt.value = i;
            opt.textContent = i;
            if (i === page) opt.selected = true;
            pageSelect.appendChild(opt);
        }

        btnPrev.disabled = page === 1;
        btnNext.disabled = page === totalPages;
    }

    function goToPage(p) { page = p; render(); }
    btnPrev.addEventListener('click', () => { if (page > 1) { page--; render(); } });
    btnNext.addEventListener('click', () => { if (page < Math.ceil(data.length / PER_PAGE)) { page++; render(); } });
    pageSelect.addEventListener('change', function () { goToPage(+this.value); });

    function showToast(msg, type = 'success') {
        toast.textContent = msg;
        toast.className = 'toast ' + type + ' show';
        setTimeout(() => toast.className = 'toast ' + type, 2800);
    }

    function toggleModal(show) {
        if (show) modal.classList.add('open');
        else modal.classList.remove('open');
    }

    btnTambah.addEventListener('click', () => {
        editId.value = '';
        modalTitle.textContent = 'Tambah Portofolio';
        btnSimpan.textContent = 'Simpan';
        inputNama.value = '';
        inputDesc.value = '';
        selectedFile = null;
        existingImage = null;
        previewWrap.style.display = 'none';
        dropzone.style.display = 'flex';
        previewImg.src = '';
        inputFile.value = '';
        toggleAktif.classList.add('on');
        toggleLabel.textContent = 'Aktif';
        toggleModal(true);
        setTimeout(() => inputNama.focus(), 200);
    });

    btnClose.addEventListener('click', () => toggleModal(false));
    btnBatal.addEventListener('click', () => toggleModal(false));
    modal.addEventListener('click', e => { if (e.target === modal) toggleModal(false); });

    toggleAktif.addEventListener('click', () => {
        toggleAktif.classList.toggle('on');
        toggleLabel.textContent = toggleAktif.classList.contains('on') ? 'Aktif' : 'Nonaktif';
    });

    function handleFile(file) {
        if (!file || !file.type.startsWith('Image/')) {
            showToast('File harus berupa gambar!', 'error');
            return;
        }
        if (file.size > 2 * 1024 * 1024) {
            showToast('Ukuran gambar maks 2MB!', 'error');
            return;
        }
        selectedFile = file;
        const reader = new FileReader();
        reader.onload = e => {
            previewImg.src = e.target.result;
            previewWrap.style.display = 'flex';
            dropzone.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    inputFile.addEventListener('change', () => handleFile(inputFile.files[0]));
    btnGanti.addEventListener('click', e => { e.stopPropagation(); inputFile.click(); });

    dropzone.addEventListener('dragover', e => { e.preventDefault(); dropzone.classList.add('drag'); });
    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('drag'));
    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('drag');
        handleFile(e.dataTransfer.files[0]);
    });

    async function handleSave() {
        const nama = inputNama.value.trim();
        const desc = inputDesc.value.trim();
        const isAktif = toggleAktif.classList.contains('on');
        const id = editId.value;

        if (!nama) {
            showToast('Nama kreator wajib diisi!', 'error');
            inputNama.focus();
            return;
        }

        btnSimpan.disabled = true;
        btnSimpan.textContent = 'Menyimpan...';

        try {
            const formData = new FormData();
            formData.append('nama_kreator', nama);
            formData.append('deskripsi', desc);
            formData.append('is_aktif', isAktif ? '1' : '0');
            if (selectedFile) {
                formData.append('gambar', selectedFile);
            }

            if (id) {
                formData.append('_method', 'PUT');
                const res = await fetch(`/admin/portofolio/${id}`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': getCsrfToken() },
                    body: formData,
                });
                const text = await res.text();
                if (!res.ok) {
                    let msg = 'Gagal memperbarui';
                    try { const j = JSON.parse(text); msg = j.message || j.errors?.[Object.keys(j.errors)[0]]?.[0] || msg; } catch(e) {}
                    throw new Error(msg);
                }
                const updated = JSON.parse(text);
                const idx = data.findIndex(d => d.id === updated.id);
                if (idx !== -1) {
                    data[idx] = {
                        id: updated.id,
                        kode: updated.kode,
                        nama_kreator: updated.nama_kreator,
                        deskripsi: updated.deskripsi || '-',
                        gambar: updated.gambar,
                        gambar_url: updated.gambar_url,
                        is_aktif: updated.is_aktif,
                        created_at: updated.created_at,
                    };
                }
                showToast('Portofolio berhasil diperbarui!');
            } else {
                const res = await fetch('/admin/portofolio', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': getCsrfToken() },
                    body: formData,
                });
                const text = await res.text();
                if (!res.ok) {
                    let msg = 'Gagal menyimpan';
                    try { const j = JSON.parse(text); msg = j.message || j.errors?.[Object.keys(j.errors)[0]]?.[0] || msg; } catch(e) {}
                    throw new Error(msg);
                }
                const saved = JSON.parse(text);
                data.push({
                    id: saved.id,
                    kode: saved.kode,
                    nama_kreator: saved.nama_kreator,
                    deskripsi: saved.deskripsi || '-',
                    gambar: saved.gambar,
                    gambar_url: saved.gambar_url,
                    is_aktif: saved.is_aktif,
                    created_at: saved.created_at,
                });
                page = Math.max(1, Math.ceil(data.length / PER_PAGE));
                showToast('Portofolio berhasil ditambahkan!');
            }

            toggleModal(false);
            render();
        } catch (e) {
            showToast(e.message, 'error');
        } finally {
            btnSimpan.disabled = false;
            btnSimpan.textContent = editId.value ? 'Perbarui' : 'Simpan';
        }
    }

    btnSimpan.addEventListener('click', handleSave);

    tbody.addEventListener('click', async e => {
        const btn = e.target.closest('.btn-action');
        if (!btn) return;
        const id = +btn.dataset.id;

        if (btn.classList.contains('hapus')) {
            if (!confirm('Hapus portofolio ini?')) return;
            try {
                const res = await fetch(`/admin/portofolio/${id}`, {
                    method: 'DELETE',
                    headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': getCsrfToken() },
                    credentials: 'same-origin',
                });
                if (!res.ok) throw new Error('Gagal menghapus');
                data = data.filter(d => d.id !== id);
                deletedCount++;
                const tp = Math.max(1, Math.ceil(data.length / PER_PAGE));
                if (page > tp) page = tp;
                render();
                showToast('Portofolio dihapus.', 'error');
            } catch (e) {
                showToast('Gagal menghapus portofolio!', 'error');
            }
            return;
        }

        if (btn.classList.contains('btn-edit')) {
            const row = data.find(d => d.id === id);
            if (!row) return;
            editId.value = row.id;
            modalTitle.textContent = 'Edit Portofolio';
            btnSimpan.textContent = 'Perbarui';
            inputNama.value = row.nama_kreator;
            inputDesc.value = row.deskripsi === '-' ? '' : row.deskripsi;
            selectedFile = null;
            existingImage = row.gambar_url;

            if (row.gambar_url) {
                previewImg.src = row.gambar_url;
                previewWrap.style.display = 'flex';
                dropzone.style.display = 'none';
            } else {
                previewWrap.style.display = 'none';
                dropzone.style.display = 'flex';
            }

            if (row.is_aktif) {
                toggleAktif.classList.add('on');
                toggleLabel.textContent = 'Aktif';
            } else {
                toggleAktif.classList.remove('on');
                toggleLabel.textContent = 'Nonaktif';
            }

            toggleModal(true);
            setTimeout(() => inputNama.focus(), 200);
        }
    });

    searchInput.addEventListener('input', function () {
        const q = this.value.toLowerCase();
        tbody.querySelectorAll('tr').forEach(tr => {
            tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });

    render();
})();
</script>

</body>
</html>
