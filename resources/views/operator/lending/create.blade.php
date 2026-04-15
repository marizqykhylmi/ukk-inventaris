@extends('layouts.operator')

@section('title', 'Add Lending')

@section('content')

<div class="card">

    <h2>Add Lending</h2>

    <form action="{{ url('/operator/lending') }}" method="POST">
        @csrf

        <!-- ITEM -->
        <label>Item</label>
        <select name="item_id" required style="width:100%; padding:8px; margin-bottom:10px;">
            <option value="">-- Select Item --</option>

            @foreach($items as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }} (Stock: {{ $item->total }})
                </option>
            @endforeach
        </select>

        <!-- QTY -->
        <label>Quantity</label>
        <input type="number" name="quantity" min="1" required
               style="width:100%; padding:8px; margin-bottom:10px;">

        <!-- NAME (DATA PINJAMAN / IDENTITAS) -->
        <label>Name</label>
        <input type="text" name="name" required
               style="width:100%; padding:8px; margin-bottom:10px;">

        <!-- 🔥 PEMINJAM (BARU) -->
        <label>Peminjam</label>
        <input type="text" name="peminjam" required
               placeholder="Contoh: XII RPL 1 / Guru / Siswa"
               style="width:100%; padding:8px; margin-bottom:10px;">

        <!-- KETERANGAN -->
        <label>Keterangan</label>
        <textarea name="keterangan"
                  style="width:100%; padding:8px; margin-bottom:10px;"></textarea>

        <!-- SUBMIT -->
        <button type="submit"
                style="padding:10px 15px; background:#3b82f6; color:white; border:none;">
            Save Lending
        </button>

    </form>

</div>

@endsection