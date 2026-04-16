@extends('layouts.admin')

@section('content')

<style>
:root {
    --card: #ffffff;
    --bg: #f6f7fb;
    --border: #e5e7eb;
    --text: #111827;
    --muted: #6b7280;
}

/* DARK MODE */
body[data-theme="dark"] {
    --card: #1f2937;
    --bg: #111827;
    --border: #374151;
    --text: #f9fafb;
    --muted: #9ca3af;
}

body {
    background: var(--bg);
    color: var(--text);
    font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
}

/* HEADER */
.dashboard-title {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
}

/* GRID */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
    gap: 16px;
}

/* CARD */
.card {
    background: var(--card);
    padding: 18px;
    border-radius: 16px;
    border: 1px solid var(--border);
    transition: 0.25s ease;
    position: relative;
    overflow: hidden;
}

/* subtle glow accent */
.card::before {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: rgba(99,102,241,0.15);
    top: -40px;
    right: -40px;
    border-radius: 50%;
    filter: blur(10px);
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.08);
}

/* TEXT */
.card-title {
    font-size: 13px;
    color: var(--muted);
}

.card .value {
    font-size: 26px;
    font-weight: 700;
    margin-top: 8px;
}

/* ACCENT BAR */
.card {
    border-left: 5px solid transparent;
}

.card.blue { border-left-color: #3b82f6; }
.card.green { border-left-color: #10b981; }
.card.yellow { border-left-color: #f59e0b; }
.card.red { border-left-color: #ef4444; }
.card.purple { border-left-color: #8b5cf6; }

/* SECTION TITLE */
.section-title {
    margin-top: 32px;
    font-size: 18px;
    font-weight: 600;
}

/* TABLE WRAPPER */
.table {
    width: 100%;
    margin-top: 14px;
    border-collapse: collapse;
    background: var(--card);
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid var(--border);
}

/* HEADER */
.table th {
    background: rgba(99,102,241,0.08);
    padding: 14px;
    text-align: left;
    font-size: 13px;
    color: var(--muted);
}

/* ROW */
.table td {
    padding: 14px;
    font-size: 13px;
    border-top: 1px solid var(--border);
}

/* HOVER ROW */
.table tr:hover {
    background: rgba(99,102,241,0.05);
}

/* smooth feel */
.table tr {
    transition: 0.2s;
}
</style>

<h2 class="dashboard-title">Admin Dashboard</h2>

<!-- STATS -->
<div class="dashboard-grid">

    <div class="card blue">
        <div class="card-title">Total Items</div>
        <div class="value">{{ $totalItems }}</div>
    </div>

    <div class="card purple">
        <div class="card-title">Categories</div>
        <div class="value">{{ $totalCategories }}</div>
    </div>

    <div class="card yellow">
        <div class="card-title">Active Lending</div>
        <div class="value">{{ $totalLending }}</div>
    </div>

    <div class="card green">
        <div class="card-title">Returned</div>
        <div class="value">{{ $totalReturned }}</div>
    </div>

    <div class="card red">
        <div class="card-title">Lost Items</div>
        <div class="value">{{ $totalLost }}</div>
    </div>

    <div class="card red">
        <div class="card-title">Damaged Items</div>
        <div class="value">{{ $totalDamaged }}</div>
    </div>

</div>

<!-- TABLE -->
<h3 class="section-title">Latest Lending</h3>

<table class="table">
    <thead>
        <tr>
            <th>Item</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @foreach($latestLending as $lend)
        <tr>
            <td>{{ $lend->item->name }}</td>
            <td>{{ $lend->name }}</td>
            <td>{{ $lend->quantity }}</td>
            <td>{{ \Carbon\Carbon::parse($lend->borrowed_at)->format('d M Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection