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
    background: #10b981;
    color: white;
    border: none;
}
</style>

<div class="card">
    <h2>Tambah User</h2>

    <form method="POST" action="/admin/users">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role">
                <option value="admin">Admin</option>
                <option value="operator">Operator</option>
            </select>
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
</div>

@endsection