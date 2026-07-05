<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\Services\ImageUploadService;
use App\Traits\SortableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceItemController extends Controller
{
    use SortableController;

    protected $sortableModel = Service::class;

    public function index()
    {
        $services = Service::orderBy('order_column')->paginate(50);

        return view('pages.admin.services.items.index', compact('services'));
    }

    public function create()
    {
        return view('pages.admin.services.items.create');
    }

    public function store(ServiceRequest $request, ImageUploadService $imageUploadService)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $data['icon'] = $imageUploadService->uploadAndConvertToWebp($request->file('icon'), 'content/services');
        }

        if ($request->hasFile('detail_image')) {
            $data['detail_image'] = $imageUploadService->uploadAndConvertToWebp($request->file('detail_image'), 'content/services');
        }

        if (isset($data['features']) && is_array($data['features'])) {
            $data['features'] = [
                'id' => isset($data['features']['id']) ? array_values(array_filter($data['features']['id'])) : [],
                'en' => isset($data['features']['en']) ? array_values(array_filter($data['features']['en'])) : [],
            ];
        } else {
            $data['features'] = ['id' => [], 'en' => []];
        }

        Service::create($data);

        return redirect()->route('admin.services.items.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $item)
    {
        return view('pages.admin.services.items.edit', compact('item'));
    }

    public function update(ServiceRequest $request, Service $item, ImageUploadService $imageUploadService)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            if ($item->icon && Storage::disk('public')->exists($item->icon)) {
                Storage::disk('public')->delete($item->icon);
            }
            $data['icon'] = $imageUploadService->uploadAndConvertToWebp($request->file('icon'), 'content/services');
        }

        if ($request->hasFile('detail_image')) {
            if ($item->detail_image && Storage::disk('public')->exists($item->detail_image)) {
                Storage::disk('public')->delete($item->detail_image);
            }
            $data['detail_image'] = $imageUploadService->uploadAndConvertToWebp($request->file('detail_image'), 'content/services');
        }

        // Remove nulls from features array while keeping id/en keys
        if (isset($data['features']) && is_array($data['features'])) {
            $data['features'] = [
                'id' => isset($data['features']['id']) ? array_values(array_filter($data['features']['id'])) : [],
                'en' => isset($data['features']['en']) ? array_values(array_filter($data['features']['en'])) : [],
            ];
        } else {
            $data['features'] = ['id' => [], 'en' => []];
        }

        $item->update($data);

        return redirect()->route('admin.services.items.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $item)
    {
        if ($item->icon && Storage::disk('public')->exists($item->icon)) {
            Storage::disk('public')->delete($item->icon);
        }

        if ($item->detail_image && Storage::disk('public')->exists($item->detail_image)) {
            Storage::disk('public')->delete($item->detail_image);
        }

        $item->delete();

        return redirect()->route('admin.services.items.index')->with('success', 'Service deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|string',
        ]);

        $ids = json_decode($request->input('ids'), true);
        if (! is_array($ids) || empty($ids)) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih.');
        }

        $ids = array_slice(array_unique(array_filter(array_map('intval', $ids))), 0, 100);
        $services = Service::whereIn('id', $ids)->get();
        $count = $services->count();

        if ($count === 0) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        foreach ($services as $service) {
            if ($service->icon && Storage::disk('public')->exists($service->icon)) {
                Storage::disk('public')->delete($service->icon);
            }
            if ($service->detail_image && Storage::disk('public')->exists($service->detail_image)) {
                Storage::disk('public')->delete($service->detail_image);
            }
            $service->delete();
        }

        return redirect()->route('admin.services.items.index')->with('success', "$count layanan berhasil dihapus.");
    }
}
