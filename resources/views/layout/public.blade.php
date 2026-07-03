<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Search Console --}}
    <meta name="google-site-verification" content="GC8Iz8PEN1c6CkngHXxVCILdrWxsd7liPz6UTdIwxvs" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Seo META --}}
    <meta name="description"
        content="IExxass is provides innovative ICT solutions, including web development, Networking & CCTV, and IT consultancy to help businesses grow securely.">
    <meta name="keywoards"
        content="ICT solutions, Web development services, Networking and CCTV , IT consultancy , Digital transformation , Business technology solutions ">
    <meta name="image" content="{{ asset('src/img/bg-iexxass.png') }}">
    {{-- Meta OG Sosial Media --}}
    <meta property="og:title" content="IExxass | ICT Solutions, Web Development & IT Consultancy" />
    <meta property="og:type" content="website" />
    <meta property="og:description"
        content="IExxass provides innovative ICT solutions, including web development, Networking & CCTV, and IT consultancy to help businesses grow securely." />
    <meta property="og:url" content="https://iexxass.com">
    <meta property="og:image" content="{{ asset('src/img/bg-iexxass.png') }}" />
    <meta property="og:locale" content="en_US" />
    {{-- End  --}}

    <title>{{ $title }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
    <link rel="canonical" href="https://iexxass.com" />
    <link rel="icon" type="image/png" href="{{ asset('src/img/logo.png') }}">
</head>

<body class="bg-white">
    <section id="home">
        <x-header />
        @yield('home')
    </section>
    <section id="about-us">
        @include('pages.public.about.index')
    </section>
    <section id="service">
        @include('pages.public.services.index')
    </section>
    <section id="contact">
        @include('pages.public.contact.index')
    </section>
    <section id="footer">
        <x-footer />
        <div id='tawk_69270f78484b63196744524f'></div>
    </section>

    @stack('scripts')
</body>

</html>
