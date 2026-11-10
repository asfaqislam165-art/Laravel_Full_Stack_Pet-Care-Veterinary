@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
<div class="bg-white/90 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-4 sm:p-8 shadow-sm">
    <!-- Header & Search/Filter Section -->
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#5B8DB8]">Customer Bookings</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Manage, approve, or update status for client appointments.</p>
        </div>

        <!-- Search & Filter Form -->
        <form method="GET" action="{{ route('admin.bookings.index') }}" class="flex flex-wrap sm:flex-nowrap items-center gap-2 w-full lg:w-auto">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Search client or pet..." 
                class="bg-white text-xs rounded-xl border border-[#5B8DB8]/30 px-3.5 py-2.5 text-[#25364A] focus:outline-none focus:ring-2 focus:ring-[#5B8DB8]/30 w-full sm:w-52 transition"
            />
            <select 
                name="status" 
                onchange="this.form.submit()" 
                class="bg-white text-xs rounded-xl border border-[#5B8DB8]/30 px-3.5 py-2.5 text-[#25364A] focus:outline-none focus:ring-2 focus:ring-[#5B8DB8]/30 w-full sm:w-auto transition"
            >
                <option value="">All Statuses</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Confirmed" {{ request('status') == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.bookings.index') }}" class="text-xs text-[#5B8DB8] font-semibold underline hover:text-[#25364A] px-1 py-2 whitespace-nowrap">Reset</a>
            @endif
        </form>
    </div>

    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs sm:text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Responsive Table Container -->
    <div class="overflow-x-auto -mx-4 sm:mx-0">
        <div class="inline-block min-w-full align-middle px-4 sm:px-0">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#5B8DB8]/20 text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] font-semibold bg-[#FFFDF7]">
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">ID</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Client Name</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Pet Info</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Service / Package</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Date & Time</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Status</th>
                        <th class="py-3 px-3 sm:px-4 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#5B8DB8]/10 text-xs sm:text-sm text-[#25364A]">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-[#FFFDF7]/70 transition">
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-mono font-bold text-[#5B8DB8] whitespace-nowrap">#{{ $booking->id }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-semibold whitespace-nowrap">
                                {{ $booking->customer_name ?? ($booking->user->name ?? 'Guest Client') }}
                                <div class="text-[10px] text-[#25364A]/60 font-normal">{{ $booking->email }}</div>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 whitespace-nowrap">
                                <span class="font-medium text-[#25364A]">{{ $booking->pet_name ?? 'N/A' }}</span>
                                <span class="text-[10px] bg-[#5B8DB8]/10 text-[#5B8DB8] px-1.5 py-0.5 rounded ml-1 font-semibold">{{ $booking->pet_type ?? 'Pet' }}</span>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 whitespace-nowrap">{{ $booking->pricing->package_name ?? 'Custom Service' }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-[11px] sm:text-xs whitespace-nowrap">
                                {{ $booking->appointment_date ?? 'N/A' }}
                                <div class="text-[10px] text-[#25364A]/60">{{ $booking->appointment_time ?? '' }}</div>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 whitespace-nowrap">
                                <span class="inline-block px-2.5 py-1 rounded-full text-[11px] sm:text-xs font-semibold 
                                    {{ $booking->status === 'Confirmed' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                    {{ $booking->status === 'Pending' ? 'bg-[#F5C95C]/30 text-[#25364A]' : '' }}
                                    {{ $booking->status === 'Completed' ? 'bg-[#5B8DB8]/20 text-[#5B8DB8]' : '' }}
                                    {{ $booking->status === 'Cancelled' ? 'bg-rose-100 text-rose-800' : '' }}">
                                    {{ ucfirst($booking->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="inline-block text-[11px] sm:text-xs bg-[#5B8DB8] text-[#FFFDF7] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8]/90 transition shadow-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-[#25364A]/60 text-xs sm:text-sm">
                                No bookings found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        @if(method_exists($bookings, 'links'))
            {{ $bookings->links() }}
        @endif
    </div>
</div>
@endsection