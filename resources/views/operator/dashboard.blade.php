@extends('layouts.operator')

@section('title', 'Dashboard Operator')

@section('content')

<style>
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 25px;
}

.card-box {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    transition: 0.2s;
}

.card-box:hover {
    transform: translateY(-3px);
}

.card-title {
    font-size: 13px;
    color: #6b7280;
}

.card-value {
    font-size: 22px;
    font-weight: bold;
    margin-top: 5px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}

.table th {
    background: #f3f4f6;
    text-align: left;
    padding: 12px;
    font-size: 14px;
}

.table td {
    padding: 12px;
    border-top: 1px solid #eee;
    font-size: 14px;
}

.badge {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 12px;
}

.badge-success {
    background: #dcfce7;
    color: #166534;
}

.badge-danger {
    background: #fee2e2;
    color: #991b1b;
}
</style>

<div class="card-box" style="margin-bottom:15px;">
    <h3>👋 Welcome Operator</h3>
    <p>Monitoring data peminjaman barang secara real-time.</p>
</div>

<div class="dashboard-grid">

    <div class="card-box">
        <div class="card-title">Total Items</div>
        <div class="card-value">{{ $totalItems }}</div>
    </div>

    <div class="card-box">
        <div class="card-title">Active Lending</div>
        <div class="card-value">{{ $activeLending }}</div>
    </div>

    <div class="card-box">
        <div class="card-title">Returned</div>
        <div class="card-value">{{ $returnedLending }}</div>
    </div>

</div>

<div class="card-box" style="margin-bottom:15px;">
    <h3 style="margin-bottom:10px;">📋 Latest Lending</h3>

    <table class="table">
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
                            <span class="badge badge-success">Returned</span>
                        @else
                            <span class="badge badge-danger">Active</span>
                        @endif
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($lend->borrowed_at)->format('d M Y H:i') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection