<header class="bg-white absolute top-10 md:top-2 left-0 w-full flex items-center z-10">
    <div class="container mx-auto font-AbhayaLibre ">
        <div class="relative flex items-center">
            <div class="flex items-center px-4 lg:flex-1 lg:justify-center">
                <button id="hamburger" name="hamburger" type="button" class="block absolute left-4 md:hidden">
                    <span class="hamburger-line trantion duration-300  ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line trantion duration-300 ease-in-out origin-bottom-left-left"></span>
                </button>
                <nav id="nav-menu"
                    class="hidden absolute py-5  bg-white shadow-lg max-w-[200px] w-full mt-15 md:mt-0 lg:mt-10 left-0 top-full   md:block md:absolute md:left-1/2 md:-translate-x-1/2 md:top-1/2 lg:-translate-y-1/2 md:bg-transparent md:shadow-none md:max-w-full rounded-br-4xl">
                    <ul class="block md:flex md:justify-center font-bold ">
                        <li class="group">
                            <a href="javascript:void(0)" data-target="home"
                                class=" menu-link text-base  py-2 mx-8 flex group-hover:text-black">Home</a>
                        </li>
                        <li class="group">
                            <a href="javascript:void(0)" data-target="about-us"
                                class="menu-link text-base py-2 mx-8 flex group-hover:text-black">About Us</a>
                        </li>
                        <li class="group">
                            <a href="javascript:void(0)" data-target="service"
                                class="menu-link text-base  py-2 mx-8 flex group-hover:text-black">Service</a>
                        </li>
                        <li class="group">
                            <a href="javascript:void(0)"
                                data-target="contact"class="menu-link text-base  py-2 mx-8 flex group-hover:text-black">Contact</a>
                        </li>
                    </ul>


                </nav>
                <div class="block absolute right-[20px] md:mt-10 lg:right-1/6 xl:right-1/4 top-1/2 -translate-y-1/2">

                    <div x-data="{ isOpen: false, openedWithKeyboard: false }" class="relative w-fit"
                        x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                        <!-- Toggle Button -->
                        <button type="button" x-on:click="isOpen = ! isOpen"
                            class="inline-flex items-center gap-2 whitespace-nowrap rounded-radius border border-outline bg-BG-IExxass px-3 py-2 text-[12px] text-white rounded-3xl font-medium tracking-wide transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-outline-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:focus-visible:outline-outline-dark-strong"
                            aria-haspopup="true" x-on:keydown.space.prevent="openedWithKeyboard = true"
                            x-on:keydown.enter.prevent="openedWithKeyboard = true"
                            x-on:keydown.down.prevent="openedWithKeyboard = true"
                            x-bind:class="isOpen || openedWithKeyboard ? 'text-on-surface-strong dark:text-on-surface-dark-strong' :
                                'text-on-surface dark:text-on-surface-dark'"
                            x-bind:aria-expanded="isOpen || openedWithKeyboard">
                            ID/EN
                            <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3 rotate-0">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
                            x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                            x-on:keydown.down.prevent="$focus.wrap().next()"
                            x-on:keydown.up.prevent="$focus.wrap().previous()"
                            class="absolute top-11 left-0 flex w-fit flex-col overflow-hidden rounded-radius  bg-surface-alt"
                            role="menu">
                            @foreach (config('app.available_locales') as $label => $locale)
                            <a href="{{ route('lang.switch', $locale) }}"
                                class="bg-surface-alt px-4  py-2 text-BG-IExxass text-[12px] text-on-surface  "
                                role="menuitem"> {{ $label }}</a>
                          @endforeach 
                         
                        </div>
                    </div>

                    {{-- @foreach (config('app.available_locales') as $label => $locale)
                    <a href="{{ route('lang.switch', $locale) }}" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="px-5 py-2 bg-BG-IExxass text-white rounded-full hover:bg-BG-IExxass hover:text-white transition">
                       {{ $label }}
                    </a>
                    @endforeach --}}

                </div>

            </div>
        </div>
    </div>
</header>
