@extends('layouts.operator')

@section('title', 'Return Item')

@section('content')

<div class="card">

    <h2>Return Item</h2>

    <p><b>Item:</b> {{ $lending->item->name }}</p>
    <p><b>Qty:</b> {{ $lending->quantity }}</p>

    <form action="/operator/lending/{{ $lending->id }}/return" method="POST">
        @csrf
        @method('PUT')

        <!-- TANGGAL RETURN -->
        <label>Tanggal Return</label>
        <input type="date" name="returned_at" required
               style="width:100%; padding:8px; margin-bottom:10px;">

        <!-- BARANG HILANG -->
        <label>Barang Hilang?</label>
        <input type="number" name="lost_qty" min="0" value="0"
               style="width:100%; padding:8px; margin-bottom:5px;">

        <small style="color:gray;">
            ketik angka 0 jika tidak hilang
        </small>

        <br><br>

        <!-- BARANG RUSAK -->
        <label>Barang Rusak?</label>
        <input type="number" name="damaged_qty" min="0" value="0"
               style="width:100%; padding:8px; margin-bottom:5px;">

        <small style="color:gray;">
            ketik angka 0 jika tidak rusak
        </small>

        <br><br>

        <!-- SUBMIT -->
        <button type="submit"
                style="padding:10px 15px; background:#7c3aed; color:white; border:none;">
            Confirm Return
        </button>

    </form>

</div>

@endsection