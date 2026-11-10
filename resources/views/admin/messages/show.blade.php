@extends('layouts.admin')

@section('title', 'Inquiry Details')

@section('content')
<div class="max-w-2xl mx-auto bg-white/85 border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-5 sm:p-8 shadow-sm">
    <!-- Header -->
    <div class="mb-6 pb-4 border-b border-[#5B8DB8]/10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <span class="text-[11px] sm:text-xs text-[#25364A]/60 font-mono">Received: {{ $msg->created_at->format('F d, Y - h:i A') }}</span>
            <h3 class="text-lg sm:text-xl font-serif font-bold text-[#5B8DB8] mt-1 break-words">{{ $msg->subject }}</h3>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="inline-block text-xs bg-[#5B8DB8]/10 text-[#5B8DB8] hover:bg-[#5B8DB8] hover:text-[#FFFDF7] px-3.5 py-2 rounded-xl font-semibold transition whitespace-nowrap shadow-sm">
            &larr; Back to Messages
        </a>
    </div>

    <!-- Sender Details & Message -->
    <div class="space-y-4 text-xs sm:text-sm mb-6">
        <div class="bg-[#FFFDF7] p-4 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
            <strong class="text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] block mb-1 font-semibold">Sender Name & Contact</strong>
            <p class="font-semibold text-[#25364A] break-words">{{ $msg->name }} <span class="text-xs font-normal text-[#5B8DB8] block sm:inline sm:ml-1">({{ $msg->email }})</span></p>
            @if($msg->phone)
                <p class="text-[11px] sm:text-xs text-[#25364A]/70 font-medium mt-1">Phone: {{ $msg->phone }}</p>
            @endif
        </div>
        
        <div class="bg-[#FFFDF7] p-4 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
            <strong class="text-[10px] sm:text-xs uppercase tracking-wider text-[#5B8DB8] block mb-2 font-semibold">Message Content</strong>
            <div class="p-4 bg-white rounded-xl border border-[#5B8DB8]/10 text-[#25364A] leading-relaxed text-xs sm:text-sm break-words whitespace-pre-line">
                {{ $msg->message }}
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-2">
        <a href="mailto:{{ $msg->email }}?subject=Re: {{ urlencode($msg->subject) }}" class="bg-[#5B8DB8] text-[#FFFDF7] text-xs font-bold px-5 py-3 rounded-xl hover:bg-[#5B8DB8]/90 transition shadow-sm text-center">
            Reply via Email
        </a>
        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');" class="w-full sm:w-auto">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full sm:w-auto bg-rose-50 text-rose-700 border border-rose-200 text-xs font-bold px-4 py-3 rounded-xl hover:bg-rose-100 transition text-center shadow-sm">
                Delete Inquiry
            </button>
        </form>
    </div>
</div>
@endsection