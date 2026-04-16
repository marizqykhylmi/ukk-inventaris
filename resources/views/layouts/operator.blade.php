<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard Operator</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

/* THEME BASE */
:root {
    --bg: #f8fafc;
    --card: #ffffff;
    --text: #0f172a;
    --muted: #64748b;
    --border: #e2e8f0;

    --sidebar: #0f172a;
    --sidebar-text: #cbd5e1;
}

/* BODY */
body {
    height: 100vh;
    background: var(--bg);
    color: var(--text);
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    height: 100vh;
    background: var(--sidebar);
    padding: 22px;
    position: fixed;
    left: 0;
    top: 0;
}

/* BRAND */
.sidebar h2 {
    font-size: 18px;
    color: white;
    margin-bottom: 25px;
    padding-left: 6px;
}

/* MENU */
.menu {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.menu a {
    color: var(--sidebar-text);
    text-decoration: none;
    padding: 11px 12px;
    border-radius: 10px;
    font-size: 14px;
    transition: 0.2s;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* HOVER */
.menu a:hover {
    background: rgba(255,255,255,0.06);
    color: white;
    transform: translateX(3px);
}

/* ACTIVE */
.menu a.active {
    background: #3b82f6;
    color: white;
}

/* MAIN */
.main {
    margin-left: 240px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* TOPBAR */
.topbar {
    background: var(--card);
    border-bottom: 1px solid var(--border);
    padding: 14px 22px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* LEFT TOPBAR */
.topbar-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.topbar-left img {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    object-fit: cover;
}

/* TITLE */
.topbar h1 {
    font-size: 16px;
    font-weight: 600;
}

/* LOGOUT */
.logout-btn {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    padding: 8px 12px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: 0.2s;
}

.logout-btn:hover {
    background: #ef4444;
    color: white;
}

/* CONTENT */
.content {
    padding: 24px;
    overflow-y: auto;
    height: calc(100vh - 60px);
}

/* CARD */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 18px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.03);
}

/* SCROLLBAR */
.content::-webkit-scrollbar {
    width: 6px;
}

.content::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.logout-form {
    margin-left: auto;
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 8px 12px;
    border-radius: 10px;

    border: 1px solid var(--border);
    background: var(--card);
    color: #ef4444;

    font-size: 13px;
    font-weight: 600;

    cursor: pointer;
    transition: 0.2s;
}

.logout-btn:hover {
    background: #ef4444;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(239,68,68,0.25);
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Operator</h2>

    <div class="menu">
        <a href="/operator/dashboard" class="{{ request()->is('operator/dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/operator/items" class="{{ request()->is('operator/items*') ? 'active' : '' }}">
            Items
        </a>

        <a href="/operator/lending" class="{{ request()->is('operator/lending*') ? 'active' : '' }}">
            Lending
        </a>

        <a href="/operator/profile" class="{{ request()->is('operator/profile*') ? 'active' : '' }}">
            Profile
        </a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="topbar-left">
            <img src="/images/wikrama-logo.png" alt="logo">
            <h1>Operator Panel</h1>
        </div>

        <!-- IMPORTANT: logout harus POST -->
        <form action="/logout" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                <span>Logout</span>
                <span>↗</span>
            </button>
        </form>

    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>