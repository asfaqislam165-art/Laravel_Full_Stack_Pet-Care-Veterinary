@extends('layouts.app')

@section('content')
<div class="py-8 sm:py-12 md:py-16 bg-[#FFFDF7] min-h-screen">
    <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white/80 backdrop-blur-xl border border-[#5B8DB8]/20 rounded-2xl sm:rounded-3xl p-4 sm:p-8 md:p-10 lg:p-12 shadow-xl">

            <!-- Header -->
            <div class="text-center mb-7 sm:mb-10">
                <span class="block text-[10px] sm:text-xs font-bold uppercase tracking-widest text-[#F5C95C]">
                    Boutique Reservation
                </span>

                <h1 class="mt-2 text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-[#5B8DB8] leading-tight">
                    Book Your Pet’s Sanctuary Experience
                </h1>

                <p class="mt-2 text-xs sm:text-sm text-[#25364A]/70 max-w-xl mx-auto leading-relaxed">
                    Reserve bespoke grooming, luxury boarding, or spa care with our expert team.
                </p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-5 sm:mb-6 p-3 sm:p-4 bg-red-50 border border-red-200 rounded-xl sm:rounded-2xl">
                    <ul class="list-disc list-inside text-xs sm:text-sm text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Booking Form -->
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-4 sm:space-y-6">
                @csrf

                <!-- Customer & Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                    <div>
                        <label for="customer_name" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Customer Name *
                        </label>

                        <input
                            id="customer_name"
                            type="text"
                            name="customer_name"
                            value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                            required
                            placeholder="Enter your full name"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Email Address *
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email', auth()->user()->email ?? '') }}"
                            required
                            placeholder="Enter your email address"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                    </div>
                </div>

                <!-- Phone, Pet Name, Pet Type -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                    <div>
                        <label for="phone" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Phone Number *
                        </label>

                        <input
                            id="phone"
                            type="tel"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                            placeholder="(555) 000-0000"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                    </div>

                    <div>
                        <label for="pet_name" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Pet Name *
                        </label>

                        <input
                            id="pet_name"
                            type="text"
                            name="pet_name"
                            value="{{ old('pet_name') }}"
                            required
                            placeholder="Enter your pet's name"
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                    </div>

                    <div class="sm:col-span-2 lg:col-span-1">
                        <label for="pet_type" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Pet Species *
                        </label>

                        <select
                            id="pet_type"
                            name="pet_type"
                            required
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                            <option value="">Select Pet Type</option>
                            <option value="Dog" {{ old('pet_type') == 'Dog' ? 'selected' : '' }}>Dog</option>
                            <option value="Cat" {{ old('pet_type') == 'Cat' ? 'selected' : '' }}>Cat</option>
                            <option value="Rabbit" {{ old('pet_type') == 'Rabbit' ? 'selected' : '' }}>Rabbit</option>
                            <option value="Bird" {{ old('pet_type') == 'Bird' ? 'selected' : '' }}>Bird</option>
                            <option value="Other" {{ old('pet_type') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <!-- Service, Date, Time -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                    <div class="sm:col-span-2 lg:col-span-1">
                        <label for="pricing_id" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Select Service *
                        </label>

                        <select
                            id="pricing_id"
                            name="pricing_id"
                            required
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                            <option value="">Select Package</option>

                            @foreach($pricings as $pricing)
                                <option
                                    value="{{ $pricing->id }}"
                                    {{ old('pricing_id') == $pricing->id ? 'selected' : '' }}
                                >
                                    {{ $pricing->package_name }} - ${{ number_format($pricing->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="appointment_date" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Appointment Date *
                        </label>

                        <input
                            id="appointment_date"
                            type="date"
                            name="appointment_date"
                            min="{{ now()->toDateString() }}"
                            value="{{ old('appointment_date') }}"
                            required
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                    </div>

                    <div class="sm:col-span-2 lg:col-span-1">
                        <label for="appointment_time" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                            Preferred Time *
                        </label>

                        <select
                            id="appointment_time"
                            name="appointment_time"
                            required
                            class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition"
                        >
                            <option value="">Select Time Slot</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                        </select>
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label for="message" class="block text-[11px] sm:text-xs font-semibold uppercase tracking-wider text-[#25364A] mb-1.5 sm:mb-2">
                        Special Notes & Care Instructions
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="4"
                        placeholder="Tell us about your pet's temperament, allergies, or specific requirements..."
                        class="w-full rounded-xl border border-[#5B8DB8]/30 bg-white focus:border-[#5B8DB8] focus:ring-[#5B8DB8] text-[#25364A] text-sm px-4 py-3 outline-none transition resize-y"
                    >{{ old('message') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-1 sm:pt-2">
                    <button
                        type="submit"
                        class="w-full bg-[#5B8DB8] text-[#FFFDF7] py-3.5 sm:py-4 rounded-xl font-bold hover:bg-[#5B8DB8]/90 active:scale-[0.99] transition shadow-lg text-sm sm:text-base tracking-wide"
                    >
                        Confirm Reservation Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection