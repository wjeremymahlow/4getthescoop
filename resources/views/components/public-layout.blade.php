@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? '4 Get The Scoop - Ice Cream Truck Catering in Knoxville, TN' }}</title>
        <meta name="description" content="4 Get The Scoop brings delicious ice cream directly to your event in Knoxville, TN. Book our ice cream truck for birthdays, weddings, corporate events, and more!">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-screen flex flex-col">
            @include('components.public-navigation')

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            @include('components.footer')
        </div>

        @stack('scripts')
    </body>
</html>
