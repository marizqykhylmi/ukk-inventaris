@extends('layouts.admin')

@section('content')

<style>
.form-group {
    margin-bottom: 15px;
}

input, select {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.btn {
    padding: 10px 16px;
    border-radius: 6px;
    background: #7c3aed;
    color: white;
    border: none;
}
</style>

<div class="card">
    <h2>Edit User</h2>

    <form method="POST" action="/admin/users/{{ $user->id }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
            </select>
        </div>

        <button type="submit" class="btn">Update</button>
    </form>
</div>

@endsection