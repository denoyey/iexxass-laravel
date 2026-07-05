@extends('layouts.admin-nav')

@php
    $title = 'Edit Header Section';
    $pageTitle = 'Edit Header Section';
    $pageSubtitle = 'Ubah teks judul utama pada halaman Our Services.';
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
                ['label' => 'Header Section', 'url' => route('admin.services.header.index')],
                ['label' => 'Edit', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.services.header.update', 1) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        <x-admin.forms.form-input name="subtitle[id]" label="Subtitle (ID)" :required="false"
                            :value="old('subtitle.id', $setting->getTranslation('subtitle', 'id', false))" placeholder="Contoh: APA YANG KAMI TAWARKAN" />

                        <x-admin.forms.form-input name="subtitle[en]" label="Subtitle (EN)" :required="false"
                            :value="old('subtitle.en', $setting->getTranslation('subtitle', 'en', false))" placeholder="Contoh: WHAT WE OFFER" />

                        <x-admin.forms.form-input name="title[id]" label="Judul Utama (ID)" :required="false"
                            :value="old('title.id', $setting->getTranslation('title', 'id', false))" placeholder="Contoh: Layanan Kami" />

                        <x-admin.forms.form-input name="title[en]" label="Judul Utama (EN)" :required="false"
                            :value="old('title.en', $setting->getTranslation('title', 'en', false))" placeholder="Contoh: Our Services" />
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-6 mt-6 border-t border-gray-100">
                        <a href="{{ route('admin.services.header.index') }}"
                            class="px-4 py-2 text-[12px] font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-[12px] font-medium text-white bg-primary border border-transparent rounded-md shadow-sm hover:bg-primary-dark focus:outline-none transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
