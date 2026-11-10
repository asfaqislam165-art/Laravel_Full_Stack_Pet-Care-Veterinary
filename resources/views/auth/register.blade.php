@extends('layouts.guest')

@section('title', 'Create Account')

@section('content')
<div class="w-full max-w-md mx-auto bg-white/90 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-xl">
    
    <div class="text-center mb-6">
        <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Create Account</h2>
        <p class="text-[11px] sm:text-xs text-[#25364A]/70 mt-1">Join Paws & Claws for exclusive boutique pet services.</p>
    </div>

    <!-- Register Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-4 sm:space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Full Name</label>
            <input 
                id="name"
                type="text" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                autofocus 
                autocomplete="name" 
                placeholder="Enter your full name"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('name')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Email Address</label>
            <input 
                id="email"
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autocomplete="username" 
                placeholder="name@example.com"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('email')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Password</label>
            <input 
                id="password"
                type="password" 
                name="password" 
                required 
                autocomplete="new-password" 
                placeholder="••••••••"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('password')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Confirm Password</label>
            <input 
                id="password_confirmation"
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
                placeholder="••••••••"
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('password_confirmation')
                <span class="mt-1.5 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Actions / Buttons -->
        <div class="flex flex-col-reverse sm:flex-row items-center justify-between gap-3 pt-3">
            <a href="{{ route('login') }}" class="text-xs text-[#5B8DB8] hover:underline font-medium text-center sm:text-left">
                Already registered?
            </a>

            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-6 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-md text-xs sm:text-sm tracking-wide text-center">
                Create Account
            </button>
        </div>
    </form>
</div>
@endsection