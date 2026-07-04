<?php

use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\FileebookController;
use App\Http\Controllers\Public\HalamanController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::middleware('throttle:guest')->group(function () {
    Route::get('/', [HalamanController::class, 'dashboard'])->name('dashboard');
    Route::post('/', [ContactController::class, 'store'])->name('contact.us');
    Route::get('/download/ebook-portofolio', [FileebookController::class, 'download'])->name('file.download');
    Route::get('/lang/{locale}', function (string $locale) {
        if (! in_array($locale, ['en', 'id', 'fr'])) {
            abort(400);
        }
        session(['locale' => $locale]);
        App::setLocale($locale);

        return redirect()->back();
    })->name('lang.switch');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (placeholder untuk pengembangan)
|--------------------------------------------------------------------------
*/
// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
//     Route::get('/contacts', [Admin\ContactManageController::class, 'index'])->name('admin.contacts');
// });
