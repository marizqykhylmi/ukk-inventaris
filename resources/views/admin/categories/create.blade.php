@extends('layouts.admin')

@section('title', 'Categories')

@section('header', 'Data Categories')

@section('content')

<style>
.card {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    max-width: 500px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #334155;
}

input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #cbd5f5;
    border-radius: 6px;
}

.btn-submit {
    background: #10b981;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 6px;
    width: 100%;
    font-weight: bold;
}
</style>

<div class="content">


    @if ($errors->any())
    <div style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:6px; margin-bottom:15px;">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif
    <div class="card">
        <form action="/admin/categories" method="POST">
            @csrf

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Division PJ</label>
                <select name="division_pj_id" required>
                    <option value="">-- Select Division --</option>

                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">
                            {{ $division->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn-submit">
                Save Category
            </button>

        </form>
    </div>

</div>

@endsection