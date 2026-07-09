@props(['icon', 'title', 'description', 'target', 'extraClass' => ''])

<div
    class="card flex flex-col h-full {{ $extraClass }} p-6 lg:p-8 xl:p-10 text-left bg-white/5 backdrop-blur-xl border border-white/10 rounded-md shadow-lg hover:bg-white/10 hover:shadow-2xl hover:border-white/20 transition-all duration-500 cursor-pointer">
    <div class="mb-6">
        @if ($icon)
            <img src="{{ asset($icon) }}" alt="{{ $title }}" loading="lazy"
                class="w-[60px] h-[60px] object-contain group-hover:scale-110 transition-transform duration-500">
        @endif
    </div>
    <div class="flex flex-col flex-1 text-white">
        <h2
            class="text-[22px] lg:text-[24px] xl:text-[28px] font-semibold mb-3 lg:mb-4 group-hover:text-blue-300 transition-colors duration-300">
            {{ $title }}</h2>
        <p class="text-[14px] lg:text-[15px] xl:text-[16px] leading-[1.7] text-gray-300 mb-6">
            {{ Str::limit($description, 130, '...') }}
        </p>
        <div class="mt-auto">
            <a href="#{{ $target }}" data-target="{{ $target }}"
                class="menu-link inline-flex items-center text-[15px] font-medium underline underline-offset-4 decoration-white/70 transition-all duration-300">
                Read More
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</div>
