@extends('layouts.admin')

@php
    $title = 'Tambah Project Baru';
    $pageTitle = 'Tambah Project';
    $pageSubtitle = 'Buat data portofolio project baru yang akan ditampilkan di halaman utama.';
@endphp

@section('title', $title)
@section('page-title', $pageTitle)
@section('page-subtitle', $pageSubtitle)

@section('content')
    <div class="mb-6">
        <div class="space-y-3">
            <x-admin.ui.breadcrumb :items="[
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Projects', 'url' => route('admin.projects.index')],
                ['label' => 'Tambah Baru', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Thumbnail Upload -->
                        <div class="md:col-span-1">
                            <x-admin.forms.image-upload id="thumbnail" name="thumbnail" label="Gambar Utama (Thumbnail)"
                                :required="true"
                                helpText="Gambar ini akan tampil pertama di card slider. Format: JPG, PNG, WEBP. Maks 2MB." />
                        </div>

                        <!-- Gallery Multi Upload -->
                        <div class="md:col-span-1">
                            <x-admin.forms.multi-image-upload id="gallery" name="images[]"
                                label="Gambar Galeri (Opsional)" :required="false" :hideCover="true" />
                        </div>

                        <!-- Text Inputs -->
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="title" label="Judul Project" :required="true"
                                :value="old('title')" placeholder="Contoh: Pemasangan CCTV Kantor" />
                        </div>

                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="category" label="Kategori (Opsional)" :required="false"
                                :value="old('category')" placeholder="Contoh: Instalasi Jaringan" />
                        </div>

                        <div class="md:col-span-2">
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-[12px] sm:text-[13px] font-medium text-gray-700 mb-1">
                                    Deskripsi (Opsional)
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="w-full text-[12px] sm:text-[13px] border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary p-2"
                                    placeholder="Deskripsi singkat mengenai proyek ini...">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <div class="flex items-center mb-3">
                                <input type="checkbox" id="toggle_url"
                                    onchange="document.getElementById('url_container').style.display = this.checked ? 'block' : 'none'"
                                    {{ old('project_url') ? 'checked' : '' }}
                                    class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded-sm focus:ring-primary focus:ring-2 cursor-pointer">
                                <label for="toggle_url"
                                    class="ml-2 text-[12px] sm:text-[13px] font-medium text-gray-700 cursor-pointer">
                                    Tambahkan Tombol "Kunjungi Website"
                                </label>
                            </div>

                            <div id="url_container" style="display: {{ old('project_url') ? 'block' : 'none' }};">
                                <x-admin.forms.form-input name="project_url" label="Link / URL Website Tujuan"
                                    :required="false" :value="old('project_url')" placeholder="Contoh: https://example.com" />
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-end gap-2 sm:gap-3 pt-5 sm:pt-6 mt-5 sm:mt-6 border-t border-gray-100">
                        <a href="{{ route('admin.projects.index') }}"
                            class="px-3 py-1.5 sm:px-4 sm:py-2 text-[11px] sm:text-[12px] font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none transition-colors">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-3 py-1.5 sm:px-4 sm:py-2 text-[11px] sm:text-[12px] font-medium text-white bg-primary border border-transparent rounded-md shadow-sm hover:bg-primary-dark focus:outline-none transition-colors">
                            Simpan Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
