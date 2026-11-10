<nav
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
    @click.away="open = false"
    class="sticky top-0 z-50 backdrop-blur-md bg-[#FFFDF7]/90 border-b border-[#5B8DB8]/20 transition-all"
    aria-label="Main navigation"
>
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20 gap-2">

            <!-- Brand -->
            <a
                href="{{ route('home') }}"
                class="flex items-center shrink-0 gap-1.5 sm:gap-2 text-base sm:text-xl lg:text-2xl font-bold tracking-tight text-[#5B8DB8] min-w-0"
            >
                <span class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#F5C95C] flex items-center justify-center text-[#25364A] shadow-sm font-serif font-bold text-xs sm:text-sm shrink-0">
                    P&C
                </span>
                <span class="truncate text-sm sm:text-lg lg:text-xl">Paws & Claws</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-1 xl:gap-2 text-sm font-medium">
                @foreach ([
                    'home' => 'Home',
                    'about' => 'About',
                    'services' => 'Services',
                    'pricing' => 'Pricing',
                    'reviews' => 'Reviews',
                    'contact' => 'Contact',
                ] as $route => $label)
                    <a
                        href="{{ route($route) }}"
                        class="px-3 py-2 rounded-lg transition whitespace-nowrap
                        {{ request()->routeIs($route)
                            ? 'text-[#5B8DB8] font-semibold bg-[#5B8DB8]/10'
                            : 'text-[#25364A]/80 hover:text-[#5B8DB8] hover:bg-[#5B8DB8]/5' }}"
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <!-- Desktop Auth + CTA -->
            <div class="hidden lg:flex items-center gap-2 xl:gap-3 shrink-0">
                @auth
                    @if(auth()->user()->usertype === 'admin')
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="text-[11px] uppercase tracking-wider font-semibold bg-[#25364A] text-[#FFFDF7] px-3 py-2 rounded-lg hover:bg-[#25364A]/90 transition whitespace-nowrap"
                        >
                            Admin Suite
                        </a>
                    @endif

                    <!-- My Profile Link (Desktop) -->
                    <a
                        href="{{ route('profile.edit') }}"
                        class="text-sm font-medium text-[#25364A] hover:text-[#5B8DB8] px-2 py-2 whitespace-nowrap {{ request()->routeIs('profile.edit') ? 'text-[#5B8DB8] font-semibold' : '' }}"
                    >
                        My Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="text-sm font-medium text-[#25364A]/70 hover:text-rose-600 px-2 py-2 whitespace-nowrap"
                        >
                            Logout
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="text-sm font-medium text-[#25364A] hover:text-[#5B8DB8] px-2 py-2 whitespace-nowrap"
                    >
                        Sign In
                    </a>
                @endauth

                <a
                    href="{{ route('booking.create') }}"
                    class="bg-[#5B8DB8] text-[#FFFDF7] px-4 xl:px-5 py-2.5 rounded-xl font-medium shadow-sm hover:bg-[#5B8DB8]/90 transition text-sm whitespace-nowrap"
                >
                    Book Appointment
                </a>
            </div>

            <!-- Mobile / Tablet Actions -->
            <div class="flex lg:hidden items-center gap-1.5 sm:gap-2 shrink-0">
                <a
                    href="{{ route('booking.create') }}"
                    class="bg-[#5B8DB8] text-[#FFFDF7] px-2.5 sm:px-4 py-1.5 sm:py-2 rounded-lg font-medium shadow-sm hover:bg-[#5B8DB8]/90 transition text-xs sm:text-sm whitespace-nowrap"
                >
                    Book
                </a>

                <button
                    type="button"
                    @click="open = !open"
                    :aria-expanded="open"
                    aria-controls="mobile-menu"
                    class="p-1.5 sm:p-2 rounded-lg bg-[#5B8DB8]/10 text-[#25364A] hover:text-[#5B8DB8] focus:outline-none focus:ring-2 focus:ring-[#5B8DB8]/40 shrink-0"
                >
                    <span class="sr-only">Toggle navigation menu</span>

                    <!-- Hamburger -->
                    <svg
                        x-show="!open"
                        class="w-5 h-5 sm:w-6 sm:h-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <!-- Close -->
                    <svg
                        x-show="open"
                        x-cloak
                        class="w-5 h-5 sm:w-6 sm:h-6"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        id="mobile-menu"
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="lg:hidden bg-[#FFFDF7] border-t border-[#5B8DB8]/20 shadow-lg"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 space-y-4">

            <!-- Mobile Links -->
            <div class="grid grid-cols-2 gap-2 sm:flex sm:flex-col sm:gap-1">
                @foreach ([
                    'home' => 'Home',
                    'about' => 'About',
                    'services' => 'Services',
                    'pricing' => 'Pricing',
                    'reviews' => 'Reviews',
                    'contact' => 'Contact',
                ] as $route => $label)
                    <a
                        href="{{ route($route) }}"
                        @click="open = false"
                        class="px-3 py-2.5 rounded-lg text-sm font-medium transition
                        {{ request()->routeIs($route)
                            ? 'bg-[#5B8DB8]/10 text-[#5B8DB8] font-semibold'
                            : 'text-[#25364A]/80 hover:bg-[#5B8DB8]/5 hover:text-[#5B8DB8]' }}"
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <!-- Mobile Auth -->
            <div class="pt-4 border-t border-[#5B8DB8]/20 space-y-2">
                @auth
                    @if(auth()->user()->usertype === 'admin')
                        <a
                            href="{{ route('admin.dashboard') }}"
                            @click="open = false"
                            class="block text-center text-xs uppercase tracking-wider font-semibold bg-[#25364A] text-[#FFFDF7] px-4 py-2.5 rounded-xl hover:bg-[#25364A]/90 transition"
                        >
                            Admin Suite
                        </a>
                    @endif

                    <!-- My Profile Link (Mobile) -->
                    <a
                        href="{{ route('profile.edit') }}"
                        @click="open = false"
                        class="block px-3 py-2.5 text-sm font-medium text-[#25364A] hover:bg-[#5B8DB8]/5 rounded-lg {{ request()->routeIs('profile.edit') ? 'bg-[#5B8DB8]/10 text-[#5B8DB8] font-semibold' : '' }}"
                    >
                        My Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full text-left px-3 py-2.5 text-sm font-medium text-rose-600 hover:bg-rose-50 rounded-lg"
                        >
                            Logout
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        @click="open = false"
                        class="block text-center px-4 py-2.5 text-sm font-semibold border border-[#5B8DB8]/40 text-[#5B8DB8] rounded-xl hover:bg-[#5B8DB8]/10 transition"
                    >
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

@once
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endonce