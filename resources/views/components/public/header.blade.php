<header id="public-navbar" class="bg-white absolute top-10 md:top-2 left-0 w-full flex items-center z-10">
    <div class="container mx-auto font-AbhayaLibre ">
        <div class="relative flex items-center">
            <div class="flex items-center px-4 lg:flex-1 lg:justify-center">
                <button id="hamburger" name="hamburger" type="button" aria-label="Toggle navigation menu"
                    class="block absolute left-4 md:hidden group focus:outline-none">
                    <div class="relative w-7 h-7">
                        <!-- Hamburger Icon -->
                        <svg class="absolute inset-0 w-7 h-7 text-BG-IExxass transition-all duration-300 transform group-[.hamburger-active]:opacity-0 group-[.hamburger-active]:scale-50 group-[.hamburger-active]:-rotate-90"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <!-- Close Icon -->
                        <svg class="absolute inset-0 w-7 h-7 text-BG-IExxass transition-all duration-300 transform opacity-0 scale-50 rotate-90 group-[.hamburger-active]:opacity-100 group-[.hamburger-active]:scale-100 group-[.hamburger-active]:rotate-0"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </div>
                </button>
                <nav id="nav-menu"
                    class="hidden absolute py-6 bg-white/95 backdrop-blur-xl shadow-md border border-gray-100 w-[calc(100%-2rem)] left-4 top-[45px] rounded-md md:block md:w-auto md:border-none md:backdrop-blur-none md:mt-0 lg:mt-10 md:absolute md:left-1/2 md:-translate-x-1/2 md:top-1/2 lg:-translate-y-1/2 md:bg-transparent md:shadow-none md:max-w-full md:rounded-none z-50">
                    <ul class="block md:flex md:justify-center font-bold text-center">
                        <li class="group mb-2 md:mb-0">
                            <a href="#home" data-target="home"
                                class="menu-link text-[16px] py-2 md:mx-6 flex justify-center w-full group-hover:text-blue-600 transition-colors">{{ __('Home') }}</a>
                        </li>
                        <li class="group mb-2 md:mb-0">
                            <a href="#about-us" data-target="about-us"
                                class="menu-link text-[16px] py-2 md:mx-6 flex justify-center w-full group-hover:text-blue-600 transition-colors">{{ __('About Us') }}</a>
                        </li>
                        <li class="group mb-2 md:mb-0">
                            <a href="#service" data-target="service"
                                class="menu-link text-[16px] py-2 md:mx-6 flex justify-center w-full group-hover:text-blue-600 transition-colors">{{ __('Service') }}</a>
                        </li>
                        <li class="group mb-2 md:mb-0">
                            <a href="#projects" data-target="projects"
                                class="menu-link text-[16px] py-2 md:mx-6 flex justify-center w-full group-hover:text-blue-600 transition-colors">{{ __('Projects') }}</a>
                        </li>
                        <li class="group">
                            <a href="#contact" data-target="contact"
                                class="menu-link text-[16px] py-2 md:mx-6 flex justify-center w-full group-hover:text-blue-600 transition-colors">{{ __('Contact') }}</a>
                        </li>
                    </ul>
                </nav>
                <div class="block absolute right-[20px] md:mt-10 lg:right-1/6 xl:right-1/4 top-1/2 -translate-y-1/2">
                    <div class="relative w-fit">
                        <!-- Toggle Button -->
                        <button type="button" id="langToggleBtn"
                            class="inline-flex items-center gap-2 whitespace-nowrap rounded-radius border border-outline bg-BG-IExxass px-3 py-2 text-[12px] text-white rounded-3xl font-medium tracking-wide transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-outline-strong text-on-surface dark:text-on-surface-dark"
                            aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                            <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                class="size-3 rotate-0 transition-transform duration-300" id="langToggleIcon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="langDropdown"
                            class="absolute top-11 right-0 lg:left-0 lg:right-auto w-fit flex-col overflow-hidden rounded-md bg-white shadow-sm border border-gray-100 hidden opacity-0"
                            role="menu">
                            @foreach (config('app.available_locales') as $label => $locale)
                                <a href="{{ route('lang.switch', $locale) }}"
                                    class="bg-white px-4 py-2 text-BG-IExxass text-[12px] hover:bg-gray-100 transition-colors"
                                    role="menuitem"> {{ $label }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
