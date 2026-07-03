<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     {{-- Search Console --}}
    <meta name="google-site-verification" content="GC8Iz8PEN1c6CkngHXxVCILdrWxsd7liPz6UTdIwxvs" />
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.3/dist/cdn.min.js"></script>
    <!--reCACPTCHA GOOGLE-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- Font Family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="{{ asset('src/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-white">
    <section id="home">
        @include('layout.header')
        @yield('home')
    </section>
    <section id="about-us">
        @include('dashboard.about')
    </section>
    <section id="service">
        @include('dashboard.services')
    </section>
    <section id="contact">
        @include('dashboard.contact')
        {{-- @include('emails.contact') --}}
    </section>
    <section id="footer">
        @include('layout.footer')
        <div id='tawk_69270f78484b63196744524f'></div>
        {{-- Component Footer => Component > Footer  --}}
        @stack('map')
    </section>
</body>

</html>
