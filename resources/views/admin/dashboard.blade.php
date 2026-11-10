@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<!-- Sidebar Hidden Toggle Checkbox -->
<input type="checkbox" id="sidebar-toggle" class="peer sr-only" />

<!-- Mobile Overlay Backdrop -->
<label
    for="sidebar-toggle"
    aria-hidden="true"
    class="fixed inset-0 z-30 hidden bg-[#25364A]/50 backdrop-blur-xs peer-checked:block lg:hidden transition-all"
></label>

<div class="flex min-h-screen overflow-hidden bg-[#FFFDF7]">
    <!-- Sidebar Component -->
    <div
        id="dashboard-sidebar"
        class="fixed inset-y-0 start-0 z-40 flex w-64 -translate-x-full flex-col justify-between overflow-y-auto border-e border-[#5B8DB8]/20 bg-white transition-transform duration-300 peer-checked:translate-x-0 lg:static lg:shrink-0 lg:translate-x-0 max-lg:rtl:translate-x-full shadow-sm"
    >
        <div class="p-5">
            <!-- Brand Logo -->
            <div class="flex items-center justify-center h-12 w-full rounded-xl bg-[#5B8DB8]/10 text-xs font-serif font-bold text-[#5B8DB8] border border-[#5B8DB8]/20 tracking-wider">
                🐾 PAWS & CLAWS ADMIN
            </div>

            <!-- Navigation Links -->
            <nav aria-label="Dashboard" class="mt-6">
                <ul class="space-y-1.5">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rounded-xl bg-[#5B8DB8] px-4 py-2.5 text-xs font-semibold text-[#FFFDF7] shadow-sm">
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-xs font-medium text-[#25364A]/80 transition-colors hover:bg-[#5B8DB8]/10 hover:text-[#5B8DB8]">
                            Reservations
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pricing.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-xs font-medium text-[#25364A]/80 transition-colors hover:bg-[#5B8DB8]/10 hover:text-[#5B8DB8]">
                            Packages & Pricing
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-xs font-medium text-[#25364A]/80 transition-colors hover:bg-[#5B8DB8]/10 hover:text-[#5B8DB8]">
                            Client Inquiries
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.reviews.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-xs font-medium text-[#25364A]/80 transition-colors hover:bg-[#5B8DB8]/10 hover:text-[#5B8DB8]">
                            Testimonials
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.edit', 1) }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-xs font-medium text-[#25364A]/80 transition-colors hover:bg-[#5B8DB8]/10 hover:text-[#5B8DB8]">
                            Settings
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Sidebar User Profile Footer -->
        <div class="sticky inset-x-0 bottom-0 border-t border-[#5B8DB8]/20 bg-[#FFFDF7]/80 p-3">
            <div class="flex items-center gap-3 p-2 rounded-xl bg-white border border-[#5B8DB8]/10 shadow-xs">
                <div class="size-9 rounded-full bg-[#5B8DB8]/20 text-[#5B8DB8] flex items-center justify-center font-bold text-xs">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <strong class="block text-xs font-bold text-[#25364A] truncate">{{ Auth::user()->name ?? 'Admin Concierge' }}</strong>
                    <span class="text-[10px] text-[#5B8DB8] truncate block">{{ Auth::user()->email ?? 'admin@pawsclaws.com' }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Wrapper -->
    <div class="flex flex-1 flex-col overflow-y-auto">
        <!-- Top Navigation Header -->
        <header class="flex items-center justify-between border-b border-[#5B8DB8]/20 bg-white/80 backdrop-blur-sm px-6 py-4 sticky top-0 z-20">
            <div class="flex items-center gap-4">
                <label
                    for="sidebar-toggle"
                    id="sidebar-toggle-label"
                    aria-expanded="false"
                    aria-controls="dashboard-sidebar"
                    class="cursor-pointer rounded-xl p-2 text-[#5B8DB8] bg-[#5B8DB8]/10 transition-colors hover:bg-[#5B8DB8] hover:text-[#FFFDF7] lg:hidden"
                >
                    <span class="sr-only">Toggle menu</span>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
                <h1 class="text-lg sm:text-xl font-serif font-bold text-[#25364A]">Dashboard Overview</h1>
            </div>

            <div class="flex items-center gap-3">
                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="hidden sm:inline-flex items-center gap-2 rounded-xl bg-[#5B8DB8]/10 border border-[#5B8DB8]/30 px-3.5 py-2 text-xs font-semibold text-[#5B8DB8] transition hover:bg-[#5B8DB8] hover:text-[#FFFDF7]"
                >
                    <span>Visit Website</span>
                </a>
                <a
                    href="{{ route('admin.bookings.index') }}"
                    class="rounded-xl bg-[#5B8DB8] px-4 py-2 text-xs font-bold text-[#FFFDF7] transition hover:bg-[#5B8DB8]/90 shadow-sm whitespace-nowrap"
                >
                    Manage Bookings
                </a>
            </div>
        </header>

        <!-- Main Dashboard View -->
        <main class="flex-1 space-y-6 p-4 sm:p-6 lg:p-8">
            <!-- Real Database KPI Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Total Reservations -->
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm">
                    <span class="text-[11px] uppercase font-semibold tracking-wider text-[#25364A]/70">Total Reservations</span>
                    <div class="text-2xl sm:text-3xl font-serif font-bold text-[#5B8DB8] mt-2">{{ $totalBookings ?? 0 }}</div>
                </div>
                <!-- Pending Bookings -->
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm">
                    <span class="text-[11px] uppercase font-semibold tracking-wider text-amber-600">Pending Review</span>
                    <div class="text-2xl sm:text-3xl font-serif font-bold text-amber-700 mt-2">{{ $pendingBookings ?? 0 }}</div>
                </div>
                <!-- Confirmed Bookings -->
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm">
                    <span class="text-[11px] uppercase font-semibold tracking-wider text-emerald-600">Confirmed Appointments</span>
                    <div class="text-2xl sm:text-3xl font-serif font-bold text-emerald-700 mt-2">{{ $confirmedBookings ?? 0 }}</div>
                </div>
                <!-- Completed Bookings -->
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm">
                    <span class="text-[11px] uppercase font-semibold tracking-wider text-[#5B8DB8]">Completed Services</span>
                    <div class="text-2xl sm:text-3xl font-serif font-bold text-[#5B8DB8] mt-2">{{ $completedBookings ?? 0 }}</div>
                </div>
            </div>

            <!-- Quick Navigation Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-[11px] uppercase font-semibold text-[#25364A]/70">Active Packages</span>
                        <div class="text-xl font-bold text-[#5B8DB8] mt-1">{{ $totalPricings ?? 0 }}</div>
                    </div>
                    <a href="{{ route('admin.pricing.index') }}" class="text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition">Manage</a>
                </div>
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-[11px] uppercase font-semibold text-[#25364A]/70">Client Inquiries</span>
                        <div class="text-xl font-bold text-[#5B8DB8] mt-1">{{ $totalMessages ?? 0 }}</div>
                    </div>
                    <a href="{{ route('admin.messages.index') }}" class="text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition">View</a>
                </div>
                <div class="bg-white/85 border border-[#5B8DB8]/20 p-5 rounded-2xl shadow-sm flex items-center justify-between">
                    <div>
                        <span class="text-[11px] uppercase font-semibold text-[#25364A]/70">Testimonials</span>
                        <div class="text-xl font-bold text-[#5B8DB8] mt-1">{{ $totalReviews ?? 0 }}</div>
                    </div>
                    <a href="{{ route('admin.reviews.index') }}" class="text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition">Manage</a>
                </div>
            </div>

            <!-- Real Database Recent Bookings Table -->
            <div class="rounded-2xl border border-[#5B8DB8]/20 bg-white/85 p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-bold text-[#25364A] uppercase tracking-wider">Recent Real Bookings</h2>
                    <a href="{{ route('admin.bookings.index') }}" class="text-xs text-[#5B8DB8] font-bold hover:underline">View All &rarr;</a>
                </div>

                <div class="overflow-x-auto -mx-6 sm:mx-0">
                    <div class="inline-block min-w-full align-middle px-6 sm:px-0">
                        <table class="min-w-full divide-y divide-[#5B8DB8]/10 text-xs sm:text-sm">
                            <thead>
                                <tr class="text-left font-semibold text-[#5B8DB8] bg-[#FFFDF7] uppercase text-[10px] tracking-wider">
                                    <th class="px-4 py-3 whitespace-nowrap">Ref ID</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Customer Name</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Pet Details</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Package Service</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Date</th>
                                    <th class="px-4 py-3 whitespace-nowrap">Status</th>
                                    <th class="px-4 py-3 whitespace-nowrap text-right">Action</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-[#5B8DB8]/10 text-[#25364A]">
                                @forelse($recentBookings ?? [] as $booking)
                                    <tr class="hover:bg-[#FFFDF7]/60 transition">
                                        <td class="px-4 py-3.5 whitespace-nowrap font-mono font-bold text-[#5B8DB8]">#{{ $booking->id }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap font-semibold">{{ $booking->customer_name }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap text-[#25364A]/80">{{ $booking->pet_name }} <span class="text-[11px] text-[#25364A]/60">({{ $booking->pet_type }})</span></td>
                                        <td class="px-4 py-3.5 whitespace-nowrap font-medium">{{ $booking->pricing->package_name ?? 'Custom Service' }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap font-mono text-[#5B8DB8]">{{ $booking->appointment_date }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap">
                                            <span class="rounded-full px-3 py-1 text-[11px] font-semibold inline-block
                                                {{ strtolower($booking->status) === 'confirmed' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                                {{ strtolower($booking->status) === 'pending' ? 'bg-[#F5C95C]/30 text-[#25364A]' : '' }}
                                                {{ strtolower($booking->status) === 'completed' ? 'bg-[#5B8DB8]/20 text-[#5B8DB8]' : '' }}
                                                {{ strtolower($booking->status) === 'cancelled' ? 'bg-rose-100 text-rose-800' : '' }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3.5 whitespace-nowrap text-right">
                                            <a href="{{ route('admin.bookings.show', $booking->id) }}" class="inline-flex items-center space-x-1 text-xs bg-[#5B8DB8] text-[#FFFDF7] px-3.5 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8]/90 transition shadow-sm">
                                                <span>View</span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-8 text-[#25364A]/60 text-xs sm:text-sm">
                                            No recent reservations found in the database.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    // Sidebar Mobile Toggle Script
    const sidebarToggleCheckbox = document.getElementById('sidebar-toggle')
    const sidebarToggleLabel = document.getElementById('sidebar-toggle-label')

    if(sidebarToggleCheckbox && sidebarToggleLabel) {
        sidebarToggleCheckbox.addEventListener('change', () => {
            sidebarToggleLabel.setAttribute('aria-expanded', String(sidebarToggleCheckbox.checked))
        })
    }
</script>
@endsection