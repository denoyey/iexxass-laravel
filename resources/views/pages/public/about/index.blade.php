<div class="relative w-full py-28 md:py-40 bg-center bg-cover bg-no-repeat bg-fixed font-AbhayaLibre flex items-center justify-center"
    style="background-image: url('{{ $aboutUs && $aboutUs->background_image ? asset('storage/' . $aboutUs->background_image) : '' }}')">

    <!-- Rich Dark Overlays for Elegance and Readability -->
    <div class="absolute inset-0 bg-[#050B65]/10 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-linear-to-b from-[#050B65]/70 via-[#050B65]/35 to-[#050B65]/90"></div>

    <!-- Unified Content Container -->
    <div class="relative z-10 container mx-auto px-6 md:px-12">
        <div class="section-header max-w-5xl mx-auto flex flex-col items-center text-center">

            <!-- Elegant Subtitle -->
            @if ($aboutUs && $aboutUs->subtitle)
                <span
                    class="text-blue-300 font-semibold tracking-[4px] uppercase text-sm md:text-base mb-4 block opacity-90">{{ $aboutUs->subtitle }}</span>
            @endif

            <!-- Heading -->
            <h1 class="header text-white text-[36px] md:text-[50px] lg:text-[60px] font-bold tracking-wide mb-6">
                {{ $aboutUs->title ?? '' }}
            </h1>

            <!-- Gradient Separator -->
            <div
                class="w-32 h-1 bg-linear-to-r from-transparent via-blue-400 to-transparent mx-auto mb-10 rounded-full opacity-80">
            </div>

            <!-- Description -->
            <div class="text-gray-100">
                <p
                    class="header text-[15px] md:text-[18px] lg:text-[20px] leading-[1.8] md:leading-[2.2] tracking-wide font-light">
                    {!! $aboutUs ? nl2br(e($aboutUs->content)) : '' !!}
                </p>
            </div>

        </div>
    </div>
</div>
