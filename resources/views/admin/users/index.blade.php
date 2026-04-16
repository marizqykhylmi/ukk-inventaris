@extends('layouts.admin')

@section('title', 'Users')
@section('header', 'Data Users')

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

/* ADD BUTTON (SAMAIN SYSTEM) */
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

/* CARD */
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
    min-width: 650px;
}

/* HEAD */
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

/* HOVER (SAMA SYSTEM) */
.table tbody tr:hover {
    background: rgba(99,102,241,0.05);
}

/* ACTION */
.action-group {
    display: flex;
    gap: 6px;
}

/* EDIT BUTTON */
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
    font-weight: 500;
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
        <h2 class="page-title">Users</h2>
        <p class="page-subtitle">Manage system users and roles</p>
    </div>

    <a href="/admin/users/create" class="btn-add">
        + Add User
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>

                    <td>
                        <div class="action-group">
                            <a href="/admin/users/{{ $user->id }}/edit" class="btn-edit">
                                Edit
                            </a>

                            <form action="/admin/users/{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-delete" onclick="return confirm('Delete user?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        No users found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection