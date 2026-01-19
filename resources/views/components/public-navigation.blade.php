<nav x-data="{ open: false }" class="bg-pink-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-white">4 Get The Scoop</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <a href="{{ route('home') }}" class="text-white hover:text-pink-200 transition {{ request()->routeIs('home') ? 'font-semibold' : '' }}">
                    Home
                </a>
                <a href="{{ route('calendar') }}" class="text-white hover:text-pink-200 transition {{ request()->routeIs('calendar') ? 'font-semibold' : '' }}">
                    Availability
                </a>
                <a href="{{ route('catering.create') }}" class="text-white hover:text-pink-200 transition {{ request()->routeIs('catering.*') ? 'font-semibold' : '' }}">
                    Book Now
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-pink-200 transition {{ request()->routeIs('dashboard') ? 'font-semibold' : '' }}">
                        My Account
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-pink-200 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-pink-200 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-pink-100 transition">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="text-white hover:text-pink-200 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-pink-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-white hover:bg-pink-600 rounded-md">Home</a>
            <a href="{{ route('calendar') }}" class="block px-3 py-2 text-white hover:bg-pink-600 rounded-md">Availability</a>
            <a href="{{ route('catering.create') }}" class="block px-3 py-2 text-white hover:bg-pink-600 rounded-md">Book Now</a>

            @auth
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-white hover:bg-pink-600 rounded-md">My Account</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 text-white hover:bg-pink-600 rounded-md">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-white hover:bg-pink-600 rounded-md">Login</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-white hover:bg-pink-600 rounded-md">Register</a>
            @endauth
        </div>
    </div>
</nav>
