<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory System</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }

        /* Navbar */
        nav {
            background: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-left img {
            width: 40px;
        }

        .nav-left span {
            font-weight: 600;
            font-size: 18px;
        }

        .btn-login {
            background: #3b82f6;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #2563eb;
        }

        /* Content */
        section {
            text-align: center;
            margin-top: 60px;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
        }

        .subtitle {
            color: #6b7280;
            margin-top: 8px;
        }

        /* Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 50px;
            padding: 0 40px;
        }

        /* Card */
        .card {
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        .card img {
            width: 90px;
            margin-bottom: 15px;
        }

        .card p {
            margin-top: 10px;
            font-weight: 500;
        }

        /* Colors */
        .blue { background: #0B0F3B; color: white; }
        .yellow { background: #facc15; color: black; }
        .purple { background: #d8b4fe; color: black; }
        .green { background: #4ade80; color: black; }

        /* Responsive */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="nav-left">
            <img src="" alt="">
            <span>Inventory</span>
        </div>

        <a href="" class="btn-login">Login</a>
    </nav>

    <!-- Content -->
    <section>
        <h1>Our system flow</h1>
        <p class="subtitle">Our inventory system workflow</p>

        <div class="grid">

            <div class="card blue">
                <img src="">
                <p>Items Data</p>
            </div>

            <div class="card yellow">
                <img src="">
                <p>Management Technician</p>
            </div>

            <div class="card purple">
                <img src="">
                <p>Managed Lending</p>
            </div>

            <div class="card green">
                <img src="">
                <p>All Can Borrow</p>
            </div>

        </div>
    </section>

</body>
</html>