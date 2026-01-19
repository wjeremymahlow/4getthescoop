<footer class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- About -->
            <div>
                <h3 class="text-xl font-bold mb-4">4 Get The Scoop</h3>
                <p class="text-gray-400">
                    Bringing sweet memories to your special events in Knoxville, TN and surrounding areas.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('calendar') }}" class="text-gray-400 hover:text-white transition">Availability</a></li>
                    <li><a href="{{ route('catering.create') }}" class="text-gray-400 hover:text-white transition">Book Now</a></li>
                </ul>
            </div>

            <!-- Contact & Social -->
            <div>
                <h3 class="text-xl font-bold mb-4">Connect With Us</h3>
                <div class="space-y-2 text-gray-400">
                    <p>Knoxville, TN</p>
                    <a href="https://www.facebook.com/4getthescoop/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center hover:text-white transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Follow us on Facebook
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} 4 Get The Scoop. All rights reserved.</p>
        </div>
    </div>
</footer>
