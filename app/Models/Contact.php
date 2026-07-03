<?php

namespace App\Models;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Mail\ContactMail;


class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts'; // nama tabel sesuai DB

    public $fillable = ['name', 'email', 'subject', 'message'];

    public static function boot()
    {
        parent::boot();
        static::created(function ($item) {
            $adminEmail = "customer.care@iexxass.com";

            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
