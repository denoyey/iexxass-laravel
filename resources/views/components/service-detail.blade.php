@props([
    'id',
    'image',
    'title',
    'description',
    'features' => [],
    'price' => null,
    'reverse' => false,
    'imageClass' => '',
])

<section id="{{ $id }}" class="service-detail-section py-24 md:py-32 overflow-hidden">
    <div class="container mx-auto px-6 md:px-12 lg:px-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            <!-- Elegant Image Column -->
            <div
                class="{{ $reverse ? 'lg:order-2 order-1' : 'order-1' }} service-anim relative service-image-container cursor-pointer">
                <!-- Ambient Hover Glow -->
                <div class="image-glow absolute -inset-4 bg-blue-500/20 rounded-md blur-xl opacity-0">
                </div>
                <div
                    class="relative rounded-md overflow-hidden border border-white/10 shadow-2xl h-[300px] sm:h-[400px] lg:h-[600px] xl:h-[650px]">
                    <img src="{{ asset($image) }}" class="service-img w-full h-full object-cover transform"
                        alt="{{ $title }}" loading="lazy">
                    <div
                        class="absolute inset-0 bg-linear-to-t from-[#050B65]/90 via-transparent to-transparent opacity-80 pointer-events-none">
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="{{ $reverse ? 'lg:order-1 order-2' : 'order-2' }} text-white font-AbhayaLibre">
                <h1 class="service-anim text-[32px] md:text-[40px] lg:text-[50px] font-bold leading-tight mb-4 md:mb-6">
                    {{ $title }}</h1>
                <div
                    class="service-anim w-20 h-1 bg-linear-to-r from-blue-400 to-transparent mb-6 md:mb-8 rounded-full">
                </div>

                <p class="service-anim text-[16px] md:text-[18px] lg:text-[20px] leading-relaxed text-gray-200 mb-8">
                    {{ $description }}</p>

                <div class="flex flex-col">
                    <!-- Action & Price Section -->
                    <div
                        class="service-anim order-2 md:order-1 pt-8 md:pt-0 mt-4 md:mt-0 mb-0 md:mb-12 pb-2 md:pb-8 border-t md:border-t-0 md:border-b border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-5 sm:gap-8 w-full">
                        @if ($price)
                            <div class="w-full sm:w-auto text-left">
                                <span
                                    class="block text-[11px] md:text-sm text-blue-300 uppercase tracking-[3px] mb-1 sm:mb-2">Starting
                                    From</span>
                                <span
                                    class="text-[24px] sm:text-[26px] md:text-[32px] font-bold text-white tracking-wide block">
                                    {{ str_replace(['Start From ', 'Start from '], '', $price) }}
                                </span>
                            </div>
                        @endif

                        <x-cta-whatsapp text="Let's Connect"
                            class="w-full sm:w-auto text-center inline-block border border-white/30 text-white hover:bg-white hover:text-BG-IExxass active:bg-white active:text-BG-IExxass active:scale-95 px-8 py-3 rounded-md transition-all duration-200 uppercase tracking-[3px] text-xs font-semibold" />
                    </div>

                    <!-- Why Choose Section -->
                    <div class="order-1 md:order-2 flex flex-col">
                        <h2
                            class="service-anim text-[20px] md:text-[24px] lg:text-[28px] font-semibold mb-6 md:mb-8 text-blue-300">
                            {{ __('message.service.why') }}
                        </h2>

                        <!-- Custom Premium List with Scrollable Container -->
                        <div
                            class="service-anim max-h-[280px] md:max-h-[320px] overflow-y-auto pr-4 -mr-4 
                                    [&::-webkit-scrollbar]:w-1! 
                                    [&::-webkit-scrollbar-track]:bg-transparent! 
                                    [&::-webkit-scrollbar-thumb]:bg-blue-400/30! [&::-webkit-scrollbar-thumb]:rounded-full! hover:[&::-webkit-scrollbar-thumb]:bg-blue-400/60!">
                            <ol
                                class="list-none grid grid-cols-1 sm:grid-cols-2 gap-6 text-[16px] md:text-[18px] text-gray-300">
                                @foreach ($features as $index => $feature)
                                    <li class="flex items-start group/item">
                                        <span
                                            class="shrink-0 flex items-center justify-center w-8 h-8 rounded-full bg-blue-500/10 text-blue-300 font-bold text-sm mr-5 border border-blue-500/30 group-hover/item:bg-blue-500/30 group-hover/item:border-blue-400 transition-colors duration-300">
                                            {{ $index + 1 }}
                                        </span>
                                        <span
                                            class="mt-1 leading-relaxed text-sm md:text-base">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
