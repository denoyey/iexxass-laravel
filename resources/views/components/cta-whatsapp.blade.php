@props(['text' => null, 'class' => '', 'target' => '_blank'])

<a href="https://wa.me/{{ config('app.contact_phone') }}?text={{ urlencode('Halo I\'Exxass, saya tertarik dengan produk dan layanan Anda. Bolehkah saya mendapatkan informasi lebih lanjut?') }}"
    class="{{ $class }}" target="{{ $target }}">
    @if ($slot->isNotEmpty())
        {!! $slot !!}@else{{ $text ?? "Let's Connect" }}
    @endif
</a>
