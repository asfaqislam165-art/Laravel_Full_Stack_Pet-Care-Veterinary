@extends('layouts.app')

@section('content')
<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7] min-h-screen">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Dashboard Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4 mb-6 sm:mb-8">
            <div>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-[#5B8DB8]">
                    Client Dashboard
                </h1>

                <p class="mt-1 text-xs sm:text-sm text-[#25364A]/70">
                    Welcome back, {{ auth()->user()->name }}
                </p>
            </div>

            <a
                href="{{ route('booking.create') }}"
                class="inline-flex items-center justify-center w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-5 py-3 sm:py-2.5 rounded-xl font-medium shadow-sm hover:bg-[#5B8DB8]/90 active:scale-[0.99] transition text-sm"
            >
                + New Reservation
            </a>
        </div>

        <!-- Bookings Card -->
        <div class="bg-white/80 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-4 sm:p-6 shadow-sm overflow-hidden">
            <h2 class="text-base sm:text-lg md:text-xl font-serif font-bold text-[#25364A] mb-4 sm:mb-5">
                My Bookings History
            </h2>

            @if($bookings->isEmpty())
                <div class="py-10 sm:py-12 text-center">
                    <p class="text-xs sm:text-sm text-[#25364A]/60">
                        No appointments found. Book your first service today!
                    </p>

                    <a
                        href="{{ route('booking.create') }}"
                        class="inline-flex items-center justify-center mt-4 bg-[#5B8DB8] text-[#FFFDF7] px-5 py-2.5 rounded-xl font-medium shadow-sm hover:bg-[#5B8DB8]/90 transition text-sm"
                    >
                        Book Appointment
                    </a>
                </div>
            @else
                <!-- Mobile: Booking Cards -->
                <div class="md:hidden space-y-3">
                    @foreach($bookings as $b)
                        <div class="bg-[#FFFDF7] border border-[#5B8DB8]/15 rounded-2xl p-4 shadow-sm">
                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <p class="text-[11px] font-mono text-[#5B8DB8]">
                                        #PCB-{{ str_pad($b->id, 5, '0', STR_PAD_LEFT) }}
                                    </p>

                                    <h3 class="mt-1 text-sm font-semibold text-[#25364A] truncate">
                                        {{ $b->pet_name }}
                                        <span class="text-xs font-normal text-[#25364A]/60">
                                            ({{ $b->pet_type }})
                                        </span>
                                    </h3>
                                </div>

                                <span class="shrink-0 px-2.5 py-1 rounded-full text-[10px] sm:text-xs font-semibold
                                    {{ $b->status === 'Confirmed' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                    {{ $b->status === 'Pending' ? 'bg-[#F5C95C]/30 text-[#25364A]' : '' }}
                                    {{ $b->status === 'Completed' ? 'bg-[#5B8DB8]/20 text-[#5B8DB8]' : '' }}
                                    {{ $b->status === 'Cancelled' ? 'bg-rose-100 text-rose-800' : '' }}
                                ">
                                    {{ $b->status }}
                                </span>
                            </div>

                            <div class="mt-3 pt-3 border-t border-[#5B8DB8]/10 space-y-1.5 text-xs">
                                <div class="flex justify-between gap-3">
                                    <span class="text-[#25364A]/60">Service</span>
                                    <span class="font-medium text-[#25364A] text-right">
                                        {{ $b->pricing->package_name }}
                                    </span>
                                </div>

                                <div class="flex justify-between gap-3">
                                    <span class="text-[#25364A]/60">Date & Time</span>
                                    <span class="font-medium text-[#25364A] text-right">
                                        {{ $b->appointment_date }}<br class="sm:hidden">
                                        {{ $b->appointment_time }}
                                    </span>
                                </div>

                                <div class="flex justify-between gap-3">
                                    <span class="text-[#25364A]/60">Price</span>
                                    <span class="font-semibold text-[#25364A]">
                                        ${{ number_format($b->pricing->price, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tablet/Desktop: Table -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-left text-sm text-[#25364A]">
                        <thead class="bg-[#FFFDF7] text-[11px] uppercase font-semibold text-[#5B8DB8] border-b border-[#5B8DB8]/20">
                            <tr>
                                <th class="px-4 py-3 whitespace-nowrap">Ref #</th>
                                <th class="px-4 py-3 whitespace-nowrap">Pet Name</th>
                                <th class="px-4 py-3 whitespace-nowrap">Service</th>
                                <th class="px-4 py-3 whitespace-nowrap">Date & Time</th>
                                <th class="px-4 py-3 whitespace-nowrap">Price</th>
                                <th class="px-4 py-3 whitespace-nowrap">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#5B8DB8]/10">
                            @foreach($bookings as $b)
                                <tr class="hover:bg-[#FFFDF7]/60 transition">
                                    <td class="px-4 py-4 font-mono text-xs text-[#5B8DB8] whitespace-nowrap">
                                        #PCB-{{ str_pad($b->id, 5, '0', STR_PAD_LEFT) }}
                                    </td>

                                    <td class="px-4 py-4 font-semibold whitespace-nowrap">
                                        {{ $b->pet_name }}
                                        <span class="text-xs font-normal text-[#25364A]/60">
                                            ({{ $b->pet_type }})
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap">
                                        {{ $b->pricing->package_name }}
                                    </td>

                                    <td class="px-4 py-4 text-[#25364A]/80 whitespace-nowrap">
                                        {{ $b->appointment_date }} at {{ $b->appointment_time }}
                                    </td>

                                    <td class="px-4 py-4 font-semibold whitespace-nowrap">
                                        ${{ number_format($b->pricing->price, 2) }}
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="inline-block px-2.5 py-1 rounded-full text-xs font-semibold
                                            {{ $b->status === 'Confirmed' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                            {{ $b->status === 'Pending' ? 'bg-[#F5C95C]/30 text-[#25364A]' : '' }}
                                            {{ $b->status === 'Completed' ? 'bg-[#5B8DB8]/20 text-[#5B8DB8]' : '' }}
                                            {{ $b->status === 'Cancelled' ? 'bg-rose-100 text-rose-800' : '' }}
                                        ">
                                            {{ $b->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection