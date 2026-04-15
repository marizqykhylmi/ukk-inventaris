@extends('layouts.admin')

@section('title', 'Categories')

@section('header', 'Data Categories')

@section('content')

<style>
.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-title {
    font-size: 20px;
    color: #1e293b;
    margin-bottom: 5px;
}

.page-subtitle {
    font-size: 14px;
    color: #94a3b8;
}

.highlight-text {
    color: #d946ef;
}

.btn-add {
    background: #10b981;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 8px;
}

.card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.03);
    overflow: hidden;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
}

.custom-table th,
.custom-table td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #f1f5f9;
}

.action-group {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.btn-edit {
    background: #7c3aed;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
}

.btn-delete {
    background: #ef4444;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.empty-state {
    text-align: center;
    padding: 30px !important;
    color: #94a3b8 !important;
}
</style>

<div class="content-header">
    <div>
        <h2 class="page-title">Categories Table</h2>
        <p class="page-subtitle">
            Add, delete, update <span class="highlight-text">.categories</span>
        </p>
    </div>

    <a href="/admin/categories/create" class="btn-add">
        + Add
    </a>
</div>

<div class="card">
    <table class="custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Division PJ</th>
                <th>Total Items</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($categories as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
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

                            <button onclick="return confirm('Yakin mau hapus?')" class="btn-delete">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="empty-state">
                    Data belum ada
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection