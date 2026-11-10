@extends('layouts.app')

@section('content')
<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7]">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12 md:mb-16">
            <span class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]">
                Client Testimonials
            </span>

            <h1 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight">
                What Pet Parents Say
            </h1>

            <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto">
                Read genuine experiences from pet owners who trust Paws & Claws with their beloved companions.
            </p>
        </div>

        <!-- Reviews Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8 mb-8 sm:mb-10">
            @forelse($reviews as $review)
                <div class="group bg-white/80 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col hover:shadow-md hover:-translate-y-1 transition">
                    <div class="flex-1">
                        <!-- Rating -->
                        <div class="flex items-center gap-0.5 mb-3 text-base sm:text-lg" aria-label="Rated {{ $review->rating }} out of 5">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $review->rating ? 'text-[#F5C95C]' : 'text-gray-300' }}">
                                    ★
                                </span>
                            @endfor
                        </div>

                        <!-- Review -->
                        <p class="text-xs sm:text-sm text-[#25364A]/80 italic leading-relaxed line-clamp-5">
                            “{{ $review->review_text }}”
                        </p>
                    </div>

                    <!-- Reviewer -->
                    <div class="pt-4 mt-5 border-t border-[#5B8DB8]/10">
                        <h3 class="font-bold text-[#25364A] text-xs sm:text-sm truncate">
                            {{ $review->customer_name }}
                        </h3>

                        <span class="text-[11px] sm:text-xs text-[#5B8DB8] font-medium">
                            Verified Client
                        </span>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 text-center py-10 sm:py-14">
                    <p class="text-sm text-[#25364A]/60">
                        No reviews available yet. Be the first to share your experience!
                    </p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($reviews->hasPages())
            <div class="mt-4 sm:mt-6 flex justify-center">
                <div class="w-full sm:w-auto overflow-x-auto">
                    <div class="inline-flex min-w-max [&_nav]:flex [&_nav]:items-center [&_nav]:justify-center [&_nav]:gap-1 [&_nav]:flex-wrap">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection