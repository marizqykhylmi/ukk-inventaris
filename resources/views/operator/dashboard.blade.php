@extends('layouts.operator')

@section('title', 'Dashboard Operator')

@section('content')

<style>
/* HERO */
.hero {
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: white;
    padding: 18px;
    border-radius: 16px;
    margin-bottom: 16px;
}

.hero h2 {
    font-size: 18px;
}

.hero p {
    font-size: 13px;
    opacity: 0.7;
    margin-top: 4px;
}

/* METRICS */
.metrics {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 12px;
    margin-bottom: 16px;
}

.metric {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 14px;
    position: relative;
    overflow: hidden;
}

.metric::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: #3b82f6;
}

.metric.green::before { background: #10b981; }
.metric.red::before { background: #ef4444; }

.metric-title {
    font-size: 12px;
    color: var(--muted);
}

.metric-value {
    font-size: 22px;
    font-weight: 700;
    margin-top: 6px;
}

/* TABLE WRAPPER */
.table-box {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
}

/* HEADER */
.table-header {
    padding: 14px;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-header strong {
    font-size: 14px;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    text-align: left;
    font-size: 12px;
    padding: 12px;
    color: var(--muted);
    background: var(--bg);
}

td {
    padding: 12px;
    font-size: 13px;
    border-top: 1px solid var(--border);
}

/* ROW HOVER */
tr:hover {
    background: rgba(0,0,0,0.03);
}

body[data-theme="dark"] tr:hover {
    background: rgba(255,255,255,0.05);
}

/* STATUS */
.badge {
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 600;
}

.ok {
    background: rgba(16,185,129,0.15);
    color: #10b981;
}

.wait {
    background: rgba(239,68,68,0.15);
    color: #ef4444;
}
</style>

<!-- HERO -->
<div class="hero">
    <h2>👋 Operator Dashboard</h2>
    <p>Realtime monitoring sistem peminjaman barang & inventory</p>
</div>

<!-- METRICS -->
<div class="metrics">

    <div class="metric">
        <div class="metric-title">Total Items</div>
        <div class="metric-value">{{ $totalItems }}</div>
    </div>

    <div class="metric green">
        <div class="metric-title">Active Lending</div>
        <div class="metric-value">{{ $activeLending }}</div>
    </div>

    <div class="metric red">
        <div class="metric-title">Returned</div>
        <div class="metric-value">{{ $returnedLending }}</div>
    </div>

</div>

<!-- TABLE -->
<div class="table-box">

    <div class="table-header">
        <strong>📋 Latest Lending Activity</strong>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
        @forelse($latestLending as $lend)
            <tr>
                <td>{{ $lend->item->name ?? '-' }}</td>
                <td>{{ $lend->name }}</td>
                <td>{{ $lend->quantity }}</td>
                <td>
                    @if($lend->returned_at)
                        <span class="badge ok">Returned</span>
                    @else
                        <span class="badge wait">Active</span>
                    @endif
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($lend->borrowed_at)->format('d M Y H:i') }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:16px; color:var(--muted);">
                    No activity found
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

@endsection