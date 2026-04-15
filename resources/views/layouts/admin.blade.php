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
        font-family: Arial, sans-serif;
    }

    /* BODY LOCK SCROLL */
    body {
        height: 100vh;
        overflow: hidden;
        background: #f1f5f9;
        display: flex;
    }

    /* SIDEBAR */
    .sidebar {
        width: 230px;
        height: 100vh;
        background: #1e3a8a;
        color: white;
        padding: 20px;
        position: fixed;
        left: 0;
        top: 0;
    }

    .sidebar h2 {
        margin-bottom: 30px;
        font-size: 18px;
    }

    .menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 10px;
        transition: 0.2s;
        justify-content: space-between;
    }

    .menu a:hover {
        background: #3b82f6;
    }

    .menu .active {
        background: #3b82f6;
    }

    .menu-title {
        margin: 20px 10px 10px;
        font-size: 13px;
        color: #c7d2fe;
    }

    .icon {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    .menu a span.arrow {
        margin-left: auto;
        font-size: 16px;
    }

    /* MAIN WRAPPER */
    .main {
        margin-left: 230px;
        flex: 1;
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow: hidden;
    }

    /* TOPBAR */
    .topbar {
        background: white;
        padding: 15px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        flex-shrink: 0;
    }

    .topbar-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .topbar-left img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }

    .topbar h1 {
        font-size: 18px;
    }

    .logout-btn {
        text-decoration: none;
        background: #ef4444;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        transition: 0.3s;
    }

    .logout-btn:hover {
        background: #dc2626;
    }

    /* CONTENT SCROLL AREA */
    .content {
        padding: 30px;
        overflow-y: auto;
        flex: 1;
    }

    /* CARD */
    .card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    /* SCROLLBAR (optional biar lebih clean) */
    .content::-webkit-scrollbar {
        width: 6px;
    }

    .content::-webkit-scrollbar-thumb {
        background: #94a3b8;
        border-radius: 10px;
    }
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Menu</h2>

    <div class="menu">

        <a href="/admin/dashboard">
            Dashboard
        </a>

        <p class="menu-title">Items Data</p>

        <a href="/admin/categories">
            Categories
        </a>

        <a href="/admin/items">
            Items
        </a>

        <p class="menu-title">Accounts</p>

        <a href="/admin/users">
            Users
            <span class="arrow">›</span>
        </a>

    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-left">
            <img src="/images/wikrama-logo.png" alt="logo">
            <h1>Dashboard Admin</h1>
        </div>

        <a href="/login" class="logout-btn">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>