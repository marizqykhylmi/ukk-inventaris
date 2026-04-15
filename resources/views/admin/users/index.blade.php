@extends('layouts.admin')

@section('content')

<style>
.top-action {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    color: white;
    text-decoration: none;
}

.btn-add { background: #10b981; }
.btn-edit { background: #7c3aed; }
.btn-delete { background: #ef4444; border: none; cursor: pointer; }

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

th { color: #64748b; }
</style>

<div class="card">

    <div class="top-action">
        <h2>Users Table</h2>

        <div>
            <a href="/admin/users/create" class="btn btn-add">+ Add</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-edit">Edit</a>

                    <form action="/admin/users/{{ $user->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Data kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection