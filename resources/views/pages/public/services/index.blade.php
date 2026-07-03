<div class="relative w-full bg-BG-IExxass font-AbhayaLibre py-24 md:py-32 overflow-hidden">
    <!-- Ambient Background Glows for Elegance -->
    <div
        class="absolute top-40 left-0 w-[500px] h-[500px] bg-blue-500/15 rounded-full blur-[150px] pointer-events-none mix-blend-screen">
    </div>

    <div class="relative z-10 container mx-auto px-6 md:px-12 lg:px-20 text-center justify-center mb-24 md:mb-40">
        <!-- Elegant Header with Subtitle -->
        <div class="mb-14 xl:mb-20">
            <span
                class="text-blue-300 font-semibold tracking-[4px] uppercase text-sm md:text-base mb-4 block opacity-80">What
                We Offer</span>
            <h1 class="header text-[36px] md:text-[45px] lg:text-[55px] text-white font-bold leading-tight">
                {{ __('message.service.judul') }}
            </h1>
            <div
                class="w-24 h-1 bg-linear-to-r from-transparent via-blue-400 to-transparent mx-auto mt-8 rounded-full opacity-70">
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            <x-service-card icon="src/img/web-dev.png" title="Web Developer" :description="__('message.service.desc-web')" target="web-dev" />

            <x-service-card icon="src/img/network.png" title="Networking & CCTV Solutions" :description="__('message.service.desc-net')"
                target="network" />

            <x-service-card icon="src/img/consultant.png" title="IT Consultant" :description="__('message.service.desc-it')"
                target="it-consultant" />
        </div>
    </div>

    {{-- Minimalist Premium Quote Section --}}
    <div
        class="quote-container relative w-full min-h-[70vh] md:min-h-screen flex items-center justify-center px-6 md:px-12 lg:px-20 py-20">

        <!-- Dynamic Light Effects -->
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-blue-500/20 rounded-full blur-[120px] pointer-events-none mix-blend-screen">
        </div>
        <div
            class="absolute top-0 right-1/4 w-[400px] h-[400px] bg-cyan-400/15 rounded-full blur-[100px] pointer-events-none mix-blend-screen">
        </div>

        <div class="relative w-full max-w-5xl text-center">

            <!-- Small Accent Icon -->
            <div class="quote-element relative z-10 mx-auto w-12 h-12 mb-8 text-blue-400 opacity-60">
                <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                </svg>
            </div>

            <!-- Main Quote -->
            <h2
                class="quote-element relative z-10 text-[30px] md:text-[45px] lg:text-[55px] leading-[1.3] md:leading-tight font-bold italic mb-12 bg-linear-to-r from-white via-blue-100 to-gray-400 bg-clip-text text-transparent">
                "{{ __('message.service.qoute') }}"
            </h2>

            <!-- Sleek Separator -->
            <div
                class="quote-element relative z-10 w-full max-w-[150px] mx-auto h-[2px] bg-linear-to-r from-transparent via-blue-400/80 to-transparent mb-12 shadow-[0_0_15px_rgba(59,130,246,0.5)]">
            </div>

            <!-- Sub Quote -->
            <p
                class="quote-element relative z-10 text-blue-200 text-[14px] md:text-[18px] tracking-[5px] md:tracking-[8px] uppercase font-semibold opacity-90">
                Transforming The Future of Connectivity
            </p>
        </div>
    </div>

    {{-- Web Developer Detail --}}
    <x-service-detail id="web-dev" image="src/img/webdev.webp" title="Web Developer" :description="__('message.service.desc-web')"
        :features="[
            __('message.service.web-one'),
            __('message.service.web-two'),
            __('message.service.web-there'),
            __('message.service.web-four'),
            __('message.service.web-five'),
            __('message.service.web-six'),
            __('message.service.web-seven'),
        ]" price="Start From Rp. 3.500.000 / $225" />

    {{-- Networking & CCTV Detail --}}
    <x-service-detail id="network" image="src/img/networking.png" title="Networking & CCTV Solutions"
        :description="__('message.service.desc-net')" :features="[
            __('message.service.net-one'),
            __('message.service.net-two'),
            __('message.service.net-there'),
            __('message.service.net-four'),
        ]" price="Start From Rp. 750.000 / $50" :reverse="true"
        imageClass="lg:h-[700px]" />

    {{-- IT Consultant Detail --}}
    <x-service-detail id="it-consultant" image="src/img/itconsultant.webp" title="IT Consultant" :description="__('message.service.desc-it')"
        :features="[
            __('message.service.it-one'),
            __('message.service.it-two'),
            __('message.service.it-there'),
            __('message.service.it-four'),
        ]" imageClass="lg:h-[700px]" />
</div>
