@extends('layout.public')

@section('home')
    <div class="w-full h-full mb-40">
        <div
            class="container mx-auto mt-45 xl:mt-35 px-[20px] md:px-[100px] xl:px-[200px] flex justify-center items-center text-center font-AbhayaLibre text-black">
            <div class="flex flex-col items-center text-center gap-4">
                {{-- Logo + Title --}}
                <div class="flex items-end justify-center gap-3 md:gap-5 w-full">
                    <img src="{{ asset('src/img/logoo.png') }}" alt="Logo" loading="lazy"
                        class="hero-anim shrink-0 w-9 h-[60px] md:w-16 md:h-auto mx-0 object-contain will-change-transform">
                    <div class="relative" style="clip-path: inset(-50% -50% -50% 0);">
                        <h1
                            class="hero-anim text-4xl xl:text-8xl md:text-7xl tracking-[12px] md:tracking-[50px] xl:tracking-[60px] font-bold drop-shadow-none md:drop-shadow-2xl leading-none md:-translate-y-7 -translate-y-3 will-change-transform">
                            Exxass </h1>
                    </div>
                </div>
                {{-- Tagline --}}
                <p
                    class="hero-anim text-[10px] md:text-xl py-2 text-black drop-shadow-none md:drop-shadow-xl tracking-[5px] md:tracking-[12px] will-change-transform">
                    Transforming the Future of Connectivity
                </p>
            </div>
        </div>
        <div class="hero-anim flex flex-row items-center justify-center mt-20 font-AbhayaLibre gap-3 md:gap-4">
            <x-cta-whatsapp text="Let's Connect"
                class="bg-BG-IExxass text-white text-sm md:text-base px-6 md:px-12 py-2 md:py-2.5" />
            <button
                class="text-BG-IExxass border border-BG-IExxass text-sm md:text-base px-5 md:px-9 py-2 md:py-2.5 hover:bg-BG-IExxass hover:text-white transition"
                onclick="openModal('modelConfirm')">
                E-Book Portofolio
            </button>
        </div>
        <x-pdf-modal id="modelConfirm" pdfUrl="{{ asset('uploads/pdf/portofolio.pdf') }}"
            downloadUrl="{{ route('file.download') }}" />
    </div>
@endsection
