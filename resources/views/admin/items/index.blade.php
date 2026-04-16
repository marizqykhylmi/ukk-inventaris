@extends('layouts.admin')

@section('title', 'Items')
@section('header', 'Data Items')

@section('content')

<style>
/* HEADER */
.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}

.page-title {
    font-size: 22px;
    font-weight: 700;
    color: var(--text);
}

.page-subtitle {
    font-size: 13px;
    color: var(--muted);
    margin-top: 4px;
}

/* ADD BUTTON (SAMAIN CATEGORY STYLE) */
.btn-add {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    padding: 10px 14px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: 0.25s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-add:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16,185,129,0.25);
}

/* CARD (SAMA CATEGORY STYLE) */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
}

/* TABLE WRAP */
.table-wrap {
    width: 100%;
    overflow-x: auto;
}

/* TABLE */
.table {
    width: 100%;
    border-collapse: collapse;
    min-width: 700px;
}

/* HEADER */
.table th {
    padding: 14px;
    text-align: left;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    background: var(--bg);
    color: var(--muted);
    border-bottom: 1px solid var(--border);
}

/* BODY */
.table td {
    padding: 14px;
    font-size: 13px;
    border-top: 1px solid var(--border);
    color: var(--text);
}

/* HOVER (SAMA CATEGORY) */
.table tbody tr:hover {
    background: rgba(99,102,241,0.05);
}

/* ACTION */
.action-group {
    display: flex;
    gap: 6px;
}

/* EDIT BUTTON (SAMA CATEGORY STYLE) */
.btn-edit {
    background: rgba(124,58,237,0.1);
    color: #a78bfa;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
}

.btn-edit:hover {
    background: #7c3aed;
    color: white;
}

/* DELETE BUTTON */
.btn-delete {
    background: rgba(239,68,68,0.1);
    color: #f87171;
    padding: 6px 12px;
    border-radius: 8px;
    border: none;
    font-size: 13px;
    cursor: pointer;
    font-weight: 500;
}

.btn-delete:hover {
    background: #ef4444;
    color: white;
}

/* LENDING LINK */
.lending-link {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 500;
}

.lending-link:hover {
    text-decoration: underline;
}

/* EMPTY */
.empty-state {
    text-align: center;
    padding: 30px;
    color: var(--muted);
}
</style>

<div class="content-header">
    <div>
        <h2 class="page-title">Items</h2>
        <p class="page-subtitle">Manage inventory items data</p>
    </div>

    <a href="/admin/items/create" class="btn-add">
        + Add Item
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Repair</th>
                    <th>Lending</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->repair }}</td>

                    <td>
                        @if($item->lending > 0)
                            <a href="#" class="lending-link">
                                {{ $item->lending_total }}
                            </a>
                        @else
                            {{ $item->lending_total }}
                        @endif
                    </td>

                    <td>
                        <div class="action-group">
                            <a href="/admin/items/{{ $item->id }}/edit" class="btn-edit">
                                Edit
                            </a>

                            <form action="/admin/items/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-delete" onclick="return confirm('Delete item?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        No items found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection