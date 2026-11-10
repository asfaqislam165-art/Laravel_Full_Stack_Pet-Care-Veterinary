@extends('layouts.admin')

@section('title', 'Boutique Settings')

@section('content')
<div class="max-w-3xl mx-auto bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Section Title -->
    <div class="mb-6 border-b border-[#5B8DB8]/10 pb-4">
        <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Website & Business Settings</h2>
        <p class="text-xs text-[#25364A]/70 mt-1">Update your boutique's general information, contact details, and operational hours.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update', $settings->id) }}" method="POST" class="space-y-4 sm:space-y-5">
        @csrf
        @method('PUT')
        
        <!-- Business Name & Tagline -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label for="business_name" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Business Name *</label>
                <input 
                    id="business_name"
                    type="text" 
                    name="business_name" 
                    value="{{ old('business_name', $settings->business_name) }}" 
                    required 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('business_name')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="tagline" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Tagline</label>
                <input 
                    id="tagline"
                    type="text" 
                    name="tagline" 
                    value="{{ old('tagline', $settings->tagline) }}" 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('tagline')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Phone & Email -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Phone</label>
                <input 
                    id="phone"
                    type="text" 
                    name="phone" 
                    value="{{ old('phone', $settings->phone) }}" 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('phone')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Email</label>
                <input 
                    id="email"
                    type="email" 
                    name="email" 
                    value="{{ old('email', $settings->email) }}" 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('email')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Business Address -->
        <div>
            <label for="address" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Business Address</label>
            <input 
                id="address"
                type="text" 
                name="address" 
                value="{{ old('address', $settings->address) }}" 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('address')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Business Hours & Instagram URL -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label for="business_hours" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Business Hours</label>
                <input 
                    id="business_hours"
                    type="text" 
                    name="business_hours" 
                    value="{{ old('business_hours', $settings->business_hours) }}" 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('business_hours')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="instagram_url" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Instagram Handle/URL</label>
                <input 
                    id="instagram_url"
                    type="text" 
                    name="instagram_url" 
                    value="{{ old('instagram_url', $settings->instagram_url) }}" 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('instagram_url')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-6 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-sm text-xs sm:text-sm text-center">
                Update Business Settings
            </button>
        </div>
    </form>
</div>
@endsection