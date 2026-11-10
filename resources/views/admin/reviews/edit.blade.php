@extends('layouts.admin')

@section('title', 'Edit Review')

@section('content')
<div class="max-w-2xl mx-auto bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Header -->
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pb-4 border-b border-[#5B8DB8]/10">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Edit Customer Review</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Update client feedback or rating details.</p>
        </div>
        <a href="{{ route('admin.reviews.index') }}" class="inline-block text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-4 py-2 rounded-xl font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition whitespace-nowrap shadow-sm">
            &larr; Back to List
        </a>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" class="space-y-4 sm:space-y-5">
        @csrf
        @method('PUT')
        
        <!-- Customer Name -->
        <div>
            <label for="customer_name" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Client Name *</label>
            <input 
                id="customer_name"
                type="text" 
                name="customer_name" 
                value="{{ old('customer_name', $review->customer_name ?? '') }}" 
                required 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
            @error('customer_name')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Rating (1 to 5) -->
        <div>
            <label for="rating" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Rating (1 to 5) *</label>
            <select 
                id="rating"
                name="rating" 
                required 
                class="w-full rounded-xl border-[#5B8DB8]/30 text-xs sm:text-sm px-4 py-3 bg-white text-[#25364A] focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >
                <option value="5" {{ old('rating', $review->rating) == 5 ? 'selected' : '' }}>⭐ 5 - Excellent</option>
                <option value="4" {{ old('rating', $review->rating) == 4 ? 'selected' : '' }}>⭐ 4 - Very Good</option>
                <option value="3" {{ old('rating', $review->rating) == 3 ? 'selected' : '' }}>⭐ 3 - Good</option>
                <option value="2" {{ old('rating', $review->rating) == 2 ? 'selected' : '' }}>⭐ 2 - Fair</option>
                <option value="1" {{ old('rating', $review->rating) == 1 ? 'selected' : '' }}>⭐ 1 - Poor</option>
            </select>
            @error('rating')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Review Comment / Text -->
        <div>
            <label for="review_text" class="block text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">Review Comment *</label>
            <textarea 
                id="review_text"
                name="review_text" 
                rows="4" 
                required 
                class="w-full rounded-xl border-[#5B8DB8]/30 bg-white text-[#25364A] text-xs sm:text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-2 focus:ring-[#5B8DB8]/20 transition"
            >{{ old('review_text', $review->review_text ?? '') }}</textarea>
            @error('review_text')
                <span class="mt-1 text-xs text-rose-600 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-3">
            <a href="{{ route('admin.reviews.index') }}" class="text-xs font-semibold text-[#25364A]/70 hover:text-[#5B8DB8] transition text-center sm:text-left py-2">
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-6 py-3 rounded-xl font-bold hover:bg-[#5B8DB8]/90 transition shadow-sm text-xs sm:text-sm text-center">
                Update Review
            </button>
        </div>
    </form>
</div>
@endsection