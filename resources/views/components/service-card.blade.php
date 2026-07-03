@props(['icon', 'title', 'description', 'target', 'extraClass' => ''])

<div class="card header flex flex-col {{ $extraClass }} px-[30px] md:px-[10px]">
    <img src="{{ asset($icon) }}" alt="{{ $title }}" class="w-20 h-20">
    <div class="flex flex-col py-4 text-white text-left">
        <h1 class="text-3xl xl:text-4xl">{{ $title }}</h1>
        <p class="text-[20px]">{{ Str::limit($description, 150) }}</p>
        <div class="mt-5 text-[20px]">
            <a href="javascript:void(0)" data-target="{{ $target }}" class="menu-link underline">Read More</a>
        </div>
    </div>
</div>
