@extends('layouts.operator')

@section('title', 'Items')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <h2 style="margin: 0; color: #1e293b;">Items List</h2>
</div>

@if(session('success'))
    <div style="background:#10b981; color:white; padding:12px 16px; border-radius:6px; margin-bottom:20px; font-weight:500; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="background:#ef4444; color:white; padding:12px 16px; border-radius:6px; margin-bottom:20px; font-weight:500; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
        {{ session('error') }}
    </div>
@endif

<div class="card" style="background: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); overflow: hidden; border: 1px solid #e2e8f0;">
    
    <div style="overflow-x: auto;">
        <table style="width:100%; border-collapse:collapse; text-align: left; white-space: nowrap;">

            <thead>
                <tr style="background:#f8fafc; border-bottom: 2px solid #e2e8f0; color: #475569; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em;">
                    <th style="padding: 16px; font-weight: 600;">#</th>
                    <th style="padding: 16px; font-weight: 600;">Category</th>
                    <th style="padding: 16px; font-weight: 600;">Name</th>
                    <th style="padding: 16px; font-weight: 600; text-align: center;">Total</th>
                    <th style="padding: 16px; font-weight: 600; text-align: center;">Available</th>
                    <th style="padding: 16px; font-weight: 600; text-align: center;">Lending</th>
                </tr>
            </thead>

            <tbody>
                @forelse($items as $i => $item)
                <tr style="border-bottom:1px solid #f1f5f9; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                    <td style="padding: 16px; color: #64748b;">{{ $i+1 }}</td>
                    <td style="padding: 16px; color: #334155; font-weight: 500;">{{ $item->category->name ?? '-' }}</td>
                    <td style="padding: 16px; color: #334155;">{{ $item->name }}</td>
                    <td style="padding: 16px; color: #64748b; text-align: center;">{{ $item->total }}</td>
                    <td style="padding: 16px; color: #10b981; text-align: center; font-weight: 600;">{{ $item->available }}</td>
                    <td style="padding: 16px; color: #f59e0b; text-align: center; font-weight: 600;">{{ $item->total - $item->available }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 32px; text-align: center; color: #94a3b8; font-style: italic;">
                        Belum ada item yang terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>

@endsection