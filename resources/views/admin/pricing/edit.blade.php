@extends('layouts.admin')

@section('title', 'Edit Pricing Package')

@section('content')
<div class="max-w-2xl mx-auto bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Header -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-4 border-b border-[#5B8DB8]/10">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Edit Pricing Package</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Modify luxury care package details and service pricing.</p>
        </div>
        <a href="{{ route('admin.pricing.index') }}" class="inline-block text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-4 py-2 rounded-xl font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition whitespace-nowrap shadow-sm">
            &larr; Back to List
        </a>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.pricing.update', $pricing->id) }}" method="POST" class="space-y-4 sm:space-y-5">
        @csrf
        @method('PUT')
        
        <!-- Package Name -->
        <div>
            <label for="package_name" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Package Name *</label>
            <input 
                id="package_name"
                type="text" 
                name="package_name" 
                value="{{ old('package_name', $pricing->package_name) }}" 
                required 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('package_name')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Category & Price -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="service_name" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Category / Service *</label>
                <input 
                    id="service_name"
                    type="text" 
                    name="service_name" 
                    value="{{ old('service_name', $pricing->service_name) }}" 
                    required 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('service_name')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Price ($ USD) *</label>
                <input 
                    id="price"
                    type="number" 
                    step="0.01" 
                    name="price" 
                    value="{{ old('price', $pricing->price) }}" 
                    required 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('price')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Duration & Status -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="duration" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Duration *</label>
                <input 
                    id="duration"
                    type="text" 
                    name="duration" 
                    value="{{ old('duration', $pricing->duration) }}" 
                    required 
                    class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                @error('duration')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="is_active" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Status</label>
                <select 
                    id="is_active"
                    name="is_active" 
                    class="w-full rounded-xl border-[#5B8DB8]/30 text-xs sm:text-sm px-4 py-3 bg-white text-[#25364A] focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
                >
                    <option value="1" {{ old('is_active', $pricing->is_active) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active', $pricing->is_active) == 0 ? 'selected' : '' }}>Disabled</option>
                </select>
                @error('is_active')
                    <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Package Description -->
        <div>
            <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Package Description</label>
            <textarea 
                id="description"
                name="description" 
                rows="3" 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >{{ old('description', $pricing->description) }}</textarea>
            @error('description')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-3">
            <a href="{{ route('admin.pricing.index') }}" class="text-xs font-semibold text-[#25364A]/70 hover:text-[#5B8DB8] transition text-center sm:text-left py-2">
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-6 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-sm text-xs sm:text-sm text-center">
                Update Package
            </button>
        </div>
    </form>
</div>
@endsection