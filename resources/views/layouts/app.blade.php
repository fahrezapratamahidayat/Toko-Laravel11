<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Super Admin')
        <div class="grid min-h-screen w-full lg:grid-cols-[280px_1fr]">
            <x-navigation.sidebar-admin></x-navigation.sidebar-admin>
            <div class="flex flex-col">
                <x-navigation.header-admin />
                <main class="overflow-auto flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    @else
        <div class="flex flex-col min-h-screen w-full">
            <x-navigation.user-navbar />
            <main class="overflow-auto flex-1">
                {{ $slot }}
            </main>
        </div>
    @endif
</body>
@push('scripts')
@endpush

</html>
