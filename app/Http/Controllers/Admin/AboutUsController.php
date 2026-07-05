<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsUpdateRequest;
use App\Models\AboutUs;
use App\Services\ImageUploadService;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::first();
        if (! $aboutUs) {
            $aboutUs = new AboutUs;
        }

        return view('pages.admin.about-us.edit', compact('aboutUs'));
    }

    public function update(AboutUsUpdateRequest $request, ImageUploadService $imageService)
    {
        $aboutUs = AboutUs::first();
        if (! $aboutUs) {
            $aboutUs = new AboutUs;
        }

        $data = $request->validated();

        if ($request->hasFile('background_image')) {
            if ($aboutUs->background_image && Storage::disk('public')->exists($aboutUs->background_image)) {
                Storage::disk('public')->delete($aboutUs->background_image);
            }

            $quality = $request->input('compression_cover', 80);
            $data['background_image'] = $imageService->uploadAndConvertToWebp($request->file('background_image'), 'content/about-us', $quality);
        }

        if ($aboutUs->exists) {
            $aboutUs->update($data);
        } else {
            AboutUs::create($data);
        }

        return redirect()->route('admin.about-us.edit')->with('success', 'Data About Us berhasil diperbarui.');
    }
}
