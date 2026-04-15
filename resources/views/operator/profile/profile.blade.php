@extends('layouts.operator')

@section('title', 'Profile')

@section('content')

<div style="max-width:500px; margin:auto;">

    <h2 style="margin-bottom:20px; color:#1e293b;">Change Password</h2>

    @if(session('success'))
        <div style="background:#10b981; color:white; padding:12px; border-radius:6px; margin-bottom:16px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background:#ef4444; color:white; padding:12px; border-radius:6px; margin-bottom:16px;">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background:#f87171; color:white; padding:12px; border-radius:6px; margin-bottom:16px;">
            <ul style="margin:0; padding-left:18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background:white; padding:24px; border-radius:8px; box-shadow:0 4px 6px rgba(0,0,0,0.1);">

        <form action="{{ url('operator/profile/update-password') }}" method="POST">
            @csrf

            <div style="margin-bottom:16px;">
                <label>Password Lama</label>
                <input type="password" name="old_password" required
                    style="width:100%; padding:10px; margin-top:6px; border:1px solid #cbd5f5; border-radius:6px;">
            </div>

            <div style="margin-bottom:16px;">
                <label>Password Baru</label>
                <input type="password" name="new_password" required
                    style="width:100%; padding:10px; margin-top:6px; border:1px solid #cbd5f5; border-radius:6px;">
            </div>

            <div style="margin-bottom:20px;">
                <label>Konfirmasi Password</label>
                <input type="password" name="new_password_confirmation" required
                    style="width:100%; padding:10px; margin-top:6px; border:1px solid #cbd5f5; border-radius:6px;">
            </div>

            <button type="submit"
                style="background:#3b82f6; color:white; padding:10px 16px; border:none; border-radius:6px; cursor:pointer;">
                Update Password
            </button>

        </form>

    </div>

</div>

@endsection