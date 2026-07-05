@extends('layouts.admin-nav')

@php
    $title = 'Quote Section';
    $pageTitle = 'Quote Section';
    $pageSubtitle = 'Kelola teks kutipan di tengah halaman Our Services.';
@endphp

@section('title', $title)
@section('page-title', $pageTitle)
@section('page-subtitle', $pageSubtitle)

@section('nav-menu')
    @include('pages.admin.services.partials.nav')
@endsection

@section('main-content')
    <div class="mb-6">
        <div class="space-y-3">
            <x-admin.ui.breadcrumb :items="[
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Our Services', 'url' => ''],
                ['label' => 'Quote Section', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <x-admin.ui.card>
            <div class="p-6">
                <form action="{{ route('admin.services.quote.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        <x-admin.forms.form-input name="quote_title[id]" label="Quote Utama (ID)" :required="false"
                            :value="old('quote_title.id', $setting->getTranslation('quote_title', 'id', false))" placeholder="Contoh: Solusi IT Terbaik..." />

                        <x-admin.forms.form-input name="quote_title[en]" label="Quote Utama (EN)" :required="false"
                            :value="old('quote_title.en', $setting->getTranslation('quote_title', 'en', false))" placeholder="Contoh: IT Solution is The Best..." />

                        <x-admin.forms.form-input name="quote_subtitle[id]" label="Sub Quote (ID)" :required="false"
                            :value="old(
                                'quote_subtitle.id',
                                $setting->getTranslation('quote_subtitle', 'id', false),
                            )" placeholder="Contoh: Mengubah Masa Depan Konektivitas" />

                        <x-admin.forms.form-input name="quote_subtitle[en]" label="Sub Quote (EN)" :required="false"
                            :value="old(
                                'quote_subtitle.en',
                                $setting->getTranslation('quote_subtitle', 'en', false),
                            )" placeholder="Contoh: Transforming The Future of Connectivity" />
                    </div>

                    <x-admin.ui.form-footer submitText="Simpan Perubahan" class="mt-5 sm:mt-6" />
                </form>
            </div>
        </x-admin.ui.card>
    </div>
@endsection
