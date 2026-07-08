<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AccessManagement\ActivityLogController;
use App\Http\Controllers\Admin\AccessManagement\RoleController;
use App\Http\Controllers\Admin\AccessManagement\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EbookController;
use App\Http\Controllers\Admin\GlobalSearchController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceHeaderController;
use App\Http\Controllers\Admin\ServiceItemController;
use App\Http\Controllers\Admin\ServiceQuoteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\FileebookController;
use App\Http\Controllers\Public\HalamanController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/ix-core')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    });

    Route::middleware(['guest', 'prevent-back-history'])->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    });

    Route::middleware(['auth', 'permission:access_admin_panel', 'prevent-back-history', 'prevent-spam'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/global-search', [GlobalSearchController::class, 'search'])->name('global-search');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/update-info', [ProfileController::class, 'updateInfo'])->name('profile.update-info');
        Route::delete('roles/bulk', [RoleController::class, 'bulkDelete'])->name('roles.bulk-delete');
        Route::resource('roles', RoleController::class);

        Route::delete('users/bulk', [UserController::class, 'bulkDelete'])->name('users.bulk-delete');
        Route::resource('users', UserController::class);

        Route::delete('activity-logs/bulk', [ActivityLogController::class, 'bulkDelete'])->name('activity-logs.bulk-delete');
        Route::resource('activity-logs', ActivityLogController::class)->only(['index', 'show', 'destroy']);

        Route::middleware(['permission:manage_about_us'])->group(function () {
            Route::get('about-us', [AboutUsController::class, 'edit'])->name('about-us.edit');
            Route::put('about-us', [AboutUsController::class, 'update'])->name('about-us.update');
        });

        Route::middleware(['permission:manage_about_us'])->group(function () {
            Route::get('ebook', [EbookController::class, 'index'])->name('ebook.index');
            Route::put('ebook', [EbookController::class, 'update'])->name('ebook.update');
        });

        Route::middleware(['permission:manage_services'])->group(function () {
            Route::get('services/header', [ServiceHeaderController::class, 'index'])->name('services.header.index');
            Route::get('services/header/{id}/edit', [ServiceHeaderController::class, 'edit'])->name('services.header.edit');
            Route::put('services/header/{id}', [ServiceHeaderController::class, 'update'])->name('services.header.update');

            Route::get('services/quote', [ServiceQuoteController::class, 'edit'])->name('services.quote.edit');
            Route::put('services/quote', [ServiceQuoteController::class, 'update'])->name('services.quote.update');

            Route::delete('services/items/bulk', [ServiceItemController::class, 'bulkDelete'])->name('services.items.bulk-delete');
            Route::post('services/items/reorder', [ServiceItemController::class, 'reorder'])
                ->name('services.items.reorder')
                ->withoutMiddleware('prevent-spam')
                ->middleware('throttle:60,1');
            Route::resource('services/items', ServiceItemController::class)->names('services.items')->except(['show']);
        });

        Route::delete('projects/bulk', [ProjectController::class, 'bulkDelete'])->name('projects.bulk-delete');
        Route::post('projects/reorder', [ProjectController::class, 'reorder'])
            ->name('projects.reorder')
            ->withoutMiddleware('prevent-spam')
            ->middleware('throttle:60,1');
        Route::delete('projects/delete-all-images/{id_project}', [ProjectController::class, 'destroyAllImages'])->name('projects.destroyAllImages');
        Route::post('projects/update-image/{id_project_image}', [ProjectController::class, 'updateImage'])->name('projects.updateImage');
        Route::delete('projects/delete-image/{id_project_image}', [ProjectController::class, 'destroyImage'])->name('projects.destroyImage');
        Route::resource('projects', ProjectController::class);
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::post('/keep-alive', [LoginController::class, 'keepAlive'])->name('keep-alive');
    });
});

Route::fallback(function () {
    if (request()->is('ix-core') || request()->is('ix-core/*')) {
        return response()->view('errors.404-admin', [], 404);
    }

    abort(404);
});
