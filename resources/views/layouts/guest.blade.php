<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Paws & Claws Boutique') }} - Sign In</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
</head>
<body class="bg-[#FFFDF7] text-[#25364A] font-sans antialiased min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
    
    <!-- Brand Logo / Header Link -->
    <div class="mb-6 text-center">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-2xl font-bold tracking-tight text-[#5B8DB8]">
            <span class="w-10 h-10 rounded-full bg-[#F5C95C] flex items-center justify-center text-[#25364A] shadow-sm font-serif font-bold text-sm">
                P&C
            </span>
            <span>Paws & Claws</span>
        </a>
    </div>

    <!-- Main Content (Login/Register Card) -->
    <div class="w-full max-w-md">
        @yield('content')
        
        {{-- If using Laravel Breeze Component Slot --}}
        {{ $slot ?? '' }}
    </div>

    <!-- Simple Footer Link -->
    <div class="mt-8 text-center text-xs text-[#25364A]/60">
        <a href="{{ route('home') }}" class="hover:text-[#5B8DB8] transition font-medium">&larr; Back to Home Sanctuary</a>
    </div>

</body>
</html>