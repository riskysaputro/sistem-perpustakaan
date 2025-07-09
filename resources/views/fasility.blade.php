@extends('layouts.app')
@include('partials.navbar')
@section('content')
    <div class="px-5 md:px-28 py-6 text-sm md:text-base">
        <nav class="flex" aria-label="Breadcrumb">
            <li class="inline-flex items-center space-x-1 md:space-x-3">
                <a href="{{ route('home') }}" class="text-black hover:text-blue-600">Home</a>
            </li>
            <div class="flex items-center ml-2">
                >>
                <li class="inline-flex items-center">
                    <a href="{{ route('academic.extra') }}" class="ml-1 font-medium hover:text-blue-600 md:ml-2">Fasilitas</a>
                </li>
            </div>
        </nav>
    </div>
    @foreach ($fasility as $item)
        <div class="relative">
            <div class="space-y-14 mb-20">
                <img src="{{ asset($item['path']) }}" alt="Header" class="w-full h-auto object-cover">
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 text-center mx-auto space-y-2 px-4 py-2 rounded-t-lg"
                    style="background-color: rgba(2, 128, 2, 0.646);">
                    <p class="font-semibold text-base md:text-4xl "
                        style="color: {{ \App\Models\Setting::getValue('color_secondary') }}">{{ $item['label'] }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    @include('partials.footer')
@endsection()
