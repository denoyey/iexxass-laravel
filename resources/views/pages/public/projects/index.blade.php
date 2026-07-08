<div class="w-full h-full py-16 md:py-24 relative z-20 bg-BG-IExxass -mt-px -mb-px">
    <div class="container mx-auto px-6 md:px-10 xl:px-20 relative z-10">
        <div class="text-center mb-14 xl:mb-20 section-header">
            <span
                class="text-blue-300 font-semibold tracking-[4px] uppercase text-sm md:text-base mb-4 block opacity-80">
                {{ __('Proof of Excellence') }}
            </span>
            <h2 class="text-[36px] md:text-[45px] lg:text-[55px] text-white font-bold font-AbhayaLibre leading-tight">
                {{ __('Our Projects') }}
            </h2>
            <div
                class="w-24 h-1 bg-linear-to-r from-transparent via-blue-400 to-transparent mx-auto mt-8 rounded-full opacity-70">
            </div>
        </div>

        <div class="relative w-full group">
            <div id="projectsSlider"
                class="flex overflow-x-auto snap-x snap-mandatory gap-4 md:gap-5 scroll-smooth [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] scrollbar-none"
                style="justify-content: safe center;">
                @forelse ($projects as $project)
                    <div class="portfolio-card shrink-0 snap-start w-full sm:w-[calc(50%-0.5rem)] lg:w-[calc(25%-0.9375rem)] group/card relative rounded-md overflow-hidden cursor-pointer h-[320px] md:h-[400px] bg-gray-900 shadow-sm hover:shadow-md transition-shadow duration-300"
                        data-project="{{ json_encode([
                            'title' => $project->title,
                            'category' => $project->category ?? __('Portfolio'),
                            'description' => $project->description ?? '',
                            'thumbnail' => Storage::url($project->thumbnail),
                            'images' =>
                                $project->images->count() > 0
                                    ? $project->images->map(fn($img) => Storage::url($img->image_path))->toArray()
                                    : [Storage::url($project->thumbnail)],
                        ]) }}"
                        onclick="openPortfolioModal(JSON.parse(this.dataset.project))">

                        <!-- Background Image (Lazy Loaded) -->
                        <img src="{{ Storage::url($project->thumbnail) }}" alt="{{ $project->title }}" loading="lazy"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover/card:scale-105">

                        <!-- Simple Bottom Gradient -->
                        <div
                            class="absolute inset-x-0 bottom-0 h-1/2 bg-linear-to-t from-black/90 via-black/20 to-transparent pointer-events-none">
                        </div>

                        <!-- Minimalist Title -->
                        <div class="absolute bottom-0 left-0 w-full p-5 z-10 pointer-events-none">
                            <h3
                                class="text-white font-bold text-base md:text-lg leading-tight drop-shadow-md line-clamp-2 uppercase">
                                {{ $project->title }}
                            </h3>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-xs text-center text-gray-400 py-10">
                        {{ __('No projects available yet.') }}
                    </div>
                @endforelse
            </div>

            <!-- Left Overlay (Full Height Faded Blue) -->
            <div id="projectsLeftOverlay"
                class="absolute left-0 inset-y-0 w-10 md:w-20 bg-linear-to-r from-BG-IExxass to-transparent z-10 opacity-0 pointer-events-none transition-opacity duration-300">
            </div>

            <!-- Right Overlay (Full Height Faded Blue) -->
            <div id="projectsRightOverlay"
                class="absolute right-0 inset-y-0 w-10 md:w-20 bg-linear-to-l from-BG-IExxass to-transparent z-10 opacity-0 pointer-events-none transition-opacity duration-300">
            </div>

            <!-- Pagination Controls (Integrated with Card Grid) -->
            <!-- Left Button -->
            <button id="projectsPrevBtn" onclick="slideProjects('left')"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-8 h-8 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center shadow-lg hover:bg-gray-100 transition-all duration-300 text-BG-IExxass cursor-pointer z-20 opacity-0 pointer-events-none">
                <svg class="w-4 h-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Right Button -->
            <button id="projectsNextBtn" onclick="slideProjects('right')"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-8 h-8 md:w-10 md:h-10 rounded-full bg-white flex items-center justify-center shadow-lg hover:bg-gray-100 transition-all duration-300 text-BG-IExxass cursor-pointer z-20 opacity-0 pointer-events-none">
                <svg class="w-4 h-4 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- GSAP Modal Lightbox -->
<div id="portfolioModalOverlay" class="fixed inset-0 z-100 flex items-center justify-center p-0 md:p-6 opacity-0"
    style="display: none;">
    <!-- Backdrop -->
    <div id="portfolioModalBackdrop" class="absolute inset-0 bg-black/70 opacity-0" onclick="closePortfolioModal()"
        onwheel="event.preventDefault()" ontouchmove="event.preventDefault()">
    </div>

    <!-- Modal Content -->
    <div id="portfolioModalContent"
        class="relative w-full h-full md:h-auto max-h-screen md:max-h-[90vh] max-w-6xl bg-white md:rounded-md shadow-2xl overflow-hidden flex flex-col md:flex-row transform scale-95 opacity-0">

        <!-- Close Button -->
        <button onclick="closePortfolioModal()"
            class="absolute top-4 right-4 z-20 w-10 h-10 flex items-center justify-center bg-black/20 hover:bg-black/40 md:bg-gray-100 md:hover:bg-gray-200 rounded-full text-white md:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Left: Image Slider -->
        <div
            class="w-full md:w-3/5 h-[40vh] md:h-[600px] relative bg-gray-900 flex items-center justify-center overflow-hidden group">
            <img id="portfolioModalImage" src="" alt="Project Image"
                class="w-full h-full object-cover md:object-contain bg-black">

            <!-- Slider Controls -->
            <div id="portfolioModalControls" class="hidden">
                <button onclick="portfolioPrevImage()"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-black/40 hover:bg-black/70 text-white rounded-full backdrop-blur-sm transition-all md:opacity-0 md:group-hover:opacity-100 z-10">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button onclick="portfolioNextImage()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center bg-black/40 hover:bg-black/70 text-white rounded-full backdrop-blur-sm transition-all md:opacity-0 md:group-hover:opacity-100 z-10">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Indicators -->
                <div id="portfolioModalIndicators"
                    class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 bg-black/20 px-3 py-1.5 rounded-full backdrop-blur-sm z-10">
                    <!-- Dots will be generated via JS -->
                </div>
            </div>
        </div>

        <!-- Right: Description -->
        <div class="w-full md:w-2/5 p-6 md:p-10 flex flex-col justify-center bg-white overflow-y-auto">
            <div>
                <span id="portfolioModalCategory"
                    class="block text-blue-600 text-xs font-semibold uppercase tracking-wider mb-2"></span>
                <h3 id="portfolioModalTitle"
                    class="text-xl md:text-2xl font-bold text-gray-900 mb-4 leading-snug uppercase"></h3>
                <p id="portfolioModalDesc" class="text-gray-600 text-sm leading-relaxed"></p>
            </div>
        </div>
    </div>
</div>
