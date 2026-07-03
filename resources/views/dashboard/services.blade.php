<div class="w-full h-full  lg:py-0  bg-BG-IExxass font-AbhayaLibre">
    <div class="container  mx-auto py-30 md:py-20 lg:py-0 px-[20px] md:px-[100px]   text-center justify-center">
        <h1 class="header text-[50px] text-white font-bold">
            {{ __('message.service.judul') }}
        </h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 mt-10 xl:mt-0 gap-4 ">
            <div class="card header flex flex-col  px-[30px] md:px-[10px]">
                <img src="{{ asset('src/img/web-dev.png') }}" alt="" class="w-20 h-20">
                <div class="flex flex-col  py-4 text-white text-left">
                    <h1 class="text-4xl">Web Developer</h1>
                    <p class="text-[20px]">
                        {{ Str::limit(__('message.service.desc-web'), 150) }}
                    </p>
                    <div class="mt-5 text-[20px]">
                        <a href="javascript:void(0)" data-target="web-dev" class="  menu-link underline">Read More</a>
                    </div>
                </div>
            </div>
            <div class="card header flex flex-col  translate-y-20  px-[30px] md:px-[10px]">
                <img src="{{ asset('src/img/network.png') }}" alt="" class="w-20 h-20">
                <div class="flex flex-col py-4 text-white text-left">
                    <h1 class="text-3xl ">Networking & CCTV Solutions</h1>
                    <p class="text-[20px]">
                        {{ Str::limit(__('message.service.desc-net'), 150) }} </p>
                    <div class="mt-5 text-[20px]">
                        <a href="javascript:void(0)" data-target="network" class="menu-link network underline">Read
                            More</a>
                    </div>
                </div>
            </div>
            <div class="card header flex flex-col  translate-y-40  px-[30px] md:px-[10px]">
                <img src="{{ asset('src/img/consultant.png') }}" alt="" class="w-20 h-20">
                <div class="flex flex-col py-4  text-white text-left">
                    <h1 class="text-3xl">IT Contsultant </h1>
                    <p class="text-[20px]">
                        {{ Str::limit(__('message.service.desc-it'), 150) }}
                    </p>
                    <div class="mt-5 text-[20px]">
                        <a href="javascript:void(0)" data-target="it-consultant" class="menu-link underline">Read
                            More</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="web-dev mt-[200px] ">
        <div class="wmt-20 md:mt-96 bg-BG-IExxass">
            <div class="container mx-auto px-[20px] md:px-[100px]">
                <h1 class="header text-white items-center text-center text-[28px] md:text-[35px]">
                    {{ __('message.service.qoute') }} <br> <br>
                    <span class="text-[30px] header">Transforming The Future of Connectivity </span>
                </h1>
            </div>

        </div>
        <section id="web-dev">
            <div class="container mx-auto px-[20px] mt-60 md:px-[100px]  grid grid-cols-1  xl:grid-cols-2">
                <div class="image ">
                    <img src="{{ asset('src/img/bg-webDevv.png') }} " class="header blur-[3px] w-full" alt="">
                </div>
                <div class="text-white mt-10 xl:mt-0 px-[20px]  xl:px-[50px]  py-[15px] font-AbhayaLibre ">
                    <h1 class="text-4xl md:text-4xl header">Web Developer</h1>
                    <p class="text-[15px] md:text-[18px] text-justify header">{{ __('message.service.desc-web') }}</p>
                    <h1 class="text-3xl py-5 md:py-5 header">{{ __('message.service.why') }}</h1>
                    <ol class=" list-decimal list-outside flex flex-col gap-y-2.5 text-[15px] md:text-[18px] px-[15px]">
                        <li class="header">
                            {{ __('message.service.web-one') }}
                        </li>
                        <li class="header">
                            {{ __('message.service.web-two') }}
                        <li class="header">
                            {{ __('message.service.web-there') }}
                        </li>
                        <li class="header">
                            {{ __('message.service.web-four') }}

                        </li>
                        <li class="header">
                            {{ __('message.service.web-five') }}

                        </li>
                        <li class="header">
                            {{ __('message.service.web-six') }}
                        </li>
                        <li class="header">
                            {{ __('message.service.web-seven') }}

                        </li>
                    </ol>
                    <div class="mt-10">
                        <h1 class=" text-3xl md:text-3xl py-10 header">Start From Rp.3.500.000</h1>
                        <a href="https://wa.me/{{ config('app.contact_phone') }}?text={{ urlencode('Halo I’Exxass, saya tertarik dengan produk dan layanan Anda. Bolehkah saya mendapatkan informasi lebih lanjut?') }}"
                            class="header border border-BG-White text-BG-White hover:bg-white hover:text-BG-IExxass px-10 py-3 ">Let's
                            Connect Me</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="web-dev mt-[100px]">
            <div class="web-dev mt-[200px] ">
                <section id="network">
                    <div class="container  mx-auto px-[20px] md:px-[100px]  grid grid-cols-1  xl:grid-cols-2">
                        <div class="image xl:order-2 order-1  ">
                            <img src="{{ asset('src/img/networking.png') }}" class="header blur-[3px] w-full xl:h-[800px]"
                                alt="">
                        </div>
                        <div
                            class=" xl:order-1 order-2 text-white mt-10 xl:mt-0 px-[20px]  xl:px-[50px]  py-[15px] font-AbhayaLibre ">
                            <h1 class="text-4xl md:text-4xl header">Networking & CCTV Solutions</h1>
                            <p class="text-[15px] md:text-[18px] text-justify header">{{ __('message.service.desc-net') }}</p>
                            <h1 class="text-3xl py-5 md:py-5 header">{{ __('message.service.why') }}</h1>
                            <ol
                                class="list-decimal list-outside flex flex-col gap-y-2.5 text-[15px] md:text-[18px]  px-[15px]">
                                <li class="header">
                                    {{ __('message.service.net-one') }}

                                </li>
                                <li class="header">
                                    {{ __('message.service.net-two') }}
                                </li>
                                <li class="header">
                                    {{ __('message.service.net-there') }}
                                </li>
                                <li class="header">
                                    {{ __('message.service.net-four') }}

                                </li>
                            </ol>
                            <div class="mt-10">
                                <h1 class=" text-3xl md:text-3xl py-10 header">Start From Rp. 750.000</h1>
                                <a href="https://wa.me/{{ config('app.contact_phone') }}?text={{ urlencode('Halo I’Exxass, saya tertarik dengan produk dan layanan Anda. Bolehkah saya mendapatkan informasi lebih lanjut?') }}"
                                    class=" header border border-BG-White text-BG-White hover:bg-white hover:text-BG-IExxass px-10 py-3 ">Let's
                                    Connect Me</a>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section id="it-consultant">
                <div class="relative w-full h-full mt-[100px]">
                    <div class="container mx-auto px-[20px] md:px-[100px]  grid grid-cols-1  xl:grid-cols-2">
                        <div class="image ">
                            <img src="{{ asset('src/img/bg-consultant.png') }}"
                                class="header blur-[3px] w-full h-full md:h-[750px] " alt="">
                        </div>
                        <div class="text-white mt-10 xl:mt-0 px-[20px]  xl:px-[50px]  py-[15px] font-AbhayaLibre ">
                            <h1 class="text-4xl md:text-4xl header">IT Contsultant</h1>
                           <p class="text-[15px] md:text-[18px] text-justify header">{{ __('message.service.desc-it') }}</p>
                            <h1 class="text-3xl py-5 md:py-5 header">{{ __('message.service.why') }}</h1>
                            <ol
                                class="list-decimal list-outside flex flex-col gap-y-2.5 text-[15px] md:text-[18px] px-[15px]">
                                <li class="header">
                                    {{ __('message.service.it-one') }}

                                </li>
                                <li class="header">
                                   {{ __('message.service.it-two') }}
                                <li class="header">
                                 {{ __('message.service.it-there') }} </li>
                                <li class="header">
                                  {{ __('message.service.it-four') }}

                                </li>
                            </ol>
                            <div class="mt-10 mb-20 xl:mb-96">
                                {{-- <h1 class=" text-3xl md:text-5xl ">Start From Rp. 5.000.000</h1> --}}
                                <a href="https://wa.me/{{ config('app.contact_phone') }}?text={{ urlencode('Halo I’Exxass, saya tertarik dengan produk dan layanan Anda. Bolehkah saya mendapatkan informasi lebih lanjut?') }}"
                                    class="header border border-BG-White text-BG-White hover:bg-white hover:text-BG-IExxass px-10 py-3 ">Let's
                                    Connect Me</a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
