@extends('layouts.operator')

@section('title', 'Items')

@section('content')

<style>
/* HEADER */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.page-header h2 {
    font-size: 20px;
    font-weight: 700;
}

/* ALERT */
.alert {
    padding: 14px 16px;
    border-radius: 12px;
    margin-bottom: 14px;
    font-size: 14px;
    font-weight: 500;
}

.alert-success {
    background: rgba(16,185,129,0.12);
    color: #10b981;
    border: 1px solid rgba(16,185,129,0.25);
}

.alert-error {
    background: rgba(239,68,68,0.12);
    color: #ef4444;
    border: 1px solid rgba(239,68,68,0.25);
}

/* TABLE WRAPPER (IMPORTANT FIX) */
.table-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
    width: 100%;
}

/* SCROLL WRAP */
.table-wrap {
    overflow-x: auto;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px; /* biar ga sempit */
}

/* HEADER */
th {
    text-align: left;
    font-size: 13px;
    padding: 16px 18px;
    background: var(--bg);
    color: var(--muted);
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}

/* ROW */
td {
    padding: 16px 18px;
    font-size: 14px; /* 🔥 INI PENTING biar ga kecil */
    border-top: 1px solid var(--border);
}

/* HOVER */
tr:hover {
    background: rgba(0,0,0,0.03);
}

body[data-theme="dark"] tr:hover {
    background: rgba(255,255,255,0.05);
}

/* TEXT EMPHASIS */
.num-green {
    color: #10b981;
    font-weight: 700;
    font-size: 14px;
}

.num-yellow {
    color: #f59e0b;
    font-weight: 700;
    font-size: 14px;
}
</style>

<!-- HEADER -->
<div class="page-header">
    <h2>📦 Items Inventory</h2>
</div>

<!-- ALERT -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

<!-- TABLE -->
<div class="table-card">

    <div class="table-wrap">

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Available</th>
                    <th>Borrowed</th>
                </tr>
            </thead>

            <tbody>
                @forelse($items as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->category->name ?? '-' }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total }}</td>

                    <td class="num-green">
                        {{ $item->available }}
                    </td>

                    <td class="num-yellow">
                        {{ $item->total - $item->available }}
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:28px; color:var(--muted); font-size:14px;">
                        No items found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection