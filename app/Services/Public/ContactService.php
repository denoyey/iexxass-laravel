<?php

namespace App\Services\Public;

use App\Models\Contact;
use Illuminate\Support\Facades\Http;

class ContactService
{
    /**
     * Verify reCAPTCHA token and save contact message.
     *
     * @return array [success: bool, message: string]
     */
    public function submitMessage(array $data, string $ipAddress): array
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $data['g-recaptcha-response'],
            'remoteip' => $ipAddress,
        ]);

        if (! ($response->json()['success'] ?? false)) {
            return [
                'success' => false,
                'message' => 'Verifikasi reCAPTCHA gagal. Coba lagi.',
            ];
        }

        Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        return [
            'success' => true,
            'message' => 'Message sent successfully!',
        ];
    }
}
