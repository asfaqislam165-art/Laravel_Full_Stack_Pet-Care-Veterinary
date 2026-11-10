@extends('layouts.app')

@section('content')
<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7]">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Page Header -->
        <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-12 md:mb-16">
            <span class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]">
                Luxury Care Offerings
            </span>

            <h1 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight">
                Boutique Services & Spa Treatments
            </h1>

            <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto">
                From gentle hydromassage baths to spacious boarding suites, every experience is designed for maximum pet comfort.
            </p>
        </div>

        @if(isset($pricings) && count($pricings) > 0)
            @foreach($pricings as $serviceName => $packages)
                <section class="mb-10 sm:mb-12 md:mb-16">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#5B8DB8] mb-4 sm:mb-6 border-b border-[#5B8DB8]/20 pb-2 sm:pb-3">
                        {{ $serviceName }}
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
                        @foreach($packages as $package)
                            <div class="group bg-white/80 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm flex flex-col hover:shadow-md hover:-translate-y-1 transition">
                                <div class="flex-1">
                                    <h3 class="text-base sm:text-lg md:text-xl font-serif font-bold text-[#25364A] mb-2">
                                        {{ $package->package_name }}
                                    </h3>

                                    <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                                        {{ $package->description }}
                                    </p>
                                </div>

                                <div class="pt-4 mt-5 border-t border-[#5B8DB8]/10">
                                    <div class="flex flex-wrap items-end justify-between gap-3">
                                        <div class="min-w-0">
                                            <span class="block text-lg sm:text-xl md:text-2xl font-bold text-[#5B8DB8] leading-none">
                                                ${{ number_format($package->price, 2) }}
                                            </span>

                                            <span class="block mt-1 text-[11px] sm:text-xs text-[#25364A]/60">
                                                {{ $package->duration }}
                                            </span>
                                        </div>

                                        <a
                                            href="{{ route('booking.create') }}"
                                            class="inline-flex items-center justify-center bg-[#5B8DB8] text-[#FFFDF7] px-4 py-2.5 rounded-xl font-semibold hover:bg-[#5B8DB8]/90 active:scale-[0.98] transition shadow-sm text-xs sm:text-sm whitespace-nowrap"
                                        >
                                            Reserve
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        @else
            <div class="text-center py-10 sm:py-14 bg-white/50 rounded-2xl border border-[#5B8DB8]/20">
                <p class="text-sm text-[#25364A]/70">
                    No service packages are currently available.
                </p>
            </div>
        @endif
    </div>
</div>
@endsection