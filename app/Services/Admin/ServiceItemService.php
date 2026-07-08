<?php

namespace App\Services\Admin;

use App\Models\Service;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceItemService
{
    protected ImageUploadService $imageService;

    public function __construct(ImageUploadService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Create a new service item.
     */
    public function createService(array $data, $icon, $detailImage): Service
    {
        return DB::transaction(function () use ($data, $icon, $detailImage) {
            $formattedData = $this->formatData($data, $icon, $detailImage);

            return Service::create($formattedData);
        });
    }

    /**
     * Update an existing service item.
     */
    public function updateService(Service $service, array $data, $icon, $detailImage): Service
    {
        return DB::transaction(function () use ($service, $data, $icon, $detailImage) {
            $formattedData = $this->formatData($data, $icon, $detailImage, $service);
            $service->update($formattedData);

            return $service;
        });
    }

    /**
     * Delete a service item and its associated files.
     */
    public function deleteService(Service $service): void
    {
        DB::transaction(function () use ($service) {
            if ($service->icon && Storage::disk('public')->exists($service->icon)) {
                Storage::disk('public')->delete($service->icon);
            }
            if ($service->detail_image && Storage::disk('public')->exists($service->detail_image)) {
                Storage::disk('public')->delete($service->detail_image);
            }
            $service->delete();
        });
    }

    /**
     * Format data, handle file uploads and array conversions.
     */
    protected function formatData(array $data, $icon, $detailImage, ?Service $existingService = null): array
    {
        if ($icon) {
            if ($existingService && $existingService->icon && Storage::disk('public')->exists($existingService->icon)) {
                Storage::disk('public')->delete($existingService->icon);
            }
            $data['icon'] = $this->imageService->uploadAndConvertToWebp($icon, 'content/services');
        }

        if ($detailImage) {
            if ($existingService && $existingService->detail_image && Storage::disk('public')->exists($existingService->detail_image)) {
                Storage::disk('public')->delete($existingService->detail_image);
            }
            $data['detail_image'] = $this->imageService->uploadAndConvertToWebp($detailImage, 'content/services');
        }

        if (isset($data['features']) && is_array($data['features'])) {
            $data['features'] = [
                'id' => isset($data['features']['id']) ? array_values(array_filter($data['features']['id'])) : [],
                'en' => isset($data['features']['en']) ? array_values(array_filter($data['features']['en'])) : [],
            ];
        } else {
            $data['features'] = ['id' => [], 'en' => []];
        }

        return $data;
    }
}
