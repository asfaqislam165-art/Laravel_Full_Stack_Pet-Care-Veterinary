@extends('layouts.admin')

@section('title', 'Reservation Details')

@section('content')
<div class="max-w-4xl mx-auto bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6 pb-4 border-b border-[#5B8DB8]/10">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#5B8DB8]">Reservation #{{ $booking->id }}</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Detailed information about the client appointment and pet service.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.bookings.index') }}" class="inline-block text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-4 py-2 rounded-xl font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition whitespace-nowrap">
                &larr; Back to List
            </a>

            <!-- Delete Booking Button Form -->
            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs bg-rose-50 text-rose-700 border border-rose-200 px-4 py-2 rounded-xl font-semibold hover:bg-rose-100 transition whitespace-nowrap shadow-sm">
                    Delete Booking
                </button>
            </form>
        </div>
    </div>

    <!-- Alert Message -->
    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Information Grids -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 mb-6 sm:mb-8">
        <!-- Customer Info -->
        <div class="bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
            <h3 class="text-xs uppercase font-bold text-[#5B8DB8] mb-3 sm:mb-4 tracking-wider">Client Information</h3>
            <ul class="space-y-2.5 sm:space-y-3 text-xs sm:text-sm text-[#25364A]">
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Name:</strong> {{ $booking->customer_name ?? ($booking->user->name ?? 'Guest Client') }}</li>
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Email:</strong> {{ $booking->email ?? ($booking->user->email ?? 'N/A') }}</li>
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Phone:</strong> {{ $booking->phone ?? 'N/A' }}</li>
            </ul>
        </div>

        <!-- Pet & Service Info -->
        <div class="bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
            <h3 class="text-xs uppercase font-bold text-[#5B8DB8] mb-3 sm:mb-4 tracking-wider">Pet & Service Details</h3>
            <ul class="space-y-2.5 sm:space-y-3 text-xs sm:text-sm text-[#25364A]">
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Pet Name:</strong> {{ $booking->pet_name ?? 'N/A' }} <span class="text-[11px] sm:text-xs text-[#25364A]/60">({{ $booking->pet_type ?? 'Pet' }})</span></li>
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Package:</strong> {{ $booking->pricing->package_name ?? 'N/A' }}</li>
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Service Price:</strong> ${{ number_format($booking->pricing->price ?? 0, 2) }}</li>
                <li class="break-words"><strong class="font-semibold text-[#25364A]/70">Appointment Date:</strong> {{ $booking->appointment_date ?? 'N/A' }}</li>
            </ul>
        </div>
    </div>

    <!-- Status Update Form -->
    <div class="bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
        <h3 class="text-xs uppercase font-bold text-[#5B8DB8] mb-3 sm:mb-4 tracking-wider">Update Reservation Status</h3>
        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
            @csrf
            @method('PATCH')
            
            <select name="status" class="w-full sm:w-auto rounded-xl border-[#5B8DB8]/30 text-xs sm:text-sm px-4 py-2.5 bg-white text-[#25364A] focus:border-[#5B8DB8] focus:ring-[#5B8DB8]">
                <option value="Pending" {{ strtolower($booking->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ strtolower($booking->status) === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Completed" {{ strtolower($booking->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ strtolower($booking->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-[#5B8DB8]/90 transition shadow-sm text-center">
                Update Status
            </button>
        </form>
    </div>
</div>
@endsection