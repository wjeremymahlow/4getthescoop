<x-public-layout>
    <!-- Hero Section -->
    <section class="relative text-white">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero.jpg') }}" alt="4 Get The Scoop Ice Cream Truck" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-pink-600/70"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Sweet Treats for Your Special Events
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-pink-100">
                    Ice cream truck catering in Knoxville, TN
                </p>
                @auth
                    <a href="{{ route('catering.create') }}" class="inline-block bg-white text-pink-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-pink-100 transition shadow-lg">
                        Book Your Event
                    </a>
                @else
                    <a href="{{ route('register') }}" class="inline-block bg-white text-pink-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-pink-100 transition shadow-lg">
                        Book Your Event
                    </a>
                    <p class="mt-4 text-pink-100 text-sm">Create a free account to request a quote</p>
                @endauth
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 md:py-24" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">About 4 Get The Scoop</h2>
                <div class="w-24 h-1 bg-pink-500 mx-auto"></div>
            </div>
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-lg text-gray-600 leading-relaxed">
                    4 Get The Scoop brings the joy of ice cream directly to your event! Based in Knoxville, Tennessee,
                    we're your go-to ice cream truck catering service for birthdays, weddings, corporate events,
                    school functions, and any celebration that deserves something sweet.
                </p>
                <p class="text-lg text-gray-600 leading-relaxed mt-4">
                    Our friendly service and delicious treats will make your event unforgettable.
                    Let us help you create sweet memories!
                </p>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 md:py-24 bg-gray-50" id="services">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Events We Serve</h2>
                <div class="w-24 h-1 bg-pink-500 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $services = [
                        ['icon' => 'M21 15.999V15a2 2 0 00-2-2H5a2 2 0 00-2 2v.999m18 0v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-3m18 0h-3m-15 0h3m6-13.001V9m0-6.001C12 2 10.343 2 9 3.5S7 6.999 7 6.999h10S17 5 15 3.5 12 2 12 2.999z', 'title' => 'Birthday Parties', 'desc' => 'Make their special day extra sweet!'],
                        ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'title' => 'Corporate Events', 'desc' => 'Impress clients and reward employees'],
                        ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Weddings', 'desc' => 'A sweet addition to your big day'],
                        ['icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'title' => 'School Events', 'desc' => 'Field days, graduations, and more'],
                        ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Community Events', 'desc' => 'Festivals, fundraisers, and gatherings'],
                        ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'title' => 'Private Parties', 'desc' => 'Any occasion worth celebrating'],
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service['icon'] }}"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $service['title'] }}</h3>
                        <p class="text-gray-600">{{ $service['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 md:py-24" id="gallery">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Gallery</h2>
                <div class="w-24 h-1 bg-pink-500 mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @for($i = 1; $i <= 8; $i++)
                    <div class="aspect-square bg-pink-100 rounded-lg overflow-hidden">
                        @if(file_exists(public_path("images/gallery/{$i}.jpg")))
                            <img src="{{ asset("images/gallery/{$i}.jpg") }}" alt="Gallery image {{ $i }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-pink-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Availability Preview Section -->
    @if($availableDates->isNotEmpty())
    <section class="py-16 md:py-24 bg-gray-50" id="availability">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Upcoming Availability</h2>
                <div class="w-24 h-1 bg-pink-500 mx-auto mb-4"></div>
                <p class="text-gray-600">Here are some of our next available dates</p>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                @foreach($availableDates as $entry)
                    <div class="bg-white rounded-lg shadow px-6 py-4 text-center">
                        <div class="text-pink-600 font-bold text-lg">{{ $entry->date->format('M j') }}</div>
                        <div class="text-gray-500 text-sm">{{ $entry->date->format('l') }}</div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('calendar') }}" class="inline-block bg-pink-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                    View Full Calendar
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-pink-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Book Your Event?</h2>
            <p class="text-xl text-pink-100 mb-8">Let's make your celebration unforgettable!</p>
            @auth
                <a href="{{ route('catering.create') }}" class="inline-block bg-white text-pink-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-pink-100 transition shadow-lg">
                    Request a Quote
                </a>
            @else
                <a href="{{ route('register') }}" class="inline-block bg-white text-pink-600 px-8 py-4 rounded-lg text-lg font-bold hover:bg-pink-100 transition shadow-lg">
                    Request a Quote
                </a>
                <p class="mt-4 text-pink-100">Create a free account to request your personalized quote</p>
            @endauth
        </div>
    </section>
</x-public-layout>
