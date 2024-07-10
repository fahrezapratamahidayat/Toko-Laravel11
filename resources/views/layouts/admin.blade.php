<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased no-underline">
    <div class="grid min-h-screen w-full lg:grid-cols-[280px_1fr] bg-background">
        <x-navigation.sidebar-admin></x-navigation.sidebar-admin>
        <div class="flex flex-col">
            <x-navigation.header-admin></x-navigation.header-admin>
            <main class="overflow-auto flex-1">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>