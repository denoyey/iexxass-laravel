<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (! ($response->json()['success'] ?? false)) {
            return response()->json([
                'success' => false,
                'message' => 'Verifikasi reCAPTCHA gagal. Coba lagi.',
            ]);
        }

        Contact::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
        ]);
    }
}
