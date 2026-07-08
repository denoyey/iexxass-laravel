<aside id="admin-sidebar"
    class="fixed top-0 left-0 h-full w-[240px] bg-white border-r border-gray-200 z-110 lg:z-40
           flex flex-col overflow-hidden whitespace-nowrap
           transition-all duration-300 ease-in-out
           -translate-x-full lg:translate-x-0 in-[.sidebar-open]:translate-x-0
           lg:in-[.sidebar-collapsed]:w-[64px]
           [.sidebar-collapsed_&_.sidebar-label]:hidden
           [.sidebar-collapsed_&_.section-toggle_.chevron-icon]:hidden
           [.sidebar-collapsed_&_.nav-item]:justify-center
           [.sidebar-collapsed_&_.nav-item]:px-0
           [.sidebar-collapsed_&_.logo-wrapper]:justify-center
           [.sidebar-collapsed_&_.logo-wrapper]:px-0
           lg:[.sidebar-collapsed_&_.section-content]:max-h-none!
           lg:[.sidebar-collapsed_&_.section-content]:opacity-100!
           lg:[.sidebar-collapsed_&_.section-content]:!visibility-visible
           lg:[.sidebar-collapsed_&_.section-toggle]:cursor-default">

    <div class="flex items-center px-3.5 h-[60px] border-b border-gray-100 shrink-0 logo-wrapper">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 overflow-hidden">
            <img src="{{ asset('src/img/logo.webp') }}" alt="Logo IExxass" class="w-7 h-7 object-contain shrink-0"
                loading="lazy">
            <div class="flex flex-col leading-none gap-[2px] sidebar-label">
                <span
                    class="text-[10.5px] text-primary-dark font-bold uppercase whitespace-nowrap tracking-wide leading-tight">
                    IExxass
                </span>
                <span class="text-[7px] text-black font-medium whitespace-nowrap leading-tight">
                    Admin Panel
                </span>
            </div>
        </a>
    </div>

    <nav
        class="flex-1 overflow-y-auto overflow-x-hidden overscroll-contain py-3 px-3 scrollbar-thin hover:scrollbar-thumb-gray-300">

        <div class="sidebar-section mb-3" data-section="main">
            <button type="button"
                class="section-toggle w-full flex items-center justify-between px-2 pb-2 pt-1 text-[11px] font-semibold text-gray-600 uppercase tracking-widest hover:text-gray-800 transition-colors cursor-pointer group">
                <span class="sidebar-label">Main</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-3.5 h-3.5 transform transition-transform duration-200 chevron-icon text-gray-600 group-hover:text-gray-800"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="section-content space-y-0.5 overflow-hidden transition-all duration-300 origin-top">
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-700
                           hover:bg-primary/10 hover:text-primary transition-colors duration-150
                           {{ request()->routeIs('admin.dashboard') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="sidebar-label">Dashboard</span>
                </a>

                @can('manage_about_us')
                    <a href="{{ route('admin.about-us.edit') }}"
                        class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-700
                               hover:bg-primary/10 hover:text-primary transition-colors duration-150
                               {{ request()->routeIs('admin.about-us.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="sidebar-label">About Us</span>
                    </a>
                @endcan

                @can('manage_services')
                    <a href="{{ route('admin.services.header.index') }}"
                        class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-700
                               hover:bg-primary/10 hover:text-primary transition-colors duration-150
                               {{ request()->routeIs('admin.services.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        <span class="sidebar-label">Our Services</span>
                    </a>
                @endcan

                <a href="{{ route('admin.projects.index') }}"
                    class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-700
                           hover:bg-primary/10 hover:text-primary transition-colors duration-150
                           {{ request()->routeIs('admin.projects.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="sidebar-label">Projects</span>
                </a>

                @can('manage_about_us')
                    <a href="{{ route('admin.ebook.index') }}"
                        class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-700
                               hover:bg-primary/10 hover:text-primary transition-colors duration-150
                               {{ request()->routeIs('admin.ebook.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="sidebar-label">E-Book Portofolio</span>
                    </a>
                @endcan
            </div>
        </div>

        @canany(['view_any_user', 'view_any_role', 'view_any_activity', 'manage_system_settings'])
            <div class="sidebar-section" data-section="system">
                <button type="button"
                    class="section-toggle w-full flex items-center justify-between px-2 pb-2 pt-1 text-[11px] font-semibold text-gray-600 uppercase tracking-widest hover:text-gray-800 transition-colors cursor-pointer group">
                    <span class="sidebar-label">System</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3.5 h-3.5 transform transition-transform duration-200 chevron-icon text-gray-500 group-hover:text-gray-700"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="section-content space-y-0.5 overflow-hidden transition-all duration-300 origin-top">
                    @canany(['view_any_user', 'view_any_role'])
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-600
                           hover:bg-primary/10 hover:text-primary transition-colors duration-150
                           {{ request()->routeIs('admin.users.*') || request()->routeIs('admin.roles.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="sidebar-label">Access Management</span>
                        </a>
                    @endcanany

                    @can('view_any_activity')
                        <a href="{{ route('admin.activity-logs.index') }}"
                            class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-600
                           hover:bg-primary/10 hover:text-primary transition-colors duration-150
                           {{ request()->routeIs('admin.activity-logs.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span class="sidebar-label">Activity Logs</span>
                        </a>
                    @endcan

                    @can('manage_system_settings')
                        <a href="{{ route('admin.profile.index') }}"
                            class="nav-item group flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-600
                                   hover:bg-primary/10 hover:text-primary transition-colors duration-150
                                   {{ request()->routeIs('admin.profile.*') ? 'nav-active bg-primary/10 text-primary' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="sidebar-label">Setting</span>
                        </a>
                    @endcan
                </div>
            </div>
        @endcanany

    </nav>

    <div class="border-t border-gray-100 p-3 shrink-0">
        <button type="button"
            class="trigger-logout nav-item w-full flex items-center gap-3 px-3 py-2 rounded-md text-[13px] font-medium text-gray-500
                   hover:bg-red-50 hover:text-red-600 transition-colors duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] shrink-0" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <span class="sidebar-label">Logout</span>
        </button>
    </div>

</aside>
