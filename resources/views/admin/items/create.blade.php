@extends('layouts.admin')

@section('title', 'Items')

@section('header', 'Data Items')

@section('content')

<style>
body { font-family: Arial; background:#f1f5f9; }
.container { padding:30px; }

.card {
    background:white;
    padding:20px;
    border-radius:8px;
    max-width:400px;
}

input, select {
    width:100%;
    padding:10px;
    margin-bottom:15px;
}

button {
    background:#10b981;
    color:white;
    padding:10px;
    border:none;
}
</style>
</head>

<body>

<div class="container">

    <h2>Create Item</h2>

    <div class="card">
        <form action="/admin/items" method="POST">
            @csrf

            <label>Name</label>
            <input type="text" name="name" required>

            <label>Category</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label>Total</label>
            <input type="number" name="total" required>

            <button type="submit">Save</button>
        </form>
    </div>

</div>

@endsection