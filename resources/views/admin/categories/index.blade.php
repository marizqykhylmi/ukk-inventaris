@extends('layouts.admin')

@section('title', 'Categories')
@section('header', 'Data Categories')

@section('content')

<style>
:root {
    --card: #ffffff;
    --bg: #f6f7fb;
    --border: #e5e7eb;
    --text: #111827;
    --muted: #6b7280;
}

body[data-theme="dark"] {
    --card: #1f2937;
    --bg: #111827;
    --border: #374151;
    --text: #f9fafb;
    --muted: #9ca3af;
}

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
}

.page-subtitle {
    font-size: 13px;
    color: var(--muted);
    margin-top: 4px;
}

/* BUTTON */
.btn-add {
    background: #10b981;
    color: white;
    padding: 10px 14px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

/* CARD */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 14px;
    overflow: hidden;
}

/* TABLE */
.custom-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed; /* 🔥 ini penting biar balance */
}

/* HEADER */
.custom-table th {
    padding: 14px;
    text-align: left;
    font-size: 12px;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    background: var(--bg);
    color: var(--muted);
    border-bottom: 1px solid var(--border);
}

/* BODY */
.custom-table td {
    padding: 14px;
    font-size: 13px;
    border-top: 1px solid var(--border);
    color: var(--text);
    vertical-align: middle;
}

/* HOVER (soft aja) */
.custom-table tbody tr:hover {
    background: rgba(99,102,241,0.05);
}

/* ACTION */
.action-group {
    display: flex;
    gap: 6px;
}

/* BUTTONS */
.btn-edit {
    background: rgba(124,58,237,0.1);
    color: #a78bfa;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 12px;
    text-decoration: none;
    font-weight: 500;
}

.btn-edit:hover {
    background: #7c3aed;
    color: white;
}

.btn-delete {
    background: rgba(239,68,68,0.1);
    color: #f87171;
    padding: 6px 10px;
    border-radius: 8px;
    border: none;
    font-size: 12px;
    cursor: pointer;
}

.btn-delete:hover {
    background: #ef4444;
    color: white;
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
        <h2 class="page-title">Categories</h2>
        <p class="page-subtitle">
            Manage your <span class="highlight-text">categories data</span> easily
        </p>
    </div>

    <a href="/admin/categories/create" class="btn-add">
        + Add Category
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table class="custom-table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Division</th>
                    <th>Total Items</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td>{{ $category->division->name ?? '-' }}</td>
                    <td>{{ $category->total_items ?? 0 }}</td>

                    <td>
                        <div class="action-group">
                            <a href="/admin/categories/{{ $category->id }}/edit" class="btn-edit">
                                Edit
                            </a>

                            <form action="/admin/categories/{{ $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete this category?')" class="btn-delete">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        No categories found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>

@endsection