@extends('layouts.admin')

@php
    $title = 'About Us';
    $pageTitle = 'About Us';
    $pageSubtitle = 'Kelola informasi profil perusahaan.';
@endphp

@section('title', $title)
@section('page-title', $pageTitle)
@section('page-subtitle', $pageSubtitle)

@section('content')
    <div class="mb-6">
        <div class="space-y-3">
            <x-admin.ui.breadcrumb :items="[
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'About Us', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <x-admin.ui.card>
            <div class="p-6">
                <form action="{{ route('admin.about-us.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                        <!-- Subtitle -->
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="subtitle[id]" label="Subtitle (ID)" :required="false"
                                :value="old('subtitle.id', $aboutUs->getTranslation('subtitle', 'id', false))" placeholder="Contoh: TENTANG KAMI" />
                        </div>
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="subtitle[en]" label="Subtitle (EN)" :required="false"
                                :value="old('subtitle.en', $aboutUs->getTranslation('subtitle', 'en', false))" placeholder="Contoh: WHO WE ARE" />
                        </div>

                        <!-- Title -->
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="title[id]" label="Judul Utama (ID)" :required="true"
                                :value="old('title.id', $aboutUs->getTranslation('title', 'id', false))" placeholder="Contoh: Tentang Kami" />
                        </div>
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="title[en]" label="Judul Utama (EN)" :required="false"
                                :value="old('title.en', $aboutUs->getTranslation('title', 'en', false))" placeholder="Contoh: About Us" />
                        </div>

                        <!-- Content -->
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="content[id]" label="Deskripsi / Konten (ID)" type="textarea"
                                :rows="6" :required="true" :value="old('content.id', $aboutUs->getTranslation('content', 'id', false))" />
                        </div>
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="content[en]" label="Deskripsi / Konten (EN)" type="textarea"
                                :rows="6" :required="false" :value="old('content.en', $aboutUs->getTranslation('content', 'en', false))" />
                        </div>
                    </div>

                    <hr class="border-gray-100 my-6">

                    <!-- Background Image Upload -->
                    <div class="mb-8">
                        <x-admin.forms.image-upload id="background_image" name="background_image" label="Background Image"
                            :required="false"
                            helpText="Unggah gambar untuk latar belakang seksi About Us. Format: JPG, PNG, WEBP. Maks 2MB."
                            :value="$aboutUs->background_image" />
                    </div>

                    <x-admin.ui.form-footer submitText="Simpan Perubahan" />
                </form>
            </div>
        </x-admin.ui.card>
    </div>
@endsection
