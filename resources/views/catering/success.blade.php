<x-public-layout>
    <x-slot name="title">Request Submitted - 4 Get The Scoop</x-slot>

    <div class="py-24">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-white rounded-xl shadow-lg p-8 md:p-12">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-4">Request Submitted!</h1>
                <p class="text-gray-600 mb-8">
                    Thank you for your catering request! We've received your information and will review it shortly.
                    You'll receive an email confirmation, and we'll be in touch with a quote.
                </p>

                <div class="space-y-4">
                    <a href="{{ route('my-requests') }}" class="inline-block bg-pink-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                        View My Requests
                    </a>
                    <br>
                    <a href="{{ route('home') }}" class="inline-block text-pink-600 hover:text-pink-700 font-semibold">
                        Return to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
