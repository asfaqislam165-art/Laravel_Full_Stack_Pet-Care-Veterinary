@extends('layouts.app')

@section('content')
<div class="py-10 sm:py-14 md:py-20 bg-[#FFFDF7] min-h-[70vh] flex items-center">
    <div class="w-full max-w-2xl mx-auto px-4 sm:px-6">

        <div class="bg-white/80 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-3xl p-5 sm:p-8 md:p-10 shadow-xl">

            <!-- Success Icon -->
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-[#F5C95C]/20 rounded-full flex items-center justify-center mx-auto mb-5 sm:mb-6 text-[#5B8DB8] text-xl sm:text-2xl font-bold">
                ✓
            </div>

            <!-- Heading -->
            <h1 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#25364A] mb-2 text-center">
                Booking Confirmed!
            </h1>

            <p class="text-xs sm:text-sm text-[#25364A]/70 mb-6 sm:mb-8 text-center leading-relaxed">
                Thank you for choosing Paws & Claws Boutique. We have logged your request.
            </p>

            <!-- Booking Details -->
            <div class="bg-[#FFFDF7] rounded-2xl p-4 sm:p-6 mb-6 sm:mb-8 border border-[#5B8DB8]/20 text-xs sm:text-sm">

                <!-- Reference -->
                <div class="flex flex-col gap-1 pb-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <span class="text-[#25364A]/70 font-medium">Reference #:</span>
                    <span class="font-bold text-[#5B8DB8] break-all">
                        #PCB-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                    </span>
                </div>

                <!-- Pet -->
                <div class="flex flex-col gap-1 py-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <span class="text-[#25364A]/70 font-medium">Pet Name & Type:</span>
                    <span class="font-semibold text-[#25364A] text-right sm:text-left">
                        {{ $booking->pet_name }} ({{ $booking->pet_type }})
                    </span>
                </div>

                <!-- Service -->
                <div class="flex flex-col gap-1 py-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <span class="text-[#25364A]/70 font-medium">Service Reserved:</span>
                    <span class="font-semibold text-[#25364A] text-right sm:text-left">
                        {{ $booking->pricing->package_name }}
                    </span>
                </div>

                <!-- Date & Time -->
                <div class="flex flex-col gap-1 py-3 border-b border-[#5B8DB8]/10 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <span class="text-[#25364A]/70 font-medium">Date & Time:</span>
                    <span class="font-semibold text-[#25364A] text-right sm:text-left">
                        {{ $booking->appointment_date }} at {{ $booking->appointment_time }}
                    </span>
                </div>

                <!-- Status -->
                <div class="flex flex-col gap-2 pt-3 sm:flex-row sm:items-center sm:justify-between sm:gap-4">
                    <span class="text-[#25364A]/70 font-medium">Status:</span>

                    <div>
                        <span class="inline-block bg-[#F5C95C]/20 text-[#25364A] text-xs px-3 py-1.5 rounded-full font-semibold">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div class="text-center">
                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center justify-center w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-8 py-3 rounded-xl font-semibold hover:bg-[#5B8DB8]/90 transition shadow-sm text-sm sm:text-base"
                >
                    Return to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection