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

<section id="{{ $id }}">
    <div class="container mx-auto px-[20px] mt-60 md:px-[100px] grid grid-cols-1 xl:grid-cols-2">
        <div class="image {{ $reverse ? 'xl:order-2 order-1' : '' }}">
            <img src="{{ asset($image) }}" class="header blur-[3px] w-full {{ $imageClass }}" alt="{{ $title }}">
        </div>
        <div
            class="{{ $reverse ? 'xl:order-1 order-2' : '' }} text-white mt-10 xl:mt-0 px-[20px] xl:px-[50px] py-[15px] font-AbhayaLibre">
            <h1 class="text-4xl md:text-4xl header">{{ $title }}</h1>
            <p class="text-[15px] md:text-[18px] text-justify header">{{ $description }}</p>
            <h1 class="text-3xl py-5 md:py-5 header">{{ __('message.service.why') }}</h1>
            <ol class="list-decimal list-outside flex flex-col gap-y-2.5 text-[15px] md:text-[18px] px-[15px]">
                @foreach ($features as $feature)
                    <li class="header">{{ $feature }}</li>
                @endforeach
            </ol>
            <div class="mt-10 {{ $slot->isEmpty() ? '' : '' }}">
                @if ($price)
                    <h1 class="text-3xl md:text-3xl py-10 header">{{ $price }}</h1>
                @endif
                <x-cta-whatsapp text="Let's Connect Me"
                    class="header border border-BG-White text-BG-White hover:bg-white hover:text-BG-IExxass px-10 py-3" />
            </div>
        </div>
    </div>
</section>
