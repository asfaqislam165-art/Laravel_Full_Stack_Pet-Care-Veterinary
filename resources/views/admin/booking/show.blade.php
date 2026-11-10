@extends('layouts.admin')

@section('title', 'Reservation Details')

@section('content')
<div class="max-w-4xl mx-auto bg-white/90 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6 pb-4 border-b border-[#5B8DB8]/20">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#5B8DB8]">Reservation #{{ $booking->id }}</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Detailed information about the client appointment and pet service.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.bookings.index') }}" class="inline-block text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-4 py-2 rounded-xl font-semibold hover:bg-[#5B8DB8]/20 transition whitespace-nowrap">
                &larr; Back to List
            </a>
            
            <!-- Delete Booking Form -->
            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs bg-rose-50 text-rose-700 border border-rose-200 px-4 py-2 rounded-xl font-semibold hover:bg-rose-100 transition whitespace-nowrap">
                    Delete Booking
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs sm:text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Info Grids -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 mb-6 sm:mb-8">
        <!-- Customer Info -->
        <div class="bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
            <h3 class="text-xs sm:text-sm uppercase font-semibold text-[#5B8DB8] mb-3 sm:mb-4 tracking-wider">Client Information</h3>
            <ul class="space-y-2.5 sm:space-y-3 text-xs sm:text-sm text-[#25364A]/80">
                <li class="break-words"><strong class="text-[#25364A]">Name:</strong> {{ $booking->customer_name }}</li>
                <li class="break-words"><strong class="text-[#25364A]">Email:</strong> {{ $booking->email ?? 'N/A' }}</li>
                <li class="break-words"><strong class="text-[#25364A]">Phone:</strong> {{ $booking->phone ?? 'N/A' }}</li>
                <li class="break-words">
                    <strong class="text-[#25364A]">Current Status:</strong> 
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold ml-1
                        {{ $booking->status === 'Confirmed' ? 'bg-emerald-100 text-emerald-800' : '' }}
                        {{ $booking->status === 'Pending' ? 'bg-[#F5C95C]/30 text-[#25364A]' : '' }}
                        {{ $booking->status === 'Completed' ? 'bg-[#5B8DB8]/20 text-[#5B8DB8]' : '' }}
                        {{ $booking->status === 'Cancelled' ? 'bg-rose-100 text-rose-800' : '' }}">
                        {{ ucfirst($booking->status ?? 'pending') }}
                    </span>
                </li>
            </ul>
        </div>

        <!-- Pet & Service Info -->
        <div class="bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
            <h3 class="text-xs sm:text-sm uppercase font-semibold text-[#5B8DB8] mb-3 sm:mb-4 tracking-wider">Pet & Service Details</h3>
            <ul class="space-y-2.5 sm:space-y-3 text-xs sm:text-sm text-[#25364A]/80">
                <li class="break-words"><strong class="text-[#25364A]">Pet Name:</strong> {{ $booking->pet_name }} ({{ $booking->pet_type }})</li>
                <li class="break-words"><strong class="text-[#25364A]">Package:</strong> {{ $booking->pricing->package_name ?? 'N/A' }}</li>
                <li class="break-words"><strong class="text-[#25364A]">Service Price:</strong> ${{ number_format($booking->pricing->price ?? 0, 2) }}</li>
                <li class="break-words"><strong class="text-[#25364A]">Appointment Date:</strong> {{ $booking->appointment_date }} at {{ $booking->appointment_time ?? 'N/A' }}</li>
            </ul>
        </div>
    </div>

    <!-- Additional Client Message (If any) -->
    @if(!empty($booking->message))
    <div class="mb-6 sm:mb-8 bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
        <h3 class="text-xs sm:text-sm uppercase font-semibold text-[#5B8DB8] mb-2 tracking-wider">Additional Message from Client</h3>
        <p class="text-xs sm:text-sm text-[#25364A]/80 italic bg-white p-3.5 rounded-xl border border-[#5B8DB8]/10">
            "{{ $booking->message }}"
        </p>
    </div>
    @endif

    <!-- Status Update Form -->
    <div class="bg-[#FFFDF7] p-5 sm:p-6 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
        <h3 class="text-xs sm:text-sm uppercase font-semibold text-[#5B8DB8] mb-3 sm:mb-4 tracking-wider">Update Reservation Status</h3>
        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
            @csrf
            @method('PATCH')
            
            <select name="status" class="w-full sm:w-auto rounded-xl border-[#5B8DB8]/30 text-xs sm:text-sm px-4 py-2.5 bg-white text-[#25364A] focus:ring-[#5B8DB8] focus:border-[#5B8DB8]">
                <option value="Pending" {{ $booking->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ $booking->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Completed" {{ $booking->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $booking->status === 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button type="submit" class="w-full sm:w-auto bg-[#5B8DB8] text-[#FFFDF7] px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-[#5B8DB8]/90 transition text-center shadow-sm">
                Update Status
            </button>
        </form>
    </div>
</div>
@endsection