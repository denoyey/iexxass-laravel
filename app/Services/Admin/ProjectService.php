<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectService
{
    protected ImageUploadService $imageService;

    public function __construct(ImageUploadService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Create a new project along with its thumbnail and gallery images.
     */
    public function createProject(array $data, $thumbnail, ?array $galleryImages): Project
    {
        return DB::transaction(function () use ($data, $thumbnail, $galleryImages) {
            $maxOrder = Project::max('order_column') ?? 0;

            $thumbnailPath = $this->imageService->uploadAndConvertToWebp($thumbnail, 'projects/thumbnails');

            $project = Project::create([
                'title' => $data['title'],
                'category' => $data['category'] ?? null,
                'description' => $data['description'] ?? null,
                'thumbnail' => $thumbnailPath,
                'order_column' => $maxOrder + 1,
            ]);

            if (! empty($galleryImages)) {
                foreach ($galleryImages as $index => $file) {
                    $path = $this->imageService->uploadAndConvertToWebp($file, 'projects/gallery');
                    $project->images()->create([
                        'image_path' => $path,
                        'order_column' => $index + 1,
                    ]);
                }
            }

            return $project;
        });
    }

    /**
     * Update an existing project, its thumbnail, and add new gallery images.
     */
    public function updateProject(Project $project, array $data, $thumbnail, ?array $galleryImages): Project
    {
        return DB::transaction(function () use ($project, $data, $thumbnail, $galleryImages) {
            $updateData = [
                'title' => $data['title'],
                'category' => $data['category'] ?? null,
                'description' => $data['description'] ?? null,
            ];

            if ($thumbnail) {
                if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                    Storage::disk('public')->delete($project->thumbnail);
                }
                $updateData['thumbnail'] = $this->imageService->uploadAndConvertToWebp($thumbnail, 'projects/thumbnails');
            }

            $project->update($updateData);

            if (! empty($galleryImages)) {
                $maxOrder = $project->images()->max('order_column') ?? 0;
                foreach ($galleryImages as $index => $file) {
                    $path = $this->imageService->uploadAndConvertToWebp($file, 'projects/gallery');
                    $project->images()->create([
                        'image_path' => $path,
                        'order_column' => $maxOrder + $index + 1,
                    ]);
                }
            }

            return $project;
        });
    }

    /**
     * Delete a project and all its associated images.
     */
    public function deleteProject(Project $project): void
    {
        DB::transaction(function () use ($project) {
            foreach ($project->images as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
                $image->delete();
            }

            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            $project->delete();
        });
    }
}
