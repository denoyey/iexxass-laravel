<div
    class="relative w-full -mt-px pt-16 pb-32 md:pt-24 md:pb-32 lg:pb-40 bg-black font-AbhayaLibre flex items-center justify-center overflow-hidden">

    <!-- Image Background with Black Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat pointer-events-none"
        style="background-image: url('{{ asset('src/img/bg-footer.webp') }}');">
    </div>
    <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>

    <!-- Top Fade (Smoothly blends the blue boundary into the black photo) -->
    <div
        class="absolute top-0 left-0 w-full h-24 bg-linear-to-b from-BG-IExxass to-BG-IExxass/0 pointer-events-none z-10">
    </div>

    <div class="relative z-10 container mx-auto px-6 md:px-12 lg:px-24">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-32 items-center">

            <!-- Left: Typography & Info -->
            <div class="section-header text-left pt-10">
                <h1
                    class="text-[36px] md:text-[65px] lg:text-[40px] xl:text-[50px] 2xl:text-[60px] text-white font-bold leading-[1.05] mb-6 md:mb-8">
                    {{ __("Let's connect.") }}
                </h1>
                <p
                    class="text-gray-300 text-[15px] md:text-[22px] lg:text-[15px] xl:text-[16px] 2xl:text-[18px] leading-relaxed max-w-lg font-light">
                    {{ __('We would love to hear from you. Whether you have a question about our services or need assistance with your project, our team is ready to help.') }}
                </p>
            </div>

            <!-- Right: Card-less Form with Underline Inputs -->
            <div class="section-header w-full pt-0 lg:pt-10">
                <form method="POST" action="{{ route('contact.us') }}" id="contactForm">
                    @csrf
                    <div id="statusMessage" class="text-blue-300 text-sm mb-6"></div>

                    <div class="space-y-8 md:space-y-12">
                        <!-- Name & Email (Row) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                            <div class="relative group">
                                <label for="name"
                                    class="block text-[10px] md:text-[12px] font-semibold tracking-[2px] text-gray-400 uppercase mb-1 md:mb-2 transition-colors group-focus-within:text-white">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name"
                                    class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-1 md:py-1.5 text-white text-[14px] md:text-[16px] placeholder-transparent focus:outline-none focus:ring-0 focus:border-white transition-all duration-300"
                                    placeholder="John Doe" required autocomplete="name" />
                            </div>

                            <div class="relative group">
                                <label for="email"
                                    class="block text-[10px] md:text-[12px] font-semibold tracking-[2px] text-gray-400 uppercase mb-1 md:mb-2 transition-colors group-focus-within:text-white">{{ __('Email Address') }}</label>
                                <input type="email" id="email" name="email"
                                    class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-1 md:py-1.5 text-white text-[14px] md:text-[16px] placeholder-transparent focus:outline-none focus:ring-0 focus:border-white transition-all duration-300"
                                    placeholder="john@example.com" required autocomplete="email" />
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="relative group">
                            <label for="subject"
                                class="block text-[10px] md:text-[12px] font-semibold tracking-[2px] text-gray-400 uppercase mb-1 md:mb-2 transition-colors group-focus-within:text-white">{{ __('Subject') }}</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-1 md:py-1.5 text-white text-[14px] md:text-[16px] placeholder-transparent focus:outline-none focus:ring-0 focus:border-white transition-all duration-300"
                                placeholder="How can we help?" required autocomplete="off" />
                        </div>

                        <!-- Message -->
                        <div class="relative group">
                            <label for="message"
                                class="block text-[10px] md:text-[12px] font-semibold tracking-[2px] text-gray-400 uppercase mb-1 md:mb-2 transition-colors group-focus-within:text-white">{{ __('Message') }}</label>
                            <textarea id="message" rows="1" name="message"
                                class="w-full bg-transparent border-0 border-b border-white/30 px-0 py-1 md:py-1.5 text-white text-[14px] md:text-[16px] placeholder-transparent focus:outline-none focus:ring-0 focus:border-white transition-all duration-300 resize-none"
                                placeholder="Write your message here..." required autocomplete="off"></textarea>
                        </div>
                    </div>

                    <!-- ReCaptcha & Submit Button (Outside space-y-12 to eliminate huge gaps) -->
                    <div class="mt-6 flex flex-col gap-4">
                        <!-- ReCaptcha (Matched with Admin Login) -->
                        @if (env('RECAPTCHA_SITE_KEY'))
                            <div class="mb-4">
                                <div class="h-[59px] w-[228px]">
                                    <div class="g-recaptcha transform scale-[0.75] origin-top-left"
                                        data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                </div>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="text-left mt-1">
                            <button type="submit" id="submitBtn"
                                class="w-full sm:w-auto inline-block border border-white bg-transparent text-white hover:bg-white hover:text-BG-IExxass font-bold text-[11px] md:text-[12px] lg:text-[10px] xl:text-[11px] tracking-[3px] uppercase px-8 py-3 md:px-10 md:py-3 lg:px-6 lg:py-2 xl:px-8 xl:py-2.5 rounded-none transition-all duration-300">
                                {{ __('Send Message') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
