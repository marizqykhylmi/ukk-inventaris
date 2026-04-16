@extends('layouts.admin')

@section('title', 'Items')
@section('header', 'Edit Item')

@section('content')

<style>
/* WRAPPER */
.form-wrapper {
    max-width: 560px;
    margin: 0 auto;
}

/* TITLE */
.form-title {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 4px;
}

.form-subtitle {
    font-size: 13px;
    color: var(--muted);
    margin-bottom: 16px;
}

/* CARD */
.card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.04);
}

/* FORM GROUP */
.form-group {
    margin-bottom: 16px;
}

/* LABEL */
label {
    display: block;
    margin-bottom: 6px;
    font-size: 13px;
    color: var(--muted);
    font-weight: 500;
}

/* INPUT + SELECT */
input, select {
    width: 100%;
    padding: 11px 12px;
    border-radius: 10px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text);
    font-size: 14px;
    transition: 0.2s ease;
}

/* FOCUS (edit mode = amber glow) */
input:focus, select:focus {
    outline: none;
    border-color: #f59e0b;
    box-shadow: 0 0 0 3px rgba(245,158,11,0.15);
}

/* BUTTON */
.btn-submit {
    width: 100%;
    padding: 11px;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s ease;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(245,158,11,0.25);
}

/* ERROR */
.alert-error {
    background: rgba(239,68,68,0.08);
    border: 1px solid rgba(239,68,68,0.2);
    color: #ef4444;
    padding: 12px;
    border-radius: 10px;
    font-size: 13px;
    margin-bottom: 15px;
}
</style>

<div class="form-wrapper">

    <div class="form-title">Edit Item</div>
    <div class="form-subtitle">Update item information</div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <form action="/admin/items/{{ $item->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Item Name</label>
                <input type="text" name="name" value="{{ $item->name }}" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $item->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Total Stock</label>
                <input type="number" name="total" value="{{ $item->total }}" required>
            </div>

            <div class="form-group">
                <label>Repair</label>
                <input type="number" name="repair" value="{{ $item->repair }}" required>
            </div>

            <button type="submit" class="btn-submit">
                Update Item
            </button>

        </form>
    </div>

</div>

@endsection