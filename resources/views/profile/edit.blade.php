@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-xl mx-auto py-10 px-4 sm:px-6">
    <div class="bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-sm">
        
        <!-- Header -->
        <div class="mb-6 pb-4 border-b border-[#5B8DB8]/10">
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Account Profile</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Update your personal account details and security settings.</p>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="mb-6 p-3.5 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Update Form -->
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4 sm:space-y-5">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">Full Name *</label>
                <input 
                    id="name"
                    type="text" 
                    name="name" 
                    value="{{ old('name', $user->name) }}" 
                    required 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('name')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">Email Address *</label>
                <input 
                    id="email"
                    type="email" 
                    name="email" 
                    value="{{ old('email', $user->email) }}" 
                    required 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('email')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Section -->
            <div class="pt-4 border-t border-[#5B8DB8]/10 space-y-4">
                <h3 class="text-xs uppercase font-bold text-[#5B8DB8] tracking-wider">Update Password (Optional)</h3>
                
                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">Current Password</label>
                    <input 
                        id="current_password"
                        type="password" 
                        name="current_password" 
                        placeholder="••••••••"
                        class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                    >
                    @error('current_password')
                        <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password & Confirmation -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="new_password" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">New Password</label>
                        <input 
                            id="new_password"
                            type="password" 
                            name="new_password" 
                            placeholder="••••••••"
                            class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                        >
                    </div>
                    <div>
                        <label for="new_password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">Confirm Password</label>
                        <input 
                            id="new_password_confirmation"
                            type="password" 
                            name="new_password_confirmation" 
                            placeholder="••••••••"
                            class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                        >
                    </div>
                </div>
                @error('new_password')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center justify-end gap-3">
                <button type="submit" class="bg-[#5B8DB8] text-[#FFFDF7] px-6 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-sm text-xs sm:text-sm">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection