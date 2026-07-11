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
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
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

        $validated['message'] = strip_tags($validated['message']);

        Contact::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
        ]);
    }
}
