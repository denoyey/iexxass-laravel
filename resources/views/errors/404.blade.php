<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - {{ __('Page Not Found') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white flex flex-col min-h-screen h-full selection:bg-blue-600 selection:text-white relative">
    <x-header />

    <main class="grow flex items-center justify-center pt-[150px] md:pt-[120px] pb-20 w-full relative z-0">
        <div class="text-center px-6 max-w-lg mx-auto">
            <h1 class="text-9xl font-bold text-BG-IExxass font-AbhayaLibre drop-shadow-md">404</h1>
            <h2 class="text-3xl font-semibold text-gray-800 mt-4 font-AbhayaLibre">{{ __('Page Not Found') }}</h2>
            <p class="text-gray-600 mt-4 leading-relaxed text-sm md:text-base">
                {{ __('Sorry, the page you are looking for might have been removed, had its name changed, or is temporarily unavailable.') }}
            </p>
            <a href="{{ url('/') }}"
                class="inline-flex items-center justify-center mt-6 md:mt-8 px-4 py-1.5 md:px-6 md:py-2.5 text-[11px] md:text-sm bg-BG-IExxass text-white font-medium rounded-md hover:bg-blue-800 transition-all duration-300 shadow-md">
                <svg class="w-3 h-3 md:w-4 md:h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Back to Home') }}
            </a>
        </div>
    </main>

    <div class="w-full mt-auto relative z-10">
        <x-footer />
    </div>

    <x-back-to-top />
</body>

</html>
