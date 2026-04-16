<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Inventory System</title>

<style>
    :root {
        --bg: linear-gradient(135deg, #0f172a, #1e293b);
        --text: white;
        --card: rgba(255,255,255,0.05);
        --nav: rgba(255,255,255,0.05);
        --border: rgba(255,255,255,0.1);
    }

    body.light {
        --bg: #f8fafc;
        --text: #0f172a;
        --card: rgba(255,255,255,0.8);
        --nav: rgba(255,255,255,0.7);
        --border: rgba(0,0,0,0.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', sans-serif;
        transition: 0.3s;
    }

    body {
        background: var(--bg);
        color: var(--text);
    }

    /* Navbar */
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 60px;
        backdrop-filter: blur(10px);
        background: var(--nav);
        border-bottom: 1px solid var(--border);
    }

    .nav-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-left img {
        width: 40px;
    }

    .nav-left span {
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .nav-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    /* Toggle Button */
    .toggle {
        cursor: pointer;
        font-size: 20px;
    }

    .btn-login {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        color: white;
        font-weight: 500;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(59,130,246,0.4);
    }

    /* Hero */
    section {
        text-align: center;
        margin-top: 80px;
    }

    h1 {
        font-size: 40px;
        font-weight: 700;
        background: linear-gradient(90deg, #60a5fa, #a78bfa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .subtitle {
        color: #94a3b8;
        margin-top: 10px;
    }

    body.light .subtitle {
        color: #475569;
    }

    /* Grid */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 30px;
        padding: 60px;
    }

    /* Card */
    .card {
        padding: 30px;
        border-radius: 16px;
        backdrop-filter: blur(15px);
        background: var(--card);
        border: 1px solid var(--border);
        cursor: pointer;
    }

    .card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
    }

    body.light .card:hover {
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .card-icon {
        font-size: 40px;
        margin-bottom: 15px;
    }

    .card p {
        font-size: 18px;
        font-weight: 500;
    }

    /* Glow */
    .blue:hover { box-shadow: 0 0 25px #3b82f6; }
    .yellow:hover { box-shadow: 0 0 25px #facc15; }
    .purple:hover { box-shadow: 0 0 25px #a78bfa; }
    .green:hover { box-shadow: 0 0 25px #4ade80; }

</style>
</head>
<body>

<nav>
    <div class="nav-left">
        <img src="images/wikrama-logo.png">
        <span>Inventory System</span>
    </div>

    <div class="nav-right">
        <div class="toggle" onclick="toggleTheme()">🌙</div>
        <a href="/login" class="btn-login">Login</a>
    </div>
</nav>

<section>
    <h1>Manajemen Peminjaman</h1>
    <p class="subtitle">Sistem Inventaris Modern & Terintegrasi</p>

    <div class="grid">
        <div class="card blue">
            <div class="card-icon">📦</div>
            <p>Items Data</p>
        </div>

        <div class="card yellow">
            <div class="card-icon">🛠️</div>
            <p>Technician Management</p>
        </div>

        <div class="card purple">
            <div class="card-icon">📊</div>
            <p>Lending Management</p>
        </div>

        <div class="card green">
            <div class="card-icon">👥</div>
            <p>Borrow Access</p>
        </div>
    </div>
</section>

<script>
function toggleTheme() {
    document.body.classList.toggle('light');

    if (document.body.classList.contains('light')) {
        localStorage.setItem('theme', 'light');
    } else {
        localStorage.setItem('theme', 'dark');
    }
}

// load theme
if (localStorage.getItem('theme') === 'light') {
    document.body.classList.add('light');
}
</script>

</body>
</html>