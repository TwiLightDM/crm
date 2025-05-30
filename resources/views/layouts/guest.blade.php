<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>
            .bg-dark-gray {
            --tw-bg-opacity: 1;
            background-color: rgb(28 28 28 / var(--tw-bg-opacity));
            }

            .bg-beige {
            --tw-bg-opacity: 1;
            background-color: rgb(252 242 219 / var(--tw-bg-opacity));
            }

            .text-green {
            --tw-text-opacity: 1;
            color: rgb(50 115 35 / var(--tw-text-opacity));
            }

            .text-beige {
            --tw-text-opacity: 1;
            color: rgb(252 242 219 / var(--tw-text-opacity));
            }
        </style>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-dark-gray text-beige">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
