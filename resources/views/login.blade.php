<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Inventory</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

/* BACKGROUND */
body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    overflow: hidden;
}

/* FLOATING BLUR SHAPES */
body::before,
body::after {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.4;
    z-index: 0;
}

body::before {
    background: #3b82f6;
    top: -100px;
    left: -100px;
}

body::after {
    background: #10b981;
    bottom: -100px;
    right: -100px;
}

/* CARD */
.login-container {
    position: relative;
    z-index: 1;
    width: 380px;
    padding: 30px;
    border-radius: 16px;

    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    color: white;
}

/* TITLE */
.login-container h2 {
    font-size: 22px;
    margin-bottom: 6px;
}

.login-container p {
    font-size: 13px;
    opacity: 0.7;
    margin-bottom: 20px;
}

/* INPUT GROUP */
.input-group {
    margin-bottom: 14px;
}

.input-group label {
    font-size: 12px;
    display: block;
    margin-bottom: 6px;
    opacity: 0.8;
}

/* INPUT */
.input-group input {
    width: 100%;
    padding: 11px 12px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.15);
    background: rgba(255,255,255,0.05);
    color: white;
    outline: none;
    transition: 0.2s;
}

/* FOCUS */
.input-group input:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.25);
}

/* BUTTON */
.btn-login {
    width: 100%;
    padding: 11px;
    border: none;
    border-radius: 10px;
    margin-top: 8px;

    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    font-weight: 600;
    cursor: pointer;

    transition: 0.2s;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(59,130,246,0.25);
}

/* ERROR */
.error {
    margin-top: 12px;
    font-size: 13px;
    color: #f87171;
    text-align: center;
}

/* SMALL FOOTER TEXT */
.small-text {
    margin-top: 12px;
    font-size: 11px;
    opacity: 0.5;
    text-align: center;
}
</style>

</head>

<body>

<div class="login-container">

    <h2>Welcome Back</h2>
    <p>Login to your Inventory System</p>

    <form method="POST" action="/login">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="you@example.com" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn-login">
            Sign In
        </button>

        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
    </form>

    <div class="small-text">
        Inventory System © {{ date('Y') }}
    </div>

</div>

</body>
</html>