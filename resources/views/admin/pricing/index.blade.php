@extends('layouts.admin')

@section('title', 'Manage Pricings')

@section('content')
<div class="bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Page Header & Action -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Pricing & Packages</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Manage luxury care offerings, prices, and package descriptions.</p>
        </div>
        <a href="{{ route('admin.pricing.create') }}" class="w-full sm:w-auto text-center bg-[#5B8DB8] text-[#FFFDF7] px-5 py-2.5 rounded-xl text-xs font-semibold hover:bg-[#5B8DB8]/90 transition shadow-sm whitespace-nowrap">
            + Add New Package
        </a>
    </div>

    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pricings Table Container -->
    <div class="overflow-x-auto -mx-5 sm:mx-0">
        <div class="inline-block min-w-full align-middle px-5 sm:px-0">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#5B8DB8]/20 text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] font-semibold bg-[#FFFDF7]">
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">ID</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Service Name</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Package Name</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Price</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Duration</th>
                        <th class="py-3 px-3 sm:px-4 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#5B8DB8]/10 text-xs sm:text-sm text-[#25364A]">
                    @forelse($pricings as $pricing)
                        <tr class="hover:bg-[#FFFDF7]/60 transition">
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-mono text-xs font-bold text-[#5B8DB8] whitespace-nowrap">#{{ $pricing->id }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-semibold whitespace-nowrap">
                                <span class="px-2.5 py-1 bg-[#5B8DB8]/10 text-[#5B8DB8] rounded-full text-[11px] sm:text-xs font-medium">
                                    {{ $pricing->service_name }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-serif font-bold text-[#25364A] whitespace-nowrap">{{ $pricing->package_name }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-bold text-[#5B8DB8] whitespace-nowrap">${{ number_format($pricing->price, 2) }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-[11px] sm:text-xs text-[#25364A]/70 whitespace-nowrap">{{ $pricing->duration }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-right whitespace-nowrap space-x-1.5">
                                <a href="{{ route('admin.pricing.edit', $pricing->id) }}" class="inline-block text-[11px] sm:text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition shadow-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.pricing.destroy', $pricing->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[11px] sm:text-xs bg-rose-50 text-rose-700 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition shadow-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-[#25364A]/60 text-xs sm:text-sm">
                                No pricing packages found. Click "+ Add New Package" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        @if(isset($pricings) && method_exists($pricings, 'links'))
            {{ $pricings->links() }}
        @endif
    </div>
</div>
@endsection