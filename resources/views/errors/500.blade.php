<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - {{ __('Internal Server Error') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white flex flex-col min-h-screen h-full selection:bg-blue-600 selection:text-white relative">
    <main class="grow flex items-center justify-center w-full relative z-0">
        <div class="text-center px-6 max-w-lg mx-auto -mt-20">
            <h1 class="text-8xl font-bold text-BG-IExxass font-AbhayaLibre drop-shadow-md">500</h1>
            <h2 class="text-2xl font-semibold text-gray-800 mt-4 font-AbhayaLibre">{{ __('Internal Server Error') }}</h2>
            <p class="text-gray-600 mt-3 leading-relaxed text-sm">
                {{ __('Sorry, an unexpected error occurred on our server while processing your request. Our technical team has been notified and is working to fix it.') }}
            </p>
        </div>
    </main>
</body>

</html>
