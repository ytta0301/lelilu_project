<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>LeLiLu – Dashboard Worker</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --yellow: #F5C518;
    --dark:   #1C1C1E;
    --sidebar-bg: #222224;
    --bg: #F4F3EF;
    --card-bg: #FFFFFF;
    --text: #1C1C1E;
    --muted: #9B9B9B;
    --radius: 16px;
    --shadow: 0 2px 12px rgba(0,0,0,.07);
  }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    min-height: 100vh;
  }

  

  /* ── MAIN ── */
  .main {
    flex: 1;
    padding: 36px 36px 36px 36px;
    overflow-x: hidden;
  }

  .greeting {
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 28px;
    letter-spacing: -0.5px;
  }

  /* ── STAT CARDS ── */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
  }
  .stat-card {
    background: var(--card-bg);
    border-radius: var(--radius);
    padding: 24px 20px;
    box-shadow: var(--shadow);
  }
  .stat-card .number {
    font-size: 36px;
    font-weight: 800;
    line-height: 1;
    letter-spacing: -1px;
  }
  .stat-card .label {
    font-size: 12.5px;
    color: var(--muted);
    margin-top: 6px;
    font-weight: 500;
  }

  /* ── BOTTOM GRID ── */
  .bottom-grid {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 16px;
  }

  /* left col stacks chart + pies */
  .left-col { display: flex; flex-direction: column; gap: 16px; }

  /* ── CHART CARD ── */
  .chart-card {
    background: var(--card-bg);
    border-radius: var(--radius);
    padding: 22px 24px;
    box-shadow: var(--shadow);
  }
  .chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
  }
  .chart-header .title { font-weight: 700; font-size: 15px; }
  .chart-header .filter {
    font-size: 12.5px;
    color: var(--muted);
    cursor: pointer;
    display: flex; align-items: center; gap: 4px;
  }
  .chart-wrapper { position: relative; height: 200px; }

  /* ── PIE ROW ── */
  .pie-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  .pie-card {
    background: var(--card-bg);
    border-radius: var(--radius);
    padding: 22px 20px;
    box-shadow: var(--shadow);
    display: flex; flex-direction: column; align-items: center;
  }
  .pie-wrapper { width: 130px; height: 130px; position: relative; margin-bottom: 14px; }
  .pie-label { font-size: 13px; color: var(--text); font-weight: 600; text-align: center; }
  .pie-sub {
    font-size: 12px;
    font-weight: 700;
    margin-top: 4px;
    display: flex; align-items: center; gap: 4px;
  }
  .pie-sub.down { color: #E74C3C; }
  .pie-sub.up   { color: #27AE60; }

  /* ── TEAM CARD ── */
  .team-card {
    background: var(--card-bg);
    border-radius: var(--radius);
    padding: 22px 22px;
    box-shadow: var(--shadow);
  }
  .team-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
  }
  .team-header .title { font-weight: 800; font-size: 15px; }
  .team-header .view-all { font-size: 12.5px; color: var(--yellow); font-weight: 700; cursor: pointer; }

  .team-col-label {
    font-size: 11.5px;
    color: var(--muted);
    font-weight: 600;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .member {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 13px 0;
    border-bottom: 1px solid #F0F0EE;
  }
  .member:last-child { border-bottom: none; }
  .member-name { font-size: 14px; font-weight: 700; }
  .member-time { font-size: 12px; color: var(--muted); font-weight: 500; }

  /* entrance animations */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .stat-card   { animation: fadeUp .4s ease both; }
  .stat-card:nth-child(1) { animation-delay: .05s; }
  .stat-card:nth-child(2) { animation-delay: .10s; }
  .stat-card:nth-child(3) { animation-delay: .15s; }
  .stat-card:nth-child(4) { animation-delay: .20s; }
  .chart-card  { animation: fadeUp .5s ease .25s both; }
  .pie-card    { animation: fadeUp .5s ease .30s both; }
  .team-card   { animation: fadeUp .5s ease .20s both; }
</style>
</head>
<body>

<!-- jmbt -->
@include('layout.sidebar')
<!-- MAIN -->
<main class="main">
  <h1 class="greeting">Selamat datang "Fachri"</h1>

  <!-- STATS -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="number">100</div>
      <div class="label">Total pesanan</div>
    </div>
    <div class="stat-card">
      <div class="number">15</div>
      <div class="label">Pesanan pending</div>
    </div>
    <div class="stat-card">
      <div class="number">100</div>
      <div class="label">Total selesai</div>
    </div>
    <div class="stat-card">
      <div class="number">15</div>
      <div class="label">Pesanan batal</div>
    </div>
  </div>

  <!-- BOTTOM -->
  <div class="bottom-grid">
    <div class="left-col">

      <!-- BAR CHART -->
      <div class="chart-card">
        <div class="chart-header">
          <span class="title">Conversions</span>
          <span class="filter">This Week &#8964;</span>
        </div>
        <div class="chart-wrapper">
          <canvas id="barChart"></canvas>
        </div>
      </div>

      <!-- PIE ROW -->
      <div class="pie-row">
        <div class="pie-card">
          <div class="pie-wrapper"><canvas id="pie1"></canvas></div>
          <div class="pie-label">Pesanan akhir-akhir ini</div>
          <div class="pie-sub down">67% dari bulan lalu ↓</div>
        </div>
        <div class="pie-card">
          <div class="pie-wrapper"><canvas id="pie2"></canvas></div>
          <div class="pie-label">Pesanan bulan-bulan ini</div>
          <div class="pie-sub up">67% dari bulan lalu ↑</div>
        </div>
      </div>

    </div>

    <!-- TEAM CARD -->
    <div class="team-card">
      <div class="team-header">
        <span class="title">Team activity</span>
        <span class="view-all">View All</span>
      </div>
      <div class="team-col-label">Name</div>
      <div class="member"><span class="member-name">Esther Eden</span><span class="member-time">3m</span></div>
      <div class="member"><span class="member-name">Ajmal Abdul Rahiman</span><span class="member-time">12m</span></div>
      <div class="member"><span class="member-name">Ahlam Alshamsi</span><span class="member-time">48m</span></div>
      <div class="member"><span class="member-name">Ben Bruce</span><span class="member-time">2h</span></div>
      <div class="member"><span class="member-name">Wim Jozef Madeleine</span><span class="member-time">5h</span></div>
      <div class="member"><span class="member-name">Shilpa Ananth</span><span class="member-time">12h</span></div>
    </div>
  </div>
</main>

<script>
/* ── BAR CHART ── */
const barCtx = document.getElementById('barChart').getContext('2d');
const labels = ['S','M','T','W','T','F','S','M','T','W'];
const darkData  = [42,62,55,60,50,80,35,45,62,50];
const yellowData= [28,40,25,45,30,45,15,35,20,30];

new Chart(barCtx, {
  type: 'bar',
  data: {
    labels,
    datasets: [
      {
        label: 'Dark',
        data: darkData,
        backgroundColor: '#2C2C2E',
        borderRadius: 4,
        barPercentage: 0.55,
        categoryPercentage: 0.7,
        order: 2,
      },
      {
        label: 'Yellow',
        data: yellowData,
        backgroundColor: '#F5C518',
        borderRadius: 4,
        barPercentage: 0.55,
        categoryPercentage: 0.7,
        order: 1,
      }
    ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: { legend: { display: false }, tooltip: { mode: 'index' } },
    scales: {
      x: { stacked: false, grid: { display: false }, border: { display: false },
           ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#9B9B9B' } },
      y: { stacked: false, grid: { color: '#EBEBEB', drawBorder: false },
           border: { display: false },
           ticks: { font: { family: 'Plus Jakarta Sans', size: 11 }, color: '#9B9B9B',
                    stepSize: 40, max: 160 } }
    }
  }
});

/* ── PIE CHARTS ── */
const pieColors = ['#E8563A','#2C6E7F','#E6B84A','#3A6B4A','#C44B2F'];

function makePie(id) {
  const ctx = document.getElementById(id).getContext('2d');
  new Chart(ctx, {
    type: 'pie',
    data: {
      datasets: [{
        data: [30, 25, 20, 15, 10],
        backgroundColor: pieColors,
        borderWidth: 2,
        borderColor: '#fff',
        hoverOffset: 6,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: { legend: { display: false }, tooltip: { enabled: true } },
      animation: { animateRotate: true, duration: 900 }
    }
  });
}

makePie('pie1');
makePie('pie2');
</script>
</body>
</html>