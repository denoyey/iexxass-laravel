<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class FileebookController extends Controller
{
    public function download() {

        $path = 'uplouds/portofolio.pdf';

    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }

    return response(
        Storage::disk('public')->get($path),
        200,
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="portofolio.pdf"',
        ]
    );
}

}