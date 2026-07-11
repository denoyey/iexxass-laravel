<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 - {{ __('Too Many Requests') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 flex flex-col min-h-screen h-full selection:bg-blue-600 selection:text-white relative">
    <main class="grow flex items-center justify-center w-full relative z-0">
        <div class="text-center px-6 max-w-lg mx-auto -mt-20">
            <h1 class="text-8xl font-bold text-BG-IExxass font-AbhayaLibre drop-shadow-md">429</h1>
            <h2 class="text-2xl font-semibold text-gray-800 mt-4 font-AbhayaLibre">{{ __('Too Many Requests') }}</h2>
            <p class="text-gray-600 mt-3 leading-relaxed text-sm">
                {{ __('Our system detected unusual activity from your device. Your access has been temporarily limited for server security.') }}
            </p>
            <p class="text-red-600 font-medium mt-2 text-xs md:text-sm">
                {{ __('Please wait a moment before trying again.') }}
            </p>
            <button onclick="window.history.back()"
                class="inline-flex items-center justify-center mt-5 md:mt-6 px-4 py-1.5 md:px-5 md:py-2 text-[11px] md:text-sm bg-BG-IExxass text-white font-medium rounded-md hover:bg-blue-800 transition-all duration-300 shadow-md">
                <svg class="w-3 h-3 md:w-3.5 md:h-3.5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg>
                {{ __('Go Back to Previous Page') }}
            </button>
        </div>
    </main>
</body>

</html>
