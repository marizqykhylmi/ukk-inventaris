@extends('layouts.admin')

@section('title', 'Categories')

@section('header', 'Edit Category')

@section('content')

<style>
.card {
    background: white;
    padding: 25px;
    border-radius: 8px;
    max-width: 500px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #cbd5f5;
    border-radius: 6px;
}

.btn-submit {
    background: #f59e0b;
    color: white;
    padding: 10px;
    border: none;
    width: 100%;
    border-radius: 6px;
}

.alert {
    background: #fee2e2;
    color: #991b1b;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
}
</style>

<div class="content">


    <div class="card">

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" required>
            </div>

            <div class="form-group">
                <label>Total Items</label>
                <input type="number" name="total_items" value="{{ $category->total_items }}" required>
            </div>

            <div class="form-group">
                <label>Division PJ</label>
                <select name="division_pj_id" required>
                    <option value="">-- Select Division --</option>

                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}"
                            {{ $category->division_pj_id == $division->id ? 'selected' : '' }}>
                            {{ $division->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <button type="submit" class="btn-submit">
                Update Category
            </button>

        </form>

    </div>

</div>

@endsection