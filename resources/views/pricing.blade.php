@extends('layouts.app')

@section('content')
<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7]">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12 md:mb-16">
            <span class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]">
                Transparent Rate Card
            </span>

            <h1 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight">
                Services Pricing
            </h1>

            <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto">
                Clear pricing with no hidden charges. Choose the right care package for your pet.
            </p>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @forelse($pricings as $pricing)
                <div class="group bg-white/80 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col hover:border-[#5B8DB8]/50 hover:shadow-md hover:-translate-y-1 transition">
                    <div class="flex-1">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C] tracking-wider mb-1">
                            {{ $pricing->service_name }}
                        </span>

                        <h2 class="text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#25364A] mb-2">
                            {{ $pricing->package_name }}
                        </h2>

                        <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                            {{ $pricing->description }}
                        </p>
                    </div>

                    <div class="pt-4 mt-5 border-t border-[#5B8DB8]/10">
                        <div class="flex items-end justify-between gap-3 mb-4 sm:mb-5">
                            <span class="text-xl sm:text-2xl md:text-3xl font-bold text-[#5B8DB8] leading-none">
                                ${{ number_format($pricing->price, 2) }}
                            </span>

                            <span class="text-[11px] sm:text-xs text-[#25364A]/60 font-medium text-right">
                                / {{ $pricing->duration }}
                            </span>
                        </div>

                        <a
                            href="{{ route('booking.create') }}"
                            class="inline-flex items-center justify-center w-full bg-[#5B8DB8] text-[#FFFDF7] py-3 rounded-xl font-semibold hover:bg-[#5B8DB8]/90 active:scale-[0.99] transition shadow-sm text-sm"
                        >
                            Book Package
                        </a>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 text-center py-10 sm:py-14">
                    <p class="text-sm text-[#25364A]/60">
                        No pricing packages are available at the moment.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection