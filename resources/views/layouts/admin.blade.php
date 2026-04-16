<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

/* THEME */
:root {
    --bg: #ffffff;
    --card: #ffffff;
    --text: #0f172a;
    --sidebar: #f1f5f9;
    --sidebar-text: #334155;
    --border: #e2e8f0;
}

body[data-theme="dark"] {
    --bg: #0f172a;
    --card: #1e293b;
    --text: #e2e8f0;
    --sidebar: #020617;
    --sidebar-text: #94a3b8;
    --border: #334155;
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
    padding: 30px 18px;
    position: fixed;
    border-right: 1px solid var(--border);
}

.sidebar h2 {
    margin-bottom: 25px;
    font-size: 20px;
    font-weight: 700;
    padding-left: 10px;
}

.menu {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.menu a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--sidebar-text);
    text-decoration: none;
    padding: 12px 14px;
    border-radius: 12px;
    transition: all 0.2s ease;
    font-weight: 500;
}

/* LIGHT HOVER */
.menu a:hover {
    background: rgba(0, 0, 0, 0.06);
    transform: translateX(4px);
}

/* DARK HOVER */
body[data-theme="dark"] .menu a:hover {
    background: rgba(255, 255, 255, 0.08);
}

/* ACTIVE */
.menu a.active {
    background: #3b82f6;
    color: white;
    box-shadow: 0 6px 15px rgba(59, 130, 246, 0.25);
}

.menu a.active:hover {
    transform: translateX(0);
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
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
}

.topbar-title {
    font-size: 18px;
    font-weight: 600;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 14px;
}

/* THEME BUTTON */
.theme-btn {
    width: 36px;
    height: 36px;
    border: none;
    border-radius: 10px;
    background: var(--border);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: .2s;
}

.theme-btn:hover {
    transform: scale(1.05);
}

/* PROFILE */
.profile {
    position: relative;
    display: flex;
    align-items: center;
}

.profile-img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 2px solid var(--border);
    object-fit: cover;
    cursor: pointer;
}

/* DROPDOWN */
.dropdown {
    position: absolute;
    right: 0;
    top: 50px;
    background: var(--card);
    width: 230px;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    display: none;
    z-index: 100;
}

.dropdown-header {
    text-align: center;
    margin-bottom: 10px;
}

.dropdown-header img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 6px;
}

.dropdown-header strong {
    display: block;
    font-size: 14px;
}

.dropdown-header span {
    font-size: 12px;
    color: gray;
}

.dropdown a {
    display: block;
    padding: 10px;
    border-radius: 8px;
    text-decoration: none;
    color: var(--text);
}

.dropdown a:hover {
    background: var(--border);
}

.show {
    display: block;
}

/* CONTENT */
.content {
    padding: 25px;
    flex: 1;
    overflow-y: auto;
}

.logout-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    transition: 0.2s;
    text-align: left;
}

.logout-btn:hover {
    background: #ef4444;
    color: white;
}
</style>
</head>

<body id="body">

@php
    $user = auth()->user();
@endphp

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Inventory</h2>

    <div class="menu">
        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="/admin/categories" class="{{ request()->is('admin/categories*') ? 'active' : '' }}">Categories</a>
        <a href="/admin/items" class="{{ request()->is('admin/items*') ? 'active' : '' }}">Items</a>
        <a href="/admin/users" class="{{ request()->is('admin/users*') ? 'active' : '' }}">Users</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="topbar-title">
            Dashboard Admin
        </div>

        <div class="topbar-right">

            <button class="theme-btn" onclick="toggleTheme()">🌙</button>

            <div class="profile" onclick="toggleDropdown()">

                <img 
                    class="profile-img"
                    src="{{ $user->profile_photo 
                        ? asset('storage/' . $user->profile_photo) . '?v=' . time()
                        : asset('images/user.png') }}"
                >

                <div class="dropdown" id="dropdown">

                    <div class="dropdown-header">

                        <img 
                            src="{{ $user->profile_photo 
                                ? asset('storage/' . $user->profile_photo) . '?v=' . time()
                                : asset('images/user.png') }}"
                        >

                        <strong>{{ $user->name }}</strong>
                        <span>{{ $user->email }}</span>
                    </div>

                    <a href="/admin/profile">👤 Profile</a>
                    <form action="/logout" method="POST" style="margin-top:10px;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            🚪 Logout
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

<script>
function toggleDropdown() {
    document.getElementById("dropdown").classList.toggle("show");
}

window.onclick = function(e) {
    if (!e.target.closest('.profile')) {
        document.getElementById("dropdown").classList.remove("show");
    }
}

function toggleTheme() {
    let body = document.getElementById("body");

    if (body.getAttribute("data-theme") === "dark") {
        body.removeAttribute("data-theme");
        localStorage.setItem("theme", "light");
    } else {
        body.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
    }
}

window.onload = function() {
    let saved = localStorage.getItem("theme");
    if (saved === "dark") {
        document.getElementById("body").setAttribute("data-theme", "dark");
    }
}
</script>

</body>
</html>