<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    // public function showContactForm()
    // {
    //     return view('contact-form');
    // }



    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
          $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);
        if (!($response->json()['success'] ?? false)) {
            return back()->withErrors([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Coba lagi.'
            ])->withInput();
        }
        Contact::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!'
        ]);
        Mail::to('customer.care@iexxass.com')->send(new ContactMail($request));
    }
}
