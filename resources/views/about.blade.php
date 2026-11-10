@extends('layouts.app')

@section('content')
<div class="py-10 sm:py-12 md:py-16 bg-[#FFFDF7]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-10 md:mb-16">
            <span class="block text-[11px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]">
                Our Story & Philosophy
            </span>

            <h1 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight">
                Boutique Pet Care Excellence
            </h1>

            <p class="mt-4 text-sm sm:text-base text-[#25364A]/80 leading-relaxed">
                Founded with a vision to revolutionize pet care in the USA, Paws & Claws provides a peaceful, stress-free environment tailored to your pet's emotional and physical well-being.
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">

            <!-- Card 1 -->
            <div class="bg-white/80 backdrop-blur-md p-5 sm:p-6 md:p-8 rounded-2xl border border-[#5B8DB8]/20 shadow-sm text-center flex flex-col items-center">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-[#F5C95C]/20 text-[#5B8DB8] rounded-full flex items-center justify-center mb-3 sm:mb-4 font-bold text-lg sm:text-xl">
                    1
                </div>

                <h3 class="font-serif font-bold text-[#25364A] text-lg sm:text-xl mb-2">
                    Certified Specialists
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Our groomers and handlers are certified in gentle handling and pet CPR.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white/80 backdrop-blur-md p-5 sm:p-6 md:p-8 rounded-2xl border border-[#5B8DB8]/20 shadow-sm text-center flex flex-col items-center">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-[#F5C95C]/20 text-[#5B8DB8] rounded-full flex items-center justify-center mb-3 sm:mb-4 font-bold text-lg sm:text-xl">
                    2
                </div>

                <h3 class="font-serif font-bold text-[#25364A] text-lg sm:text-xl mb-2">
                    Luxury Facilities
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Climate-controlled suites, soundproof rooms, and organic grooming products.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white/80 backdrop-blur-md p-5 sm:p-6 md:p-8 rounded-2xl border border-[#5B8DB8]/20 shadow-sm text-center flex flex-col items-center sm:col-span-2 lg:col-span-1">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-[#F5C95C]/20 text-[#5B8DB8] rounded-full flex items-center justify-center mb-3 sm:mb-4 font-bold text-lg sm:text-xl">
                    3
                </div>

                <h3 class="font-serif font-bold text-[#25364A] text-lg sm:text-xl mb-2">
                    Personalized Attention
                </h3>

                <p class="text-xs sm:text-sm text-[#25364A]/70 leading-relaxed">
                    Individualized care schedules based on species, breed, and temperament.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection