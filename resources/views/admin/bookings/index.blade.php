@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')
<div class="bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Page Header & Search/Filter Bar -->
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Customer Bookings</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Manage, approve, or update status for client appointments.</p>
        </div>

        <!-- Optional Search & Status Filter Form -->
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
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.bookings.index') }}" class="text-xs text-[#5B8DB8] font-semibold underline hover:text-[#25364A] px-1 py-2 whitespace-nowrap">Reset</a>
            @endif
        </form>
    </div>

    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bookings Table Container -->
    <div class="overflow-x-auto -mx-5 sm:mx-0">
        <div class="inline-block min-w-full align-middle px-5 sm:px-0">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#5B8DB8]/20 text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] font-semibold bg-[#FFFDF7]">
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">ID</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Client Name</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Service / Package</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Date & Time</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Status</th>
                        <th class="py-3 px-3 sm:px-4 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#5B8DB8]/10 text-xs sm:text-sm text-[#25364A]">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-[#FFFDF7]/60 transition">
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-mono text-xs font-bold text-[#5B8DB8] whitespace-nowrap">#{{ $booking->id }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-semibold text-[#25364A] whitespace-nowrap">{{ $booking->user->name ?? ($booking->customer_name ?? 'Guest') }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-medium text-[#25364A]/90 whitespace-nowrap">{{ $booking->pricing->package_name ?? 'Custom Service' }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-[11px] sm:text-xs text-[#25364A]/70 font-mono whitespace-nowrap">{{ $booking->appointment_date ?? 'N/A' }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 whitespace-nowrap">
                                <span class="inline-block px-2.5 py-1 rounded-full text-[11px] sm:text-xs font-semibold 
                                    {{ $booking->status == 'confirmed' || $booking->status == 'Confirmed' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                    {{ $booking->status == 'cancelled' || $booking->status == 'Cancelled' ? 'bg-rose-100 text-rose-800' : '' }}
                                    {{ $booking->status == 'completed' || $booking->status == 'Completed' ? 'bg-[#5B8DB8]/20 text-[#5B8DB8]' : '' }}
                                    {{ $booking->status == 'pending' || $booking->status == 'Pending' || !$booking->status ? 'bg-[#F5C95C]/30 text-[#25364A]' : '' }}">
                                    {{ ucfirst($booking->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="inline-block text-[11px] sm:text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3.5 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition shadow-sm">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-[#25364A]/60 text-xs sm:text-sm">
                                No bookings found in the system yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        @if(isset($bookings) && method_exists($bookings, 'links'))
            {{ $bookings->links() }}
        @endif
    </div>
</div>
@endsection