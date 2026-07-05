<a href="{{ route('admin.services.header.index') }}"
    class="flex-1 lg:flex-none justify-center lg:justify-start px-2 sm:px-3 py-1.5 sm:py-2 rounded-md text-[11.5px] sm:text-[13px] font-medium transition-colors flex items-center gap-1.5 sm:gap-2.5 {{ request()->routeIs('admin.services.header.*') ? 'bg-primary/10 text-primary' : 'text-gray-600 hover:bg-gray-50' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 sm:w-[15px] sm:h-[15px] shrink-0" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
    </svg>
    <span class="whitespace-nowrap">Page Header</span>
</a>

<a href="{{ route('admin.services.quote.edit') }}"
    class="flex-1 lg:flex-none justify-center lg:justify-start px-2 sm:px-3 py-1.5 sm:py-2 rounded-md text-[11.5px] sm:text-[13px] font-medium transition-colors flex items-center gap-1.5 sm:gap-2.5 {{ request()->routeIs('admin.services.quote.*') ? 'bg-primary/10 text-primary' : 'text-gray-600 hover:bg-gray-50' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 sm:w-[15px] sm:h-[15px] shrink-0" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
    </svg>
    <span class="whitespace-nowrap">Quote Section</span>
</a>

<a href="{{ route('admin.services.items.index') }}"
    class="flex-1 lg:flex-none justify-center lg:justify-start px-2 sm:px-3 py-1.5 sm:py-2 rounded-md text-[11.5px] sm:text-[13px] font-medium transition-colors flex items-center gap-1.5 sm:gap-2.5 {{ request()->routeIs('admin.services.items.*') ? 'bg-primary/10 text-primary' : 'text-gray-600 hover:bg-gray-50' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 sm:w-[15px] sm:h-[15px] shrink-0" fill="none"
        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
    </svg>
    <span class="whitespace-nowrap">Services List</span>
</a>
