<x-public-layout>
    <x-slot name="title">Request Catering - 4 Get The Scoop</x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Request Catering</h1>
                <div class="w-24 h-1 bg-pink-500 mx-auto mb-4"></div>
                <p class="text-gray-600">Fill out the form below and we'll get back to you with a quote</p>
            </div>

            @guest
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-yellow-800">
                        Please <a href="{{ route('login') }}?redirect={{ urlencode(request()->fullUrl()) }}" class="font-semibold underline">login</a> or
                        <a href="{{ route('register') }}?redirect={{ urlencode(request()->fullUrl()) }}" class="font-semibold underline">register</a>
                        to submit your request.
                    </p>
                </div>
            </div>
            @endguest

            <form method="POST" action="{{ route('catering.store') }}" class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                @csrf

                <!-- Event Details -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Event Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1">Event Date *</label>
                            <input type="date" name="event_date" id="event_date"
                                value="{{ old('event_date', $selectedDate) }}"
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('event_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="event_type" class="block text-sm font-medium text-gray-700 mb-1">Event Type *</label>
                            <select name="event_type" id="event_type"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                                <option value="">Select event type</option>
                                <option value="birthday_party" {{ old('event_type') == 'birthday_party' ? 'selected' : '' }}>Birthday Party</option>
                                <option value="corporate_event" {{ old('event_type') == 'corporate_event' ? 'selected' : '' }}>Corporate Event</option>
                                <option value="wedding" {{ old('event_type') == 'wedding' ? 'selected' : '' }}>Wedding</option>
                                <option value="school_event" {{ old('event_type') == 'school_event' ? 'selected' : '' }}>School Event</option>
                                <option value="community_event" {{ old('event_type') == 'community_event' ? 'selected' : '' }}>Community Event</option>
                                <option value="private_party" {{ old('event_type') == 'private_party' ? 'selected' : '' }}>Private Party</option>
                                <option value="other" {{ old('event_type') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('event_type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Time *</label>
                            <input type="time" name="start_time" id="start_time"
                                value="{{ old('start_time') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('start_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Time *</label>
                            <input type="time" name="end_time" id="end_time"
                                value="{{ old('end_time') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('end_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="estimated_guests" class="block text-sm font-medium text-gray-700 mb-1">Estimated Guests *</label>
                            <input type="number" name="estimated_guests" id="estimated_guests"
                                value="{{ old('estimated_guests') }}"
                                min="1" max="1000"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('estimated_guests')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Location</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="venue_name" class="block text-sm font-medium text-gray-700 mb-1">Venue Name *</label>
                            <input type="text" name="venue_name" id="venue_name"
                                value="{{ old('venue_name') }}"
                                placeholder="e.g., Smith Residence, City Park"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('venue_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address_line_1" class="block text-sm font-medium text-gray-700 mb-1">Address Line 1 *</label>
                            <input type="text" name="address_line_1" id="address_line_1"
                                value="{{ old('address_line_1') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('address_line_1')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address_line_2" class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                            <input type="text" name="address_line_2" id="address_line_2"
                                value="{{ old('address_line_2') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('address_line_2')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                            <input type="text" name="city" id="city"
                                value="{{ old('city', 'Knoxville') }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('city')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State *</label>
                                <input type="text" name="state" id="state"
                                    value="{{ old('state', 'TN') }}"
                                    maxlength="2"
                                    placeholder="TN"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 uppercase"
                                    required>
                                @error('state')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="zip_code" class="block text-sm font-medium text-gray-700 mb-1">ZIP Code *</label>
                                <input type="text" name="zip_code" id="zip_code"
                                    value="{{ old('zip_code') }}"
                                    maxlength="10"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                    required>
                                @error('zip_code')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-1">Contact Name *</label>
                            <input type="text" name="contact_name" id="contact_name"
                                value="{{ old('contact_name', auth()->user()?->name) }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('contact_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="contact_email" id="contact_email"
                                value="{{ old('contact_email', auth()->user()?->email) }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('contact_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="tel" name="contact_phone" id="contact_phone"
                                value="{{ old('contact_phone', auth()->user()?->phone) }}"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500"
                                required>
                            @error('contact_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Additional Information</h2>
                    <div>
                        <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-1">Special Requests or Notes</label>
                        <textarea name="special_requests" id="special_requests" rows="4"
                            placeholder="Any special requests, dietary restrictions, or additional details..."
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">{{ old('special_requests') }}</textarea>
                        @error('special_requests')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    @auth
                        <button type="submit" class="bg-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                            Submit Request
                        </button>
                    @else
                        <p class="text-gray-600 mb-4">You must be logged in to submit a request.</p>
                        <a href="{{ route('login') }}?redirect={{ urlencode(request()->fullUrl()) }}" class="inline-block bg-pink-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-pink-700 transition">
                            Login to Submit
                        </a>
                    @endauth
                </div>
            </form>
        </div>
    </div>
</x-public-layout>
