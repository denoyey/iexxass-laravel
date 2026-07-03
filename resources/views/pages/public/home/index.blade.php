@extends('layout.public')

@section('home')
    <div class="w-full h-full mb-40">
        <div
            class="container mx-auto mt-45 xl:mt-35 px-[20px] md:px-[100px] xl:px-[200px] flex justify-center items-center text-center font-AbhayaLibre text-black">
            <div class="flex flex-col items-center text-center gap-4">
                {{-- Logo + Title --}}
                <div class="flex items-end gap-4">
                    <img src="{{ asset('src/img/logoo.png') }}" alt="Logo"
                        class="w-10 h-20 md:w-18 md:h-auto mx-0 md:mx-10 object-contain">
                    <h1
                        class="text-4xl xl:text-8xl md:text-7xl tracking-[20px] md:tracking-[50px] xl:tracking-[60px] font-bold drop-shadow-2xl leading-none md:-translate-y-7 -translate-y-3">
                        Exxass </h1>
                </div>
                {{-- Tagline --}}
                <p class="text-[10px] md:text-xl py-2 text-black drop-shadow-xl tracking-[5px] md:tracking-[12px]">
                    Transforming the Future of Connectivity
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center mt-20 font-AbhayaLibre">
            <x-cta-whatsapp text="Let's Connect" class="bg-BG-IExxass text-white px-10 md:px-12 py-2 md:py-2.5 mx-2" />
            <button
                class="text-BG-IExxass border border-BG-IExxass px-6 md:px-9 py-2 md:py-2.5 mx-2 hover:bg-BG-IExxass hover:text-white transition"
                onclick="openModal('modelConfirm')">
                E-Book Portofolio
            </button>
            <x-confirm-modal id="modelConfirm" message="Are you download E-Book Portofolio?" :confirmUrl="route('file.download')" />
        </div>
    </div>
@endsection
