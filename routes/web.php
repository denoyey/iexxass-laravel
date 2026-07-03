<?php

use App\Http\Controllers\Contact;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\FileebookController;

Route::middleware('throttle:guest')->group(function () {
Route::get('/', [HalamanController::class ,'dashboard'])->name('dashboard');
Route::get('/portofolio', [FileebookController::class, 'download'])->name('file.download');

Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['en', 'id', 'fr'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    App::setLocale($locale);
    return redirect()->back();
    // ...
})->name('lang.switch');

// Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'store'])->name('contact.us');

});
