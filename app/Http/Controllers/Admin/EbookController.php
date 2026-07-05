<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EbookController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:access_admin_panel'),
        ];
    }

    /**
     * Display the e-book settings page.
     */
    public function index()
    {
        // Check if file exists
        $filePath = public_path('uploads/pdf/portofolio.pdf');
        $fileExists = file_exists($filePath);
        $fileSize = $fileExists ? filesize($filePath) : 0;
        $lastModified = $fileExists ? filemtime($filePath) : null;

        return view('pages.admin.ebook.index', compact('fileExists', 'fileSize', 'lastModified'));
    }

    /**
     * Update the e-book file.
     */
    public function update(Request $request, FileUploadService $fileService)
    {
        $request->validate([
            'ebook_file' => 'required|file|mimes:pdf|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('ebook_file')) {
            $destinationDir = public_path('uploads/pdf');
            $fileName = 'portofolio.pdf';

            $fileService->uploadAndOverwrite(
                $request->file('ebook_file'),
                $destinationDir,
                $fileName
            );

            return redirect()->route('admin.ebook.index')->with('success', 'E-Book Portofolio berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }
}
