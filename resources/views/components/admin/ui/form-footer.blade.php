@props(['submitText' => 'Simpan'])

<div {{ $attributes->merge(['class' => 'flex items-center justify-end pt-5 sm:pt-6 border-t border-gray-100']) }}>
    <button type="submit"
        class="px-3 py-1.5 sm:px-5 sm:py-2 text-[11px] sm:text-[12px] font-semibold text-white bg-primary hover:bg-primary-dark rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 transition-all">
        {{ $submitText }}
    </button>
</div>
