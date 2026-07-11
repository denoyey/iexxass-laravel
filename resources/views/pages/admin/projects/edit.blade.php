@extends('layouts.admin')

@php
    $title = 'Edit Project';
    $pageTitle = 'Edit Project';
    $pageSubtitle = 'Ubah data portofolio project.';
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
                ['label' => 'Edit Project', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Thumbnail Upload -->
                        <div class="md:col-span-1">
                            <x-admin.forms.image-upload id="thumbnail" name="thumbnail" label="Gambar Utama (Thumbnail)"
                                :required="false"
                                helpText="Gambar ini akan tampil pertama di card slider. Format: JPG, PNG, WEBP. Maks 2MB."
                                :value="$project->thumbnail" />
                        </div>

                        <!-- Gallery Multi Upload -->
                        <div class="md:col-span-1">
                            <x-admin.forms.multi-image-upload id="gallery" name="images[]"
                                label="Tambah Gambar Galeri (Opsional)" :required="false" :hideCover="true" />
                                
                            @if ($project->images->count() > 0)
                                <div class="mt-4 border-t border-gray-100 pt-4">
                                    <h4 class="text-[12px] sm:text-[13px] font-medium text-gray-700 mb-1">Manajemen Galeri Proyek</h4>
                                    <p class="text-[11px] text-gray-500 mb-3">Hapus atau ubah gambar galeri yang tersimpan di bawah ini.</p>
                                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                                        @foreach ($project->images as $image)
                                            <div class="image-preview-wrapper" data-target="preview-{{ $image->id }}">
                                                <div id="preview-{{ $image->id }}"
                                                    class="relative group rounded-md overflow-hidden border border-gray-200 aspect-square bg-gray-100 shadow-sm">
                                                    <img src="{{ Storage::url($image->image_path) }}"
                                                        class="preview-img w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                                        alt="Gallery image">

                                                    <!-- Edit Button (Cropper) -->
                                                    <button type="button"
                                                        class="btn-crop-image absolute top-1 right-1 bg-white/90 hover:bg-white text-gray-700 p-1 rounded-full shadow-md transition-all duration-200 opacity-0 group-hover:opacity-100"
                                                        title="Edit & Crop Gambar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                        </svg>
                                                    </button>

                                                    <!-- Delete Button -->
                                                    <button type="button" onclick="confirmDeleteImage({{ $image->id }})"
                                                        class="absolute top-1 left-1 bg-red-500/90 hover:bg-red-600 text-white p-1 rounded-full shadow-md transition-all duration-200 opacity-0 group-hover:opacity-100"
                                                        title="Hapus Gambar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Text Inputs -->
                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="title" label="Judul Project" :required="true"
                                :value="old('title', $project->title)" placeholder="Contoh: Pemasangan CCTV Kantor" />
                        </div>

                        <div class="md:col-span-1">
                            <x-admin.forms.form-input name="category" label="Kategori (Opsional)" :required="false"
                                :value="old('category', $project->category)" placeholder="Contoh: Instalasi Jaringan" />
                        </div>

                        <div class="md:col-span-2">
                            <div class="mb-4">
                                <label for="description"
                                    class="block text-[12px] sm:text-[13px] font-medium text-gray-700 mb-1">
                                    Deskripsi (Opsional)
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="w-full text-[12px] sm:text-[13px] border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary p-2"
                                    placeholder="Deskripsi singkat mengenai proyek ini...">{{ old('description', $project->description) }}</textarea>
                            </div>
                        </div>

                        <div class="md:col-span-2">
                            <div class="flex items-center mb-3">
                                <input type="checkbox" id="toggle_url"
                                    onchange="document.getElementById('url_container').style.display = this.checked ? 'block' : 'none'"
                                    {{ old('project_url', $project->project_url ?? '') ? 'checked' : '' }}
                                    class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded-sm focus:ring-primary focus:ring-2 cursor-pointer">
                                <label for="toggle_url"
                                    class="ml-2 text-[12px] sm:text-[13px] font-medium text-gray-700 cursor-pointer">
                                    Tambahkan Tombol "Kunjungi Website"
                                </label>
                            </div>

                            <div id="url_container"
                                style="display: {{ old('project_url', $project->project_url ?? '') ? 'block' : 'none' }};">
                                <x-admin.forms.form-input name="project_url" label="Link / URL Website Tujuan"
                                    :required="false" :value="old('project_url', $project->project_url ?? '')" placeholder="Contoh: https://example.com" />
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
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @if ($project->images->count() > 0)
            <!-- Hidden Forms for Updating/Deleting Gallery Images -->
            <div class="hidden">
                @foreach ($project->images as $image)
                    <!-- Hidden Form for Updating Individual Image -->
                    <form id="update-image-form-{{ $image->id }}"
                        action="{{ route('admin.projects.updateImage', $image->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image"
                            accept="image/jpeg,image/png,image/webp,image/jpg"
                            onchange="document.getElementById('update-image-form-{{ $image->id }}').submit()">
                    </form>

                    <!-- Hidden Form for Deleting Individual Image -->
                    <form id="delete-image-form-{{ $image->id }}"
                        action="{{ route('admin.projects.destroyImage', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            </div>
        @endif
    </div>
@endsection
