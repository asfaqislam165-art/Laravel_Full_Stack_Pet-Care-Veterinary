@extends('layouts.admin')

@section('title', 'Manage Reviews')

@section('content')
<div class="bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Page Header & Action -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Customer Reviews</h2>
            <p class="text-xs text-[#25364A]/70 mt-1">Manage client feedback, ratings, and testimonials shown on the website.</p>
        </div>
        <a href="{{ route('admin.reviews.create') }}" class="w-full sm:w-auto text-center bg-[#5B8DB8] text-[#FFFDF7] px-5 py-2.5 rounded-xl text-xs font-semibold hover:bg-[#5B8DB8]/90 transition shadow-sm whitespace-nowrap">
            + Add New Review
        </a>
    </div>

    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Reviews Table Container -->
    <div class="overflow-x-auto -mx-5 sm:mx-0">
        <div class="inline-block min-w-full align-middle px-5 sm:px-0">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#5B8DB8]/20 text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] font-semibold bg-[#FFFDF7]">
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">ID</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Client Name</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Rating</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Comment</th>
                        <th class="py-3 px-3 sm:px-4 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#5B8DB8]/10 text-xs sm:text-sm text-[#25364A]">
                    @forelse($reviews as $review)
                        <tr class="hover:bg-[#FFFDF7]/60 transition">
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-mono text-xs font-bold text-[#5B8DB8] whitespace-nowrap">#{{ $review->id }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-semibold text-[#25364A] whitespace-nowrap">{{ $review->customer_name ?? 'Guest Client' }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-bold text-[#25364A] whitespace-nowrap">
                                <span class="text-[#F5C95C]">★</span> {{ $review->rating }} / 5
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-[11px] sm:text-xs text-[#25364A]/70 max-w-xs truncate">
                                {{ Str::limit($review->review_text, 50) }}
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-right whitespace-nowrap space-x-1.5">
                                <a href="{{ route('admin.reviews.edit', $review->id) }}" class="inline-block text-[11px] sm:text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition shadow-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this review?');">
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
                            <td colspan="5" class="text-center py-8 text-[#25364A]/60 text-xs sm:text-sm">
                                No reviews found in the system yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        @if(isset($reviews) && method_exists($reviews, 'links'))
            {{ $reviews->links() }}
        @endif
    </div>
</div>
@endsection