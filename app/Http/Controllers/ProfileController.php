<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('operator.profile.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama salah!');
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = User::find(Auth::id());

        // hapus foto lama
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // simpan foto baru
        $file = $request->file('profile_photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('profile', $filename, 'public');

        $user->update([
            'profile_photo' => $path
        ]);

        return response()->json([
            'success' => true,
            'path' => $path
        ]);
    }
}