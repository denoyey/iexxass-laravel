@extends('layouts.admin-nav')

@php
    $title = 'Header Section';
    $pageTitle = 'Header Section';
    $pageSubtitle = 'Kelola teks judul utama pada halaman Our Services.';
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
                ['label' => 'Header Section', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <x-admin.tables.data-table :paginator="null" :searchable="false" :livewire="false">

            <x-slot:head>
                <th class="px-4 py-3 w-16 text-center whitespace-nowrap">ID</th>
                <th class="px-4 py-3 whitespace-nowrap">Subtitle</th>
                <th class="px-4 py-3 whitespace-nowrap">Title</th>
                <th class="px-4 py-3 text-right whitespace-nowrap">Aksi</th>
            </x-slot:head>

            <x-slot:body>
                <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer group"
                    onclick="window.location.href='{{ route('admin.services.header.edit', 1) }}'">
                    <td class="px-4 py-3 text-center" onclick="event.stopPropagation()">1</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $setting->subtitle ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-600 whitespace-nowrap">{{ $setting->title ?? '-' }}</td>
                    <td class="px-4 py-3 flex items-center justify-end gap-2 whitespace-nowrap"
                        onclick="event.stopPropagation()">
                        <a href="{{ route('admin.services.header.edit', 1) }}"
                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-md transition-colors" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </x-slot:body>
        </x-admin.tables.data-table>
        <div class="px-4 py-3 mt-2 border border-gray-100 bg-gray-50/30 rounded-md">
            <p class="text-[11px] text-gray-500 text-center">Tabel ini dibatasi hanya 1 baris untuk mencegah duplikasi data
                Header.</p>
        </div>
    </div>
@endsection
