@extends('admin.layouts.app')
@section('title', 'Admin Profile')
@section('content')
<div class="max-w-lg mx-auto bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="nom" value="{{ old('nom', $admin->nom) }}" class="w-full border rounded px-3 py-2 outline-none focus:ring-2 focus:ring-[#EE626B]">
            @error('nom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="w-full border rounded px-3 py-2 outline-none focus:ring-2 focus:ring-[#EE626B]">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <hr class="my-4">
        <h3 class="font-semibold mb-2">Change Password (optional)</h3>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Current Password</label>
            <input type="password" name="current_password" class="w-full border rounded px-3 py-2 outline-none focus:ring-2 focus:ring-[#EE626B]">
            @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">New Password</label>
            <input type="password" name="new_password" class="w-full border rounded px-3 py-2 outline-none focus:ring-2 focus:ring-[#EE626B]">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" class="w-full border rounded px-3 py-2 outline-none focus:ring-2 focus:ring-[#EE626B]">
            @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-[#EE626B] text-white px-6 py-2 rounded hover:bg-[#c85d64] transition">Update Profile</button>
    </form>
</div>
@endsection
