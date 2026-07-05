@extends('layouts.admin')

@php
    $title = 'E-Book Portofolio';
    $pageTitle = 'E-Book Portofolio';
    $pageSubtitle = 'Kelola file e-book portofolio perusahaan yang dapat diunduh oleh pengunjung.';
@endphp

@section('title', $title)
@section('page-title', $pageTitle)
@section('page-subtitle', $pageSubtitle)

@section('content')
    <div class="mb-6">
        <div class="space-y-3">
            <x-admin.ui.breadcrumb :items="[
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'E-Book Portofolio', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <x-admin.ui.card>
            <div class="p-6">
                <form action="{{ route('admin.ebook.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-8">
                        <div class="flex flex-col sm:flex-row gap-6">
                            <!-- Status File -->
                            <div class="w-full sm:w-1/3 bg-gray-50 border border-gray-100 rounded-lg p-5">
                                <h3 class="text-[13px] font-semibold text-gray-800 mb-4">Status File Saat Ini</h3>

                                @if ($fileExists)
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-10 h-10 rounded bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[12.5px] font-medium text-gray-800">portofolio.pdf</p>
                                            <p class="text-[11.5px] text-gray-500 mt-1">Ukuran:
                                                {{ number_format($fileSize / 1024 / 1024, 2) }} MB</p>
                                            <p class="text-[11px] text-gray-400 mt-1">Diperbarui:
                                                {{ date('d M Y H:i', $lastModified) }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-4 border-t border-gray-200">
                                        <a href="{{ asset('uploads/pdf/portofolio.pdf') }}" target="_blank"
                                            class="text-[12px] text-primary hover:text-primary-dark font-medium flex items-center gap-1.5">
                                            Lihat File
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </a>
                                    </div>
                                @else
                                    <div class="flex items-center gap-2 text-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        <p class="text-[12.5px] font-medium">File belum tersedia</p>
                                    </div>
                                    <p class="text-[11.5px] text-gray-500 mt-2">Silakan unggah file PDF e-book Anda untuk
                                        pertama kalinya.</p>
                                @endif
                            </div>

                            <!-- Upload Form -->
                            <div class="w-full sm:w-2/3">
                                <label for="ebook_file" class="block text-[12.5px] font-medium text-gray-700 mb-2">
                                    Unggah File Baru <span class="text-red-500">*</span>
                                </label>

                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-primary transition-colors cursor-pointer"
                                    onclick="document.getElementById('ebook_file').click()">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48" aria-hidden="true">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="ebook_file"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary-dark focus-within:outline-none">
                                                <span>Pilih File PDF</span>
                                                <input id="ebook_file" name="ebook_file" type="file"
                                                    class="sr-only file-name-updater" accept=".pdf" required>
                                            </label>
                                            <p class="pl-1">atau seret ke sini</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PDF hingga 2MB</p>
                                        <p id="file-name-display" class="text-[12px] font-medium text-primary mt-2 hidden">
                                        </p>
                                    </div>
                                </div>
                                @error('ebook_file')
                                    <p class="mt-1.5 text-[11.5px] text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <x-admin.ui.form-footer submitText="Unggah & Simpan" />
                </form>
            </div>
        </x-admin.ui.card>
    </div>

@endsection
