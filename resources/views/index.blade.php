@extends('layout.template')

@section('home')
    <div class="w-full  h-full mb-40">
        <div
            class="container   mx-auto mt-45 xl:mt-35 px-[20px] md:px-[100px] xl:px-[200px] flex justify-center items-center text-center font-AbhayaLibre text-black">
            <div class="flex flex-col items-center text-center gap-4">
                <!-- BARIS ATAS: LOGO + TEXT -->
                <div class="flex items-end gap-4">
                    <img src="{{ asset('src/img/logoo.png') }}" alt="Logo"
                        class="w-10 h-20 md:w-18 md:h-auto mx-0 md:mx-10 object-contain">
                    <h1
                        class=" text-4xl xl:text-8xl md:text-7xl tracking-[20px] md:tracking-[50px] xl:tracking-[60px] font-bold drop-shadow-2xl leading-none md:-translate-y-7 -translate-y-3">
                        Exxass </h1>
                </div>
                <!-- TEXT BAWAH -->
                <p class="  text-[10px] md:text-xl  py-2 text-black drop-shadow-xl tracking-[5px] md:tracking-[12px]">
                    Transforming the Future of Connectivity
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center mt-20 font-AbhayaLibre">
            <a href="https://wa.me/{{ config('app.contact_phone') }}?text={{ urlencode('Halo I’Exxass, saya tertarik dengan produk dan layanan Anda. Bolehkah saya mendapatkan informasi lebih lanjut?') }}"
                class="bg-BG-IExxass  text-white  px-10 md:px-12 py-2 md:py-2.5  mx-2">Let's Connect </a>
                 <button
                class="text-BG-IExxass border border-BG-IExxass  px-6 md:px-9 py-2 md:py-2.5 mx-2 hover:bg-BG-IExxass  hover:text-white transition"
                onclick="openModal('modelConfirm')">
                E-Book Portofolio
            </button>
            <div id="modelConfirm"
                class="fixed hidden z-50 inset-0 bg-white bg-opacity-85 overflow-y-auto h-full w-full px-4 ">
                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-transparent max-w-md">

                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200  hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 pt-0 text-center">
                        <svg class="w-20 h-20 text-BG-IExxass mx-auto" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you download E-Book Portofolio?</h3>
                        <a href="{{ route('file.download') }}" target="_blank" onclick="closeModal('modelConfirm')"
                            class=" border border-BG-IExxass text-BG-IExxass hover:bg-BG-IExxass hover:text-white focus:ring-4  font-medium  text-base inline-flex items-center px-5 py-2 text-center mr-2">
                            Yes, I'm sure
                        </a>
                        <a href="" onclick="closeModal('modelConfirm')"
                            class="border border-BG-IExxass text-BG-IExxass hover:bg-BG-IExxass hover:text-white focus:ring-4  font-medium  text-base inline-flex items-center px-8 py-2 text-center mr-2"
                            data-modal-toggle="delete-user-modal">
                            No, cancel
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

