<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Paws & Claws Boutique') }} - Luxury Pet Care & Grooming</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
  
</head>
<body class="bg-[#FFFDF7] text-[#25364A] font-sans antialiased selection:bg-[#F5C95C]/30 selection:text-[#25364A]">
    <div class="min-h-screen flex flex-col justify-between">
        <div>
            @include('layouts.navigation')

            @if(session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 sm:mt-6">
                    <div class="bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] px-4 py-3 rounded-xl shadow-sm text-xs sm:text-sm">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <main>
                @yield('content')
            </main>
        </div>

        <!-- Professional Footer -->
        <footer class="bg-[#25364A] text-[#FFFDF7] mt-16 sm:mt-20 pt-12 sm:pt-16 pb-8 sm:pb-12 border-t border-[#25364A]/90">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 sm:gap-10">
                <div>
                    <h3 class="text-lg sm:text-xl font-bold tracking-wide text-[#F5C95C] mb-3 sm:mb-4">Paws & Claws</h3>
                    <p class="text-xs sm:text-sm text-[#FFFDF7]/80 leading-relaxed">
                        Offering elite grooming, holistic boarding, and bespoke spa care for dogs, cats, rabbits, and birds across the USA.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold text-[#F5C95C] mb-3 sm:mb-4 text-sm sm:text-base">Boutique Navigation</h4>
                    <ul class="space-y-2 text-xs sm:text-sm text-[#FFFDF7]/80">
                        <li><a href="{{ route('home') }}" class="hover:text-[#F5C95C] transition">Home Sanctuary</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#F5C95C] transition">Our Philosophy</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-[#F5C95C] transition">Services & Spa</a></li>
                        <li><a href="{{ route('pricing') }}" class="hover:text-[#F5C95C] transition">Rate Card</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-[#F5C95C] mb-3 sm:mb-4 text-sm sm:text-base">Client Concierge</h4>
                    <ul class="space-y-2 text-xs sm:text-sm text-[#FFFDF7]/80">
                        <li><a href="{{ route('reviews') }}" class="hover:text-[#F5C95C] transition">Client Testimonials</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#F5C95C] transition">Contact & Locations</a></li>
                        <li><a href="{{ route('booking.create') }}" class="hover:text-[#F5C95C] transition">Book Appointment</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-[#F5C95C] mb-3 sm:mb-4 text-sm sm:text-base">Sanctuary Hours</h4>
                    <p class="text-xs sm:text-sm text-[#FFFDF7]/80 mb-1.5 sm:mb-2">Mon - Sat: 8:00 AM - 7:00 PM</p>
                    <p class="text-xs sm:text-sm text-[#FFFDF7]/80 mb-3 sm:mb-4">Sunday: By Special Appointment</p>
                    <p class="text-xs sm:text-sm text-[#F5C95C] font-medium">(800) 555-PAWS</p>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 sm:mt-12 pt-6 border-t border-white/10 text-center text-[11px] sm:text-xs text-[#FFFDF7]/60">
                &copy; {{ date('Y') }} Paws & Claws Boutique Pet Services LLC. All Rights Reserved. Designed for USA Pet Parents.
            </div>
        </footer>
    </div>
</body>
</html>