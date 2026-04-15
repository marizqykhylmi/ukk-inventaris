@extends('layouts.admin')

@section('title', 'Items')

@section('header', 'Data Items')

@section('content')

<style>
.container { padding:30px; }

.card {
    background:white;
    border-radius:8px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
    overflow:hidden;
}

table {
    width:100%;
    border-collapse: collapse;
}

th, td {
    padding:15px;
    text-align:center;
    border-bottom:1px solid #eee;
}

th { color:#64748b; }

.btn {
    padding:6px 12px;
    border-radius:5px;
    text-decoration:none;
    color:white;
}

.btn-add { background:#10b981; }
.btn-edit { background:#7c3aed; }
.btn-delete { background:#ef4444; }
</style>

<div class="container">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    
    <h2>Items Table</h2>

    <div style="display:flex; gap:10px;">
        <a href="/admin/items/create" class="btn btn-add">+ Add</a>
    </div>

</div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Repair</th>
                    <th>Lending</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($items as $index => $item)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->repair }}</td>

                    <td>
                        @if($item->lending > 0)
                            <a href="#">
                                {{ $item->lending_total }}
                            </a>
                        @else
                            {{ $item->lending_total }}
                        @endif
                    </td>

                    <td>
                        <div style="display:flex; gap:10px;">
                            <a href="/admin/items/{{ $item->id }}/edit" class="btn btn-edit">
                                Edit
                            </a>
                            <form action="/admin/items/{{ $item->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin mau hapus?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7">Data kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
