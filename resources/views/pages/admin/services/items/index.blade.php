@extends('layouts.admin-nav')

@php
    $title = 'Daftar Layanan';
    $pageTitle = 'Daftar Layanan';
    $pageSubtitle = 'Kelola daftar layanan yang ditawarkan (Card & Detail).';
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
                ['label' => 'Daftar Layanan', 'url' => ''],
            ]" />
        </div>
    </div>

    <div class="w-full">
        <x-admin.tables.data-table :create-route="route('admin.services.items.create')" create-label="Tambah Layanan" :paginator="$services" :searchable="false"
            :livewire="false" sortableRoute="{{ route('admin.services.items.reorder') }}">

            <x-slot:bulkActions>
                <form action="{{ route('admin.services.items.bulk-delete') }}" method="POST" id="bulk-delete-form"
                    class="m-0 no-protector">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ids" id="bulk-delete-ids">
                    <button type="submit"
                        class="flex items-center gap-1.5 px-3 py-1.5 text-[12px] font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-md transition-colors border border-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus Terpilih
                    </button>
                </form>
            </x-slot:bulkActions>

            <x-slot:head>
                <th class="px-4 py-3 w-[40px] text-center whitespace-nowrap">
                    <input type="checkbox"
                        class="select-all rounded border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer transition-colors w-4 h-4">
                </th>
                <th class="w-[40px] px-2 py-3"></th>
                <th class="px-4 py-3 whitespace-nowrap pl-4">Layanan</th>
                <th class="px-4 py-3 whitespace-nowrap">Harga</th>
                <th class="px-4 py-3 text-right whitespace-nowrap">Aksi</th>
            </x-slot:head>

            <x-slot:body>
                @forelse($services as $index => $item)
                    <tr class="hover:bg-gray-50/50 transition-colors cursor-pointer group" data-id="{{ $item->id }}"
                        onclick="window.location.href='{{ route('admin.services.items.edit', $item->id) }}'">
                        <td class="px-4 py-3 text-center" onclick="event.stopPropagation()">
                            <input type="checkbox"
                                class="row-checkbox rounded border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 cursor-pointer transition-colors w-4 h-4"
                                value="{{ $item->id }}">
                        </td>
                        <td class="px-2 py-3 cursor-grab drag-handle text-gray-400 hover:text-gray-600"
                            onclick="event.stopPropagation()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                            </svg>
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                @if ($item->icon)
                                    <div class="w-8 h-8 rounded bg-primary flex items-center justify-center shrink-0">
                                        <img src="{{ asset('storage/' . $item->icon) }}" class="w-6 h-6 object-contain"
                                            alt="Icon">
                                    </div>
                                @else
                                    <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <span>{{ $item->title }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-gray-600 whitespace-nowrap">
                            @php
                                $formattedPrice = '-';
                                if (!empty($item->price)) {
                                    $rawPrice = trim(
                                        str_replace(['Start From', 'Start from', 'Rp.', 'Rp'], '', $item->price),
                                    );
                                    $cleanPrice = str_replace('.', '', $rawPrice);
                                    if (is_numeric($cleanPrice) && preg_match('/^[\d.]+$/', $rawPrice)) {
                                        $formattedPrice = 'Rp. ' . number_format((float) $cleanPrice, 0, ',', '.');
                                    } else {
                                        $formattedPrice = $item->price;
                                    }
                                }
                            @endphp
                            {{ $formattedPrice }}
                        </td>
                        <td class="px-4 py-3 flex items-center justify-end gap-2 whitespace-nowrap"
                            onclick="event.stopPropagation()">
                            <a href="{{ route('admin.services.items.edit', $item->id) }}"
                                class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-md transition-colors" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <button type="button" class="p-1.5 text-red-600 hover:bg-red-50 rounded-md transition-colors"
                                title="Hapus"
                                onclick="showDeleteModal('{{ route('admin.services.items.destroy', $item->id) }}', 'Apakah Anda yakin ingin menghapus layanan ini?')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-300 mb-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p>Belum ada data layanan.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </x-slot:body>
        </x-admin.tables.data-table>
    </div>
@endsection
