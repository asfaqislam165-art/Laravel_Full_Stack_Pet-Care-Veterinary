@extends('layouts.admin')

@section('title', 'Inquiry Messages')

@section('content')
<div class="bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-xl sm:text-2xl font-serif font-bold text-[#25364A]">Client Inquiries</h2>
        <p class="text-xs text-[#25364A]/70 mt-1">Manage contact messages and inquiries sent by visitors.</p>
    </div>

    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="mb-6 p-3.5 sm:p-4 bg-[#F5C95C]/20 border border-[#F5C95C]/50 text-[#25364A] rounded-xl text-xs sm:text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <!-- Responsive Table Container -->
    <div class="overflow-x-auto -mx-5 sm:mx-0">
        <div class="inline-block min-w-full align-middle px-5 sm:px-0">
            <table class="min-w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-[#5B8DB8]/20 text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] font-semibold bg-[#FFFDF7]">
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Date</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Sender</th>
                        <th class="py-3 px-3 sm:px-4 whitespace-nowrap">Subject</th>
                        <th class="py-3 px-3 sm:px-4 text-right whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#5B8DB8]/10 text-xs sm:text-sm text-[#25364A]">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-[#FFFDF7]/60 transition">
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-[11px] sm:text-xs font-mono text-[#5B8DB8] whitespace-nowrap">{{ $msg->created_at->format('M d, Y') }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 font-medium text-[#25364A] whitespace-nowrap">
                                {{ $msg->name }} <br>
                                <span class="text-[11px] sm:text-xs text-[#25364A]/60 font-normal">{{ $msg->email }}</span>
                            </td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-[#25364A] font-medium whitespace-nowrap">{{ $msg->subject }}</td>
                            <td class="py-3.5 px-3 sm:py-4 sm:px-4 text-right whitespace-nowrap space-x-1">
                                <!-- Optional View Button (If show route exists) -->
                                @if (Route::has('admin.messages.show'))
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="inline-block text-[11px] sm:text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] px-3 py-1.5 rounded-lg font-semibold hover:bg-[#5B8DB8] hover:text-[#FFFDF7] transition shadow-sm">
                                        View
                                    </a>
                                @endif

                                <!-- Delete Form -->
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[11px] sm:text-xs bg-rose-100 text-rose-700 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-200 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-8 text-[#25364A]/60 text-xs sm:text-sm">
                                No inquiry messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        @if(isset($messages) && method_exists($messages, 'links'))
            {{ $messages->links() }}
        @endif
    </div>
</div>
@endsection