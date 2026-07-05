@extends('layouts.admin-nav')

@php
    $title = 'Edit Layanan';
    $pageTitle = 'Edit Layanan';
    $pageSubtitle = 'Ubah data layanan yang ditawarkan.';
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
                ['label' => 'Daftar Layanan', 'url' => route('admin.services.items.index')],
                ['label' => 'Edit', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.services.items.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Icon Upload (for Card) -->
                        <div class="md:col-span-1">
                            @if ($item->icon)
                                <div class="mb-3">
                                    <p class="text-[12px] text-gray-500 mb-1">Icon Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $item->icon) }}"
                                        class="h-16 object-contain border border-gray-200 rounded p-1" alt="Current Icon">
                                </div>
                            @endif
                            <x-admin.forms.image-upload id="icon" name="icon" label="Ubah Icon Layanan (Untuk Card)"
                                :required="false"
                                helpText="Biarkan kosong jika tidak ingin mengubah icon. Format: JPG, PNG, WEBP, SVG." />
                        </div>

                        <!-- Detail Image Upload -->
                        <div class="md:col-span-1">
                            @if ($item->detail_image)
                                <div class="mb-3">
                                    <p class="text-[12px] text-gray-500 mb-1">Gambar Detail Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $item->detail_image) }}"
                                        class="h-16 object-contain border border-gray-200 rounded p-1"
                                        alt="Current Detail Image">
                                </div>
                            @endif
                            <x-admin.forms.image-upload id="detail_image" name="detail_image" label="Ubah Gambar Detail"
                                :required="false"
                                helpText="Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, WEBP." />
                        </div>

                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="title[id]" label="Nama Layanan (ID)" :required="true"
                                :value="old('title.id', $item->getTranslation('title', 'id', false))" placeholder="Contoh: Web Developer" />
                        </div>
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="title[en]" label="Nama Layanan (EN)" :required="false"
                                :value="old('title.en', $item->getTranslation('title', 'en', false))" placeholder="Contoh: Web Developer" />
                        </div>

                        <div class="md:col-span-2">
                            <x-admin.forms.form-input name="price" label="Harga (Opsional)" :required="false"
                                :value="old('price', $item->price)" placeholder="Contoh: Start From Rp. 3.500.000 / $225" />
                        </div>

                        <div class="md:col-span-1">
                            <div class="mb-4">
                                <label for="description_id"
                                    class="block text-[12px] sm:text-[13px] font-medium text-gray-700 mb-1">
                                    Deskripsi Layanan (ID) <span class="text-red-500">*</span>
                                </label>
                                <textarea id="description_id" name="description[id]" rows="4" required
                                    class="w-full text-[12px] sm:text-[13px] border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary p-2"
                                    placeholder="Deskripsi singkat layanan...">{{ old('description.id', $item->getTranslation('description', 'id', false)) }}</textarea>
                            </div>
                        </div>
                        <div class="md:col-span-1">
                            <div class="mb-4">
                                <label for="description_en"
                                    class="block text-[12px] sm:text-[13px] font-medium text-gray-700 mb-1">
                                    Deskripsi Layanan (EN)
                                </label>
                                <textarea id="description_en" name="description[en]" rows="4"
                                    class="w-full text-[12px] sm:text-[13px] border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary p-2"
                                    placeholder="Brief service description...">{{ old('description.en', $item->getTranslation('description', 'en', false)) }}</textarea>
                            </div>
                        </div>

                        <!-- Dynamic Features Input -->
                        <div class="md:col-span-2">
                            <label class="block text-[12px] sm:text-[13px] font-medium text-gray-700 mb-2">
                                Fitur / Poin Keunggulan
                            </label>
                            <div id="features-container" class="space-y-3">
                                @php
                                    $featuresId = $item->getTranslation('features', 'id', false) ?: [];
                                    $featuresEn = $item->getTranslation('features', 'en', false) ?: [];
                                    $maxCount = max(count($featuresId), count($featuresEn), 1);
                                @endphp

                                @for ($i = 0; $i < $maxCount; $i++)
                                    <div class="flex items-center gap-2 feature-row bg-white rounded-md">
                                        <div
                                            class="drag-handle-feature cursor-move text-gray-400 hover:text-gray-600 px-2 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                            </svg>
                                        </div>
                                        <div class="flex-1 flex flex-col md:flex-row gap-2">
                                            <input type="text" name="features[id][]" value="{{ $featuresId[$i] ?? '' }}"
                                                class="flex-1 text-[12px] sm:text-[13px] border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary p-2"
                                                placeholder="Fitur (ID)">
                                            <input type="text" name="features[en][]" value="{{ $featuresEn[$i] ?? '' }}"
                                                class="flex-1 text-[12px] sm:text-[13px] border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary p-2"
                                                placeholder="Fitur (EN)">
                                        </div>
                                        <button type="button"
                                            class="btn-remove-feature px-3 py-2 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition-colors {{ $maxCount == 1 ? 'hidden' : '' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                @endfor
                            </div>
                            <button type="button" id="btn-add-feature"
                                class="mt-3 inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-700 text-[11px] font-medium rounded hover:bg-gray-200 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Poin Fitur
                            </button>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-end gap-2 sm:gap-3 pt-5 sm:pt-6 mt-5 sm:mt-6 border-t border-gray-100">
                        <a href="{{ route('admin.services.items.index') }}"
                            class="px-3 py-1.5 sm:px-4 sm:py-2 text-[11px] sm:text-[12px] font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-3 py-1.5 sm:px-4 sm:py-2 text-[11px] sm:text-[12px] font-medium text-white bg-primary border border-transparent rounded-md shadow-sm hover:bg-primary-dark focus:outline-none transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
