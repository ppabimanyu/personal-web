<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <livewire:components.nav-bar />
    <main class="px-2 md:px-4 lg:px-10 md:max-w-7xl mx-auto py-20">
        {{ $slot }}
    </main>
    <x-footer />
</body>

</html>
