@extends('layouts.guest')

@section('title', 'Sign In')

@section('content')
<div class="w-full max-w-md mx-auto bg-white/90 backdrop-blur-md border border-[#5B8DB8]/20 p-6 sm:p-8 rounded-3xl shadow-sm">
    
    <div class="text-center mb-5 sm:mb-6">
        <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Welcome Back</h2>
        <p class="text-[11px] sm:text-xs text-[#25364A]/70 mt-1">Please sign in to your account to continue.</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-xs font-medium text-green-600 bg-green-50 p-3 rounded-xl border border-green-200">
            {{ session('status') }}
        </div>
    @endif

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                Email Address
            </label>
            <input 
                id="email"
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="username" 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-3.5 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('email')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                Password
            </label>
            <input 
                id="password"
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-3.5 py-2.5 sm:py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('password')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-xs pt-1 gap-2">
            <label class="flex items-center cursor-pointer select-none">
                <input 
                    type="checkbox" 
                    name="remember" 
                    class="rounded border-[#5B8DB8]/40 text-[#5B8DB8] focus:ring-[#5B8DB8] w-4 h-4 cursor-pointer"
                >
                <span class="ml-2 text-[#25364A]/80 text-[11px] sm:text-xs">Remember me</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-[11px] sm:text-xs text-[#5B8DB8] hover:underline font-medium whitespace-nowrap">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button 
                type="submit" 
                class="w-full bg-[#5B8DB8] text-[#FFFDF7] py-2.5 sm:py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 focus:ring-2 focus:ring-[#5B8DB8]/50 transition shadow-md text-xs sm:text-sm tracking-wide"
            >
                Secure Sign In
            </button>
        </div>

        <!-- Registration Link -->
        @if (Route::has('register'))
            <p class="text-center text-[11px] sm:text-xs text-[#25364A]/70 pt-2">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-[#5B8DB8] font-semibold hover:underline">
                    Register here
                </a>
            </p>
        @endif
    </form>
</div>
@endsection