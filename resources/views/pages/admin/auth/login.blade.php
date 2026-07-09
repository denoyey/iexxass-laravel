<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth overscroll-none">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Login Portal Admin IExxass">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="referrer" content="same-origin">

    <title>Login - Admin Portal IExxass</title>

    <link rel="canonical" href="https://iexxass.com" />
    <link rel="icon" type="image/png" href="{{ asset('src/img/logo.webp') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin.js'])
</head>

<body class="bg-white flex h-dvh sm:min-h-screen overflow-hidden overscroll-none">

    <x-public.layout.loading />

    @if (session('idle_timeout') || request('idle') == '1')
        <div id="toast-container"
            class="fixed top-6 left-1/2 -translate-x-1/2 z-100 flex flex-col gap-3 pointer-events-none items-center">
            <div
                class="toast-alert flex items-start gap-3 p-3.5 bg-white border border-red-100 rounded-md shadow-[0_4px_12px_rgba(0,0,0,0.05)] mb-3 w-max min-w-[280px] sm:min-w-[320px] max-w-[90vw] sm:max-w-md pointer-events-auto transform transition-all duration-300 opacity-0 scale-95 relative overflow-hidden group">
                <div
                    class="shrink-0 w-7 h-7 rounded-full bg-red-50 border border-red-100 flex items-center justify-center mt-0.5 shadow-sm">
                    <svg class="w-4 h-4 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <div class="flex-1 min-w-0 pr-2">
                    <h4 class="text-[12.5px] font-semibold text-gray-800 leading-snug">Sesi Berakhir</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5 leading-snug">
                        {{ session('idle_timeout') ?? 'Anda sudah tidak aktif. Silahkan login kembali.' }}</p>
                </div>
                <button type="button"
                    class="toast-close shrink-0 p-1 -m-1 text-gray-400 hover:text-gray-600 focus:outline-none rounded-md hover:bg-gray-100 transition-colors">
                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Left Side: Elegant Image Background (Hidden on Mobile) -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-gray-900 items-end justify-start overflow-hidden">
        <!-- Minimalist gradient overlay for text readability -->
        <div class="absolute inset-0 bg-linear-to-t from-gray-900/90 via-gray-900/30 to-transparent z-10"></div>
        <img src="{{ asset('src/img/bg-login.webp') }}" alt="IExxass Professional"
            class="absolute inset-0 w-full h-full object-cover z-0 opacity-90" loading="lazy">

        <!-- Elegant Minimalist Branding at the Bottom -->
        <div class="relative z-20 p-12 w-full text-white">
            <img src="{{ asset('src/img/logo.webp') }}" alt="Logo" class="h-10 mb-6 brightness-0 invert opacity-90">
            <h2 class="text-3xl font-light tracking-wide mb-2">Transforming connectivity.</h2>
            <p class="text-sm font-light text-white/60 tracking-wider uppercase">IExxass &copy; {{ date('Y') }}</p>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full lg:w-1/2 flex flex-col p-6 sm:p-12 overflow-y-auto bg-white relative">

        <div class="flex-1 flex flex-col justify-center items-center">
            <div
                class="w-full max-w-sm bg-white lg:bg-transparent p-6 lg:p-0 rounded-md shadow-sm border border-gray-100 lg:border-none lg:shadow-none">
                <div class="mb-6 lg:mb-8 text-center lg:text-left">
                    <div class="flex justify-center lg:justify-start mb-4 lg:mb-5">
                        <img src="{{ asset('src/img/logo.webp') }}" loading="lazy" alt="Logo IExxass"
                            class="h-8 lg:h-10 object-contain">
                    </div>
                    <h2 class="text-lg lg:text-xl font-bold text-gray-800">Login to your account</h2>
                </div>

                @if ($errors->any())
                    <div
                        class="mb-6 p-3 bg-red-50 text-red-600 text-[11px] leading-snug font-medium rounded-md border border-red-100 flex items-start gap-2 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.login.post') }}" method="POST" class="no-protector">
                    @csrf

                    <div class="hidden" aria-hidden="true">
                        <label for="__ks">Leave this blank</label>
                        <input type="text" name="__ks" id="__ks" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="mb-5">
                        <label for="email"
                            class="block text-[11px] lg:text-[12px] font-medium text-gray-700 mb-1.5">Email
                            address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required
                            autocomplete="email"
                            class="w-full px-3.5 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all duration-300 text-gray-700 placeholder:text-gray-400 text-[11px] lg:text-[12px] shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label for="password"
                            class="block text-[11px] lg:text-[12px] font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                required autocomplete="off"
                                class="w-full px-3.5 py-2 pr-10 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all duration-300 text-gray-700 placeholder:text-gray-400 text-[11px] lg:text-[12px] shadow-sm">

                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-gray-400 hover:text-primary focus:outline-none transition-colors">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-4 h-4 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-3 h-3 text-primary border-gray-300 rounded focus:ring-primary cursor-pointer accent-primary">
                        <label for="remember"
                            class="ml-1.5 text-[11px] lg:text-[11.5px] text-gray-600 cursor-pointer select-none">
                            Remember me
                        </label>
                    </div>

                    <div class="mb-6">
                        <x-admin.forms.recaptcha />
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary-dark text-white font-semibold py-2 rounded-md transition-all duration-300 text-[12px] shadow-md outline-none tracking-wide">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <footer class="w-full text-center mt-8 shrink-0">
            <p class="text-[10px] text-gray-500 font-medium">
                &copy; {{ date('Y') }} IExxass. All rights reserved.
            </p>
            <p class="text-[10px] text-gray-500 font-medium mt-0.5">
                Developed by <a href="/" class="text-primary font-semibold hover:underline">IExxass</a>
            </p>
        </footer>
    </div>

</body>

</html>
