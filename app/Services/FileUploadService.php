<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class FileUploadService
{
    /**
     * Upload a file and overwrite the destination if it exists.
     */
    public function uploadAndOverwrite(UploadedFile $file, string $destinationDir, string $fileName): string
    {
        // Ensure directory exists
        if (! File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        $fullPath = rtrim($destinationDir, '/').'/'.$fileName;

        // Delete existing file if present
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }

        // Move the new file
        $file->move($destinationDir, $fileName);

        return $fullPath;
    }
}
