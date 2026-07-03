<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class FileebookController extends Controller
{
    public function download()
    {
        $path = public_path('uploads/pdf/portofolio.pdf');

        if (! file_exists($path)) {
            abort(404);
        }

        return response()->download($path, 'portofolio.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
