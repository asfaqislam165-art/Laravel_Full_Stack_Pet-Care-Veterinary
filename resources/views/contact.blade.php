@extends('layouts.app')

@section('content')
<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7]">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-start">

            <!-- Left: Contact Information -->
            <div class="text-center lg:text-left">
                <span class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]">
                    Get In Touch
                </span>

                <h1 class="mt-2 mb-3 sm:mb-4 text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight">
                    Concierge Support
                </h1>

                <p class="text-xs sm:text-sm md:text-base text-[#25364A]/80 mb-6 sm:mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Have questions regarding custom feeding, special care routines, or booking inquiries? Reach out to our concierge team directly.
                </p>

                <div class="space-y-3 sm:space-y-4 text-left">
                    <!-- Address -->
                    <div class="bg-white/60 p-4 sm:p-5 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C]">
                            Sanctuary Address
                        </span>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A] leading-relaxed">
                            {{ $settings->address ?? '742 Evergreen Terrace, Suite 400, Beverly Hills, CA' }}
                        </p>
                    </div>

                    <!-- Contact -->
                    <div class="bg-white/60 p-4 sm:p-5 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C]">
                            Direct Contact
                        </span>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A]">
                            Phone:
                            <a
                                href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone ?? '(800) 555-PAWS') }}"
                                class="text-[#5B8DB8] hover:underline break-all"
                            >
                                {{ $settings->phone ?? '(800) 555-PAWS' }}
                            </a>
                        </p>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A]">
                            Email:
                            <a
                                href="mailto:{{ $settings->email ?? 'concierge@pawsandclaws.com' }}"
                                class="text-[#5B8DB8] hover:underline break-all"
                            >
                                {{ $settings->email ?? 'concierge@pawsandclaws.com' }}
                            </a>
                        </p>
                    </div>

                    <!-- Hours -->
                    <div class="bg-white/60 p-4 sm:p-5 rounded-2xl border border-[#5B8DB8]/20 shadow-sm">
                        <span class="block text-[10px] sm:text-xs uppercase font-bold text-[#F5C95C]">
                            Business Hours
                        </span>

                        <p class="mt-1 text-xs sm:text-sm font-semibold text-[#25364A] leading-relaxed">
                            {{ $settings->business_hours ?? 'Mon - Sat: 8:00 AM - 7:00 PM' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right: Inquiry Form -->
            <div class="bg-white/80 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 shadow-md">
                <h2 class="text-lg sm:text-xl md:text-2xl font-serif font-bold text-[#5B8DB8] mb-5 sm:mb-6">
                    Send an Inquiry
                </h2>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-5 p-3 sm:p-4 bg-red-50 border border-red-200 rounded-xl sm:rounded-2xl">
                        <ul class="list-disc list-inside text-xs sm:text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4 sm:space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Your Name *
                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Enter your full name"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none transition"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Email Address *
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="Enter your email address"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none transition"
                        >
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Subject *
                        </label>

                        <input
                            id="subject"
                            type="text"
                            name="subject"
                            value="{{ old('subject') }}"
                            required
                            placeholder="What can we help you with?"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none transition"
                        >
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5">
                            Message *
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            required
                            placeholder="Write your message here..."
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white text-[#25364A] text-sm px-4 py-3 focus:border-[#5B8DB8] focus:ring-[#5B8DB8] outline-none transition resize-y"
                        >{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div class="pt-1">
                        <button
                            type="submit"
                            class="w-full bg-[#5B8DB8] text-[#FFFDF7] py-3.5 rounded-xl font-bold hover:bg-[#5B8DB8]/90 active:scale-[0.99] transition shadow-md text-sm sm:text-base"
                        >
                            Send Inquiry Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection