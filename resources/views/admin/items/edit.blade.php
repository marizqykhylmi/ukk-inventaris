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
    background:#7c3aed;
    color:white;
    padding:10px;
    border:none;
}
</style>
</head>

<body>

<div class="container">

    <h2>Edit Item</h2>

    <div class="card">
        <form action="/admin/items/{{ $item->id }}" method="POST">
            @csrf
            @method('PUT')

            <label>Name</label>
            <input type="text" name="name" value="{{ $item->name }}">

            <label>Category</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label>Total</label>
            <input type="number" name="total" value="{{ $item->total }}">

            <label>Repair</label>
            <input type="number" name="repair" value="{{ $item->repair }}">

            <button type="submit">Update</button>
        </form>
    </div>

</div>

@endsection