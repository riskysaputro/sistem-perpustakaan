<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Perpustakaan')</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-p7Ppbq1evqfI9zUeIvS4WbU5WnHoOYWRdA8Pn5b9HZpZB6TvHcHoMaR2Fq3I9PI5ASGSm6aOpavVvzqYQpP1VA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-300 flex">

    {{-- Sidebar --}}
    @include('Partials/sidebar')

    {{-- Konten Utama --}}
    <div class="flex-1 min-h-screen flex flex-col">
        <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8">
                <span class="text-xl font-semibold text-gray-800">Sistem Perpustakaan</span>
            </a>
        </header>

        <main class="p-6">
            @yield('content')
        </main>

        @include('Partials/footer')
    </div>

</body>


</html>
