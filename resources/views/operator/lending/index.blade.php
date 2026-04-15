@extends('layouts.operator')

@section('title', 'Operator Lending')

@section('content')

<style>
/* SUCCESS */
.alert-success {
    background:#dcfce7;
    color:#166534;
    padding:10px;
    margin-bottom:15px;
    border-radius:6px;
}

/* HEADER */
.page-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
    gap:20px;
}

/* BUTTON ADD */
.btn-add {
    padding:8px 12px;
    background:#3b82f6;
    color:white;
    text-decoration:none;
    border-radius:6px;
    transition:0.2s;
}

.btn-add:hover {
    background:#2563eb;
}

/* FILTER */
.filter-form {
    display:flex;
    gap:10px;
    align-items:center;
}

/* TABLE */
.table {
    width:100%;
    border-collapse: collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
}

.table th {
    padding:12px;
    text-align:left;
    background:#f3f4f6;
    font-size:14px;
}

.table td {
    padding:12px;
    border-top:1px solid #eee;
    font-size:14px;
}

/* STATUS */
.badge {
    padding:4px 8px;
    border-radius:6px;
    font-size:12px;
}

.badge-success {
    background:#dcfce7;
    color:#166534;
}

.badge-danger {
    background:#fee2e2;
    color:#991b1b;
}

/* ACTION BUTTON */
.action-btn {
    display:flex;
    gap:8px;
    align-items:center;
}

.btn {
    padding:6px 10px;
    border-radius:6px;
    font-size:12px;
    border:none;
    cursor:pointer;
    text-decoration:none;
    transition:0.2s;
}

/* RETURN */
.btn-return {
    background:#7c3aed;
    color:white;
}

.btn-return:hover {
    background:#6d28d9;
}

/* DELETE */
.btn-delete {
    background:#ef4444;
    color:white;
}

.btn-delete:hover {
    background:#dc2626;
}
</style>

{{-- SUCCESS MESSAGE --}}
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="page-header">

    <h2>Data Lending</h2>

    {{-- FILTER --}}
    <form method="GET" action="{{ url('/operator/lending') }}" class="filter-form">

        <input type="date" name="start_date" value="{{ request('start_date') }}"
            style="padding:8px; border:1px solid #ddd; border-radius:6px;">

        <span>sampai</span>

        <input type="date" name="end_date" value="{{ request('end_date') }}"
            style="padding:8px; border:1px solid #ddd; border-radius:6px;">

        <button type="submit"
            style="padding:8px 12px; background:#3b82f6; color:white; border:none; border-radius:6px;">
            Filter
        </button>

        <a href="{{ url('/operator/lending') }}"
            style="padding:8px 12px; background:#ef4444; color:white; border-radius:6px; text-decoration:none;">
            Reset
        </a>

    </form>

    <a href="{{ url('/operator/lending/create') }}" class="btn-add">
        + Add Lending
    </a>

</div>

<div class="card">

    <table class="table">

        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Name</th>
                <th>Peminjam</th>
                <th>Qty</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
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

                <td>
                    {{ \Carbon\Carbon::parse($lend->borrowed_at)->format('d M Y H:i') }}
                </td>

                <td>
                    @if($lend->returned_at)
                        <span class="badge badge-success">
                            Returned: {{ \Carbon\Carbon::parse($lend->returned_at)->format('d M Y') }}
                        </span>
                    @else
                        <span class="badge badge-danger">
                            Not Returned
                        </span>
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

                            <button type="submit"
                                class="btn btn-delete"
                                onclick="return confirm('Yakin mau hapus data ini?')">
                                Delete
                            </button>
                        </form>

                    </div>
                </td>

            </tr>

        @empty
            <tr>
                <td colspan="9" style="text-align:center; padding:20px; color:gray;">
                    Data kosong
                </td>
            </tr>
        @endforelse

        </tbody>

    </table>

</div>

@endsection