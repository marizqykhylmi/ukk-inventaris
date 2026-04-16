@extends('layouts.operator')

@section('title', 'Operator Lending')

@section('content')

<style>
/* ALERT */
.alert-success {
    background: #dcfce7;
    color: #166534;
    padding: 12px 14px;
    border-radius: 10px;
    margin-bottom: 15px;
    font-weight: 500;
}

/* HEADER */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.page-header h2 {
    font-size: 20px;
    font-weight: 600;
    color: var(--text);
}

/* FILTER WRAP */
.filter-form {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
}

/* INPUT */
.filter-form input {
    padding: 10px 12px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: var(--card);
    color: var(--text);
    font-size: 13px;
}

/* BUTTONS */
.btn-add {
    padding: 10px 14px;
    background: #3b82f6;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 500;
    transition: .2s;
}

.btn-add:hover {
    transform: translateY(-2px);
    background: #2563eb;
}

.btn-filter {
    padding: 10px 14px;
    background: #3b82f6;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

.btn-reset {
    padding: 10px 14px;
    background: #ef4444;
    color: white;
    border-radius: 10px;
    text-decoration: none;
}

/* CARD */
.card {
    background: var(--card);
    border-radius: 14px;
    border: 1px solid var(--border);
    overflow: hidden;
}

/* TABLE WRAPPER */
.table-wrapper {
    width: 100%;
    overflow-x: auto;
}

/* TABLE */
.table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px; /* 🔥 ini biar gak kecil */
}

/* HEAD */
.table th {
    text-align: left;
    padding: 14px 16px;
    font-size: 13px;
    background: var(--bg);
    color: var(--text);
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
}

/* BODY */
.table td {
    padding: 14px 16px;
    font-size: 13px;
    border-top: 1px solid var(--border);
    color: var(--text);
    white-space: nowrap;
}

/* ROW */
.table tr:hover {
    background: rgba(0,0,0,0.03);
}

body[data-theme="dark"] .table tr:hover {
    background: rgba(255,255,255,0.05);
}

/* BADGE */
.badge {
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 500;
}

.badge-success {
    background: rgba(16,185,129,0.15);
    color: #10b981;
}

.badge-danger {
    background: rgba(239,68,68,0.15);
    color: #ef4444;
}

/* ACTION */
.action-btn {
    display: flex;
    gap: 8px;
}

/* BUTTON ACTION */
.btn {
    padding: 7px 10px;
    border-radius: 8px;
    font-size: 12px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: .2s;
}

.btn-return {
    background: #7c3aed;
    color: white;
}

.btn-return:hover {
    transform: translateY(-2px);
}

.btn-delete {
    background: #ef4444;
    color: white;
}

.btn-delete:hover {
    transform: translateY(-2px);
}
</style>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="page-header">

    <h2>Data Lending</h2>

    <form method="GET" action="{{ url('/operator/lending') }}" class="filter-form">

        <input type="date" name="start_date" value="{{ request('start_date') }}">
        <span style="color:var(--text)">→</span>
        <input type="date" name="end_date" value="{{ request('end_date') }}">

        <button class="btn-filter">Filter</button>

        <a href="{{ url('/operator/lending') }}" class="btn-reset">
            Reset
        </a>
    </form>

    <a href="{{ url('/operator/lending/create') }}" class="btn-add">
        + Add Lending
    </a>

</div>

<div class="card">

    <div class="table-wrapper">

        <table class="table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Name</th>
                    <th>Peminjam</th>
                    <th>Qty</th>
                    <th>Keterangan</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($lendings as $key => $lend)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $lend->item->name ?? '-' }}</td>
                    <td>{{ $lend->name }}</td>
                    <td>{{ $lend->peminjam ?? '-' }}</td>
                    <td>{{ $lend->quantity }}</td>
                    <td>{{ $lend->keterangan ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($lend->borrowed_at)->format('d M Y H:i') }}</td>

                    <td>
                        @if($lend->returned_at)
                            <span class="badge badge-success">Returned</span>
                        @else
                            <span class="badge badge-danger">Active</span>
                        @endif
                    </td>

                    <td>
                        <div class="action-btn">

                            @if(!$lend->returned_at)
                                <a href="/operator/lending/{{ $lend->id }}/return"
                                   class="btn btn-return">
                                    Return
                                </a>
                            @endif

                            <form action="/operator/lending/{{ $lend->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-delete"
                                    onclick="return confirm('Yakin mau hapus?')">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="9" style="padding:20px; text-align:center; color:gray;">
                        Data kosong
                    </td>
                </tr>
            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection