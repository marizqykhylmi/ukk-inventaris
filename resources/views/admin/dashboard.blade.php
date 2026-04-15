@extends('layouts.admin')

@section('content')

<style>
.dashboard-title {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 20px;
}

/* GRID CARDS */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
}

/* CARD */
.card {
    background: white;
    padding: 18px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    transition: 0.2s;
    font-size: 14px;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* COLOR ACCENT */
.card.blue { border-left: 4px solid #3b82f6; }
.card.green { border-left: 4px solid #10b981; }
.card.yellow { border-left: 4px solid #f59e0b; }
.card.red { border-left: 4px solid #ef4444; }
.card.purple { border-left: 4px solid #8b5cf6; }

/* VALUE */
.card .value {
    font-size: 22px;
    font-weight: bold;
    margin-top: 8px;
}

/* SECTION TITLE */
.section-title {
    margin-top: 30px;
    font-size: 18px;
    font-weight: 600;
}

/* TABLE */
.table {
    width: 100%;
    margin-top: 15px;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.05);
}

.table th {
    background: #f3f4f6;
    padding: 12px;
    text-align: left;
    font-size: 13px;
}

.table td {
    padding: 12px;
    border-top: 1px solid #eee;
    font-size: 13px;
}
</style>

<h2 class="dashboard-title">Admin Dashboard</h2>

<!-- STATS -->
<div class="dashboard-grid">

    <div class="card blue">
        Total Items
        <div class="value">{{ $totalItems }}</div>
    </div>

    <div class="card purple">
        Categories
        <div class="value">{{ $totalCategories }}</div>
    </div>

    <div class="card yellow">
        Active Lending
        <div class="value">{{ $totalLending }}</div>
    </div>

    <div class="card green">
        Returned
        <div class="value">{{ $totalReturned }}</div>
    </div>

    <div class="card red">
        Lost Items
        <div class="value">{{ $totalLost }}</div>
    </div>

    <div class="card red">
        Damaged Items
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