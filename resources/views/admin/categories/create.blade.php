@extends('layouts.admin')

@section('title', 'Categories')
@section('header', 'Create Category')

@section('content')

<style>
:root {
    --card: #ffffff;
    --bg: #f6f7fb;
    --border: #e5e7eb;
    --text: #111827;
    --muted: #6b7280;
}

body[data-theme="dark"] {
    --card: #1f2937;
    --bg: #111827;
    --border: #374151;
    --text: #f9fafb;
    --muted: #9ca3af;
}

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

/* FORM */
.form-group {
    margin-bottom: 16px;
}

label {
    display: block;
    margin-bottom: 6px;
    font-size: 13px;
    color: var(--muted);
    font-weight: 500;
}

/* INPUT */
input, select {
    width: 100%;
    padding: 11px 12px;
    border-radius: 10px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text);
    font-size: 14px;
    transition: 0.2s;
}

input:focus, select:focus {
    outline: none;
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16,185,129,0.15);
}

/* BUTTON */
.btn-submit {
    width: 100%;
    padding: 11px;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(16,185,129,0.25);
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

    <div class="form-title">Create Category</div>
    <div class="form-subtitle">Add new category data</div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <form action="/admin/categories" method="POST">
            @csrf

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" placeholder="Enter category name" required>
            </div>

            <div class="form-group">
                <label>Division PJ</label>
                <select name="division_pj_id" required>
                    <option value="">Select division</option>
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">
                Create Category
            </button>

        </form>
    </div>

</div>

@endsection