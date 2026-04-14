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

    body {
        display: flex;
        background: #f1f5f9;
    }

    /* Sidebar */
    .sidebar {
        width: 230px;
        height: 100vh;
        background: #1e3a8a;
        color: white;
        padding: 20px;
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
    }

    .menu a:hover {
        background: #3b82f6;
    }

    .menu .active {
        background: #3b82f6;
    }

    .icon {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    /* Main */
    .main {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* Topbar */
    .topbar {
        background: white;
        padding: 15px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
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

    /* Content */
    .content {
        padding: 30px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .menu-title {
    margin: 20px 10px 10px;
    font-size: 13px;
    color: #c7d2fe;
}

.menu a {
    justify-content: space-between;
}

.menu a span.arrow {
    margin-left: auto;
    font-size: 16px;
}
</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Menu</h2>

    <div class="menu">

        <!-- Dashboard -->
        <a href="" class="">
                <path d="M3 13h8V3H3v10z"/>
            </svg>
            Dashboard
        </a>

        <!-- Section -->
        <p class="menu-title">Items Data</p>

        <a href="">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/>
            </svg>
            Categories
        </a>

        <a href="">
                <path d="M12 2l9 4-9 4-9-4z"/>
            </svg>
            Items
        </a>

        <!-- Section -->
        <p class="menu-title">Accounts</p>

        <a href="">
                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5"/>
            </svg>
            Users
            <span class="arrow">›</span>
        </a>

    </div>
</div>

<!-- Main -->
<div class="main">

    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-left">
            <!-- GANTI GAMBAR DI SINI -->
            <img src="" alt="logo">
            <h1>Dashboard Admin</h1>
        </div>

        <a href="" class="logout-btn">Logout</a>
    </div>

<div class="content">
    @yield('content')
</div>
</div>

</body>
</html>