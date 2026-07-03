<div class="w-full h-full lg:py-0 bg-BG-IExxass font-AbhayaLibre">
    <div class="container mx-auto py-30 md:py-20 lg:py-0 px-[20px] md:px-[100px] text-center justify-center">
        <h1 class="header text-[50px] text-white font-bold">
            {{ __('message.service.judul') }}
        </h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 mt-10 xl:mt-0 gap-4">
            <x-service-card icon="src/img/web-dev.png" title="Web Developer" :description="__('message.service.desc-web')" target="web-dev" />

            <x-service-card icon="src/img/network.png" title="Networking & CCTV Solutions" :description="__('message.service.desc-net')"
                target="network" extraClass="translate-y-20" />

            <x-service-card icon="src/img/consultant.png" title="IT Consultant" :description="__('message.service.desc-it')" target="it-consultant"
                extraClass="translate-y-40" />
        </div>
    </div>

    {{-- Quote Section --}}
    <div class="web-dev mt-[200px]">
        <div class="wmt-20 md:mt-96 bg-BG-IExxass">
            <div class="container mx-auto px-[20px] md:px-[100px]">
                <h1 class="header text-white items-center text-center text-[28px] md:text-[35px]">
                    {{ __('message.service.qoute') }} <br> <br>
                    <span class="text-[30px] header">Transforming The Future of Connectivity</span>
                </h1>
            </div>
        </div>

        {{-- Web Developer Detail --}}
        <x-service-detail id="web-dev" image="src/img/bg-webDevv.png" title="Web Developer" :description="__('message.service.desc-web')"
            :features="[
                __('message.service.web-one'),
                __('message.service.web-two'),
                __('message.service.web-there'),
                __('message.service.web-four'),
                __('message.service.web-five'),
                __('message.service.web-six'),
                __('message.service.web-seven'),
            ]" price="Start From Rp.3.500.000" />

        {{-- Networking & CCTV Detail --}}
        <div class="web-dev mt-[100px]">
            <div class="web-dev mt-[200px]">
                <x-service-detail id="network" image="src/img/networking.png" title="Networking & CCTV Solutions"
                    :description="__('message.service.desc-net')" :features="[
                        __('message.service.net-one'),
                        __('message.service.net-two'),
                        __('message.service.net-there'),
                        __('message.service.net-four'),
                    ]" price="Start From Rp. 750.000" :reverse="true"
                    imageClass="xl:h-[800px]" />
            </div>

            {{-- IT Consultant Detail --}}
            <x-service-detail id="it-consultant" image="src/img/bg-consultant.png" title="IT Consultant"
                :description="__('message.service.desc-it')" :features="[
                    __('message.service.it-one'),
                    __('message.service.it-two'),
                    __('message.service.it-there'),
                    __('message.service.it-four'),
                ]" imageClass="h-full md:h-[750px]" />
        </div>
    </div>
