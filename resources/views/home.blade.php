@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-[#FFFDF7] via-[#F5C95C]/10 to-[#FFFDF7] py-10 sm:py-14 md:py-20 lg:py-24">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

            <!-- Hero Text -->
            <div class="text-center lg:text-left">
                <span class="inline-block bg-[#F5C95C]/30 text-[#25364A] text-[10px] sm:text-xs font-bold uppercase tracking-widest px-3 py-1.5 sm:px-3.5 rounded-full mb-4">
                    USA's Premier Pet Sanctuary
                </span>

                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-serif font-bold text-[#5B8DB8] leading-tight mb-4 sm:mb-6">
                    Exceptional Care for Your Beloved Companions
                </h1>

                <p class="text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-6 sm:mb-8">
                    Experience high-end grooming, serene boarding, and personalized spa treatments designed for dogs, cats, rabbits, and birds in a calm, luxury boutique environment.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-start">
                    <a
                        href="{{ route('booking.create') }}"
                        class="inline-flex items-center justify-center bg-[#5B8DB8] text-[#FFFDF7] px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl font-semibold shadow-md hover:bg-[#5B8DB8]/90 active:scale-[0.99] transition text-sm sm:text-base"
                    >
                        Book Appointment Now
                    </a>

                    <a
                        href="{{ route('services') }}"
                        class="inline-flex items-center justify-center border border-[#5B8DB8]/40 text-[#5B8DB8] px-6 sm:px-8 py-3 sm:py-3.5 rounded-xl font-semibold hover:bg-[#5B8DB8]/10 active:scale-[0.99] transition text-sm sm:text-base"
                    >
                        Explore Services
                    </a>
                </div>
            </div>

            <!-- Hero Visual -->
            <div class="relative mt-2 lg:mt-0">
                <div class="w-full aspect-[4/3] sm:aspect-[16/10] lg:aspect-auto lg:h-[420px] xl:h-[460px] bg-[#5B8DB8]/10 rounded-3xl shadow-xl flex items-center justify-center border border-[#5B8DB8]/20">
                    <div class="text-center px-5 sm:px-8">
                        <span class="block text-5xl sm:text-6xl mb-3 sm:mb-4">🐾</span>

                        <h2 class="text-lg sm:text-xl font-serif font-bold text-[#5B8DB8]">
                            Boutique Luxury Pet Care
                        </h2>

                        <p class="mt-2 text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                            Professional stylists & veterinary-grade comfort.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-12 sm:py-16 md:py-20">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-12 md:mb-16">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#5B8DB8] mb-3">
                Signature Services & Pricing
            </h2>

            <p class="text-xs sm:text-sm md:text-base text-[#25364A]/80 leading-relaxed">
                Tailored packages crafted with gentle techniques, premium organic shampoos, and individual attention.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @forelse($services as $service)
                <div class="group bg-white/70 backdrop-blur-md rounded-2xl p-5 sm:p-6 md:p-7 border border-[#5B8DB8]/20 shadow-sm hover:shadow-md hover:-translate-y-1 transition flex flex-col">
                    <div class="flex-1">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C] tracking-wider mb-1">
                            {{ $service->service_name }}
                        </span>

                        <h3 class="text-lg sm:text-xl font-serif font-bold text-[#25364A] mb-2 sm:mb-3">
                            {{ $service->package_name }}
                        </h3>

                        <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between gap-3 pt-4 mt-5 border-t border-[#5B8DB8]/10">
                        <span class="text-lg sm:text-xl md:text-2xl font-bold text-[#5B8DB8]">
                            ${{ number_format($service->price, 2) }}
                        </span>

                        <span class="text-[11px] sm:text-xs text-[#25364A]/60 whitespace-nowrap">
                            {{ $service->duration }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 text-center py-10">
                    <p class="text-sm text-[#25364A]/60">No services available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-10 sm:py-14 md:py-16 bg-[#F5C95C]/10 border-y border-[#5B8DB8]/20">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10 md:mb-12">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#5B8DB8]">
                The Paws & Claws Standard
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8 text-center">
            <div class="bg-white/60 p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
                <span class="block text-3xl mb-3">🌿</span>

                <h3 class="font-bold text-[#25364A] mb-2 text-sm sm:text-base">
                    100% Organic Products
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Hypoallergenic and gentle formulas safe for sensitive skin.
                </p>
            </div>

            <div class="bg-white/60 p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
                <span class="block text-3xl mb-3">🛡️</span>

                <h3 class="font-bold text-[#25364A] mb-2 text-sm sm:text-base">
                    Stress-Free Environment
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Calming acoustics and private individual suites for pets.
                </p>
            </div>

            <div class="bg-white/60 p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm sm:col-span-2 lg:col-span-1">
                <span class="block text-3xl mb-3">🩺</span>

                <h3 class="font-bold text-[#25364A] mb-2 text-sm sm:text-base">
                    Certified Specialists
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Experienced handlers trained in animal behavior and safety.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection