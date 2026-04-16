@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<div class="card profile-card">

    {{-- HEADER --}}
    <div class="profile-header">

        <div class="avatar-wrapper">

            <img
                id="avatar"
                src="{{ auth()->user()->profile_photo
                    ? asset('storage/' . auth()->user()->profile_photo)
                    : asset('images/user.png') }}"
                class="profile-avatar"
            >

            <button class="edit-avatar-btn" onclick="document.getElementById('photoInput').click()">
                ✏️
            </button>

            <input type="file" id="photoInput" hidden accept="image/*">

        </div>

        <div class="profile-info">
            <h2>{{ auth()->user()->name }}</h2>
            <p>{{ auth()->user()->email }}</p>
            <span class="role-badge">Admin</span>
        </div>

    </div>

    <hr>

    {{-- CROPPER PREVIEW --}}
    <div style="padding:20px">

        <img id="preview" style="max-width:100%; display:none; border-radius:10px;">

        <br>

        <button onclick="uploadPhoto()" class="btn-upload">
            Upload Photo
        </button>

    </div>

    <hr>

    {{-- 🔥 INI BAGIAN YANG KAMU MAU PERTAHANKAN --}}
    <div class="profile-body">
        <h3>Account Information</h3>

        <div class="info-grid">

            <div class="info-box">
                <label>Name</label>
                <p>{{ auth()->user()->name }}</p>
            </div>

            <div class="info-box">
                <label>Email</label>
                <p>{{ auth()->user()->email }}</p>
            </div>

            <div class="info-box">
                <label>Role</label>
                <p>Admin</p>
            </div>

            <div class="info-box">
                <label>Joined</label>
                <p>{{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>

        </div>
    </div>

</div>

{{-- STYLE --}}
<style>
.profile-card {
    max-width: 900px;
    margin: auto;
}

.profile-header {
    display: flex;
    gap: 20px;
    padding: 20px;
}

.avatar-wrapper {
    position: relative;
    width: 90px;
    height: 90px;
}

.profile-avatar {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: cover;
}

.edit-avatar-btn {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: none;
    background: #3b82f6;
    color: white;
    cursor: pointer;
}

.profile-body {
    padding: 20px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.info-box {
    padding: 15px;
    border-radius: 12px;
    border: 1px solid #ddd;
}

.btn-upload {
    margin-top: 10px;
    padding: 10px 16px;
    background: #22c55e;
    border: none;
    color: white;
    border-radius: 8px;
    cursor: pointer;
}
</style>

{{-- SCRIPT CROPPER --}}
<script>
let cropper = null;

document.getElementById('photoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();

    reader.onload = function(event) {
        const img = document.getElementById('preview');

        img.src = event.target.result;
        img.style.display = 'block';

        if (cropper) {
            cropper.destroy();
            cropper = null;
        }

        setTimeout(() => {
            cropper = new Cropper(img, {
                aspectRatio: 1,
                viewMode: 1
            });
        }, 200);
    };

    reader.readAsDataURL(file);
});

function uploadPhoto() {
    if (!cropper) {
        alert("Crop belum siap, pilih gambar dulu!");
        return;
    }

    const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 300
    });

    canvas.toBlob(function(blob) {
        const formData = new FormData();
        formData.append('profile_photo', blob, 'profile.png');
        formData.append('_token', '{{ csrf_token() }}');

        fetch("{{ route('admin.profile.photo') }}", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    });
}
</script>

@endsection