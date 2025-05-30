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
    <body class="font-sans antialiased">
        <div class="bg-fixed bg-center bg-cover bg-no-repeat min-h-screen" style="background-image: url('{{asset('/icons/bg.png')}}')">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
