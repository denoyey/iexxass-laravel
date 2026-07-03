---
trigger: always_on
glob:
description: Panduan lengkap project I'Exxass Laravel — arsitektur, fitur, konvensi OOP, dan aturan pengembangan.
---

# I'Exxass Laravel — Dokumentasi Project

## 1. Ringkasan Project

**I'Exxass** adalah website company profile perusahaan ICT yang bergerak di bidang **Web Development**, **Networking & CCTV Solutions**, dan **IT Consultancy**. Project ini dibangun menggunakan **Laravel 12** sebagai backend framework dengan **Blade Templating**, **Tailwind CSS v4** untuk styling, **Vite** sebagai bundler, dan **Alpine.js** untuk interaktivitas ringan di frontend.

- **Domain Produksi:** `https://iexxass.com`
- **Database:** MySQL (`iexxassc_iexxass`)
- **Arsitektur:** Single Page Application (SPA-like) — semua section (Home, About, Service, Contact, Footer) di-render dalam satu halaman menggunakan `@include` dan `@yield` pada Blade, lalu navigasi antar section menggunakan smooth scroll JavaScript.

---

## 2. Tech Stack

| Komponen        | Teknologi                                      |
|-----------------|------------------------------------------------|
| Framework       | Laravel 12 (PHP ≥ 8.2)                         |
| Templating      | Blade (`resources/views/`)                     |
| CSS Framework   | Tailwind CSS v4 (`@tailwindcss/vite`)           |
| JS Interaktif   | Alpine.js v3 (CDN)                             |
| Bundler         | Vite 7 + `laravel-vite-plugin`                 |
| Map             | Leaflet.js + OpenStreetMap                     |
| reCAPTCHA       | Google reCAPTCHA v2                            |
| Mail            | Laravel Mailable (SMTP / log driver)           |
| Font            | Google Fonts — Abhaya Libre                    |
| Localization    | Laravel built-in (`lang/en`, `lang/id`)        |
| Rate Limiting   | Laravel RateLimiter (100 req/min per IP)       |
| Live Chat       | Tawk.to (widget embed)                         |

---

## 3. Struktur Folder Project

```
iexxass_laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php            # Base controller (abstract)
│   │   │   ├── HalamanController.php     # Public: halaman utama
│   │   │   ├── ContactController.php     # Public: form contact + reCAPTCHA
│   │   │   └── FileebookController.php   # Public: download e-book portofolio
│   │   └── Middleware/
│   │       └── SetLocale.php             # Middleware: set locale dari session
│   ├── Mail/
│   │   └── ContactMail.php               # Mailable: kirim email contact
│   ├── Models/
│   │   ├── User.php                      # Model User (default Laravel)
│   │   └── Contact.php                   # Model Contact (mass assignment + auto-email on created)
│   └── Providers/
│       └── AppServiceProvider.php        # Rate Limiting config + locale session
│
├── bootstrap/
│   └── app.php                           # Middleware registration (SetLocale)
│
├── config/
│   └── app.php                           # available_locales, contact_phone, dll.
│
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   ├── 0001_01_01_000002_create_jobs_table.php
│   │   └── 2025_12_22_031146_create_contacts_table.php
│   ├── factories/
│   ├── seeders/
│   └── database.sqlite
│
├── lang/
│   ├── en/
│   │   └── message.php                   # Terjemahan bahasa Inggris
│   └── id/
│       └── message.php                   # Terjemahan bahasa Indonesia
│
├── resources/
│   ├── css/
│   │   └── app.css                       # Tailwind theme + custom CSS (animasi, hamburger)
│   ├── js/
│   │   ├── bootstrap.js                  # Axios setup
│   │   └── app.js                        # Scroll, hamburger, modal, contact AJAX, IntersectionObserver
│   └── views/
│       ├── index.blade.php               # Halaman utama (extends template, @yield home)
│       ├── layout/
│       │   ├── template.blade.php        # Master layout (HTML head + section wrapper)
│       │   ├── header.blade.php          # Component: navigasi + language switcher
│       │   └── footer.blade.php          # Component: footer + Leaflet map + social links
│       ├── dashboard/
│       │   ├── home.blade.php            # (kosong, konten home ada di index.blade.php)
│       │   ├── about.blade.php           # Section: About Us
│       │   ├── services.blade.php        # Section: Services (Web Dev, Networking, IT Consultant)
│       │   └── contact.blade.php         # Section: Contact form
│       └── emails/
│           └── contact.blade.php         # Template email notifikasi contact
│
├── routes/
│   ├── web.php                           # Semua route public (GET /, POST /, /portofolio, /lang/{locale})
│   └── console.php                       # Artisan commands
│
├── public/
│   ├── index.php                         # Entry point Laravel
│   ├── .htaccess                         # Apache rewrite rules
│   ├── sitemap.xml                       # Sitemap untuk SEO
│   ├── robots.txt                        # Robots config
│   ├── favicon.ico
│   ├── src/img/                          # Static images (logo, background, icons)
│   ├── build/                            # Vite build output
│   ├── storage/                          # Symlink ke storage/app/public
│   └── uplouds/                          # (kosong, file upload)
│
├── storage/
│   └── app/public/uplouds/               # File portofolio PDF
│
├── vite.config.js                        # Vite + Tailwind + Laravel plugin
├── composer.json                         # PHP dependencies
├── package.json                          # NPM dependencies
└── .env                                  # Environment variables
```

---

## 4. Daftar Fitur Lengkap

### 4.1 Landing Page / Home (`index.blade.php`)
- Hero section dengan logo I'Exxass dan tagline "Transforming the Future of Connectivity"
- Tombol **"Let's Connect"** → redirect ke WhatsApp dengan pesan template
- Tombol **"E-Book Portofolio"** → buka modal konfirmasi download PDF
- Modal konfirmasi download menggunakan vanilla JS (`openModal`, `closeModal`)

### 4.2 About Us (`dashboard/about.blade.php`)
- Section dengan background image (`about-us.png`)
- Judul dan deskripsi menggunakan **localization** (`__('message.aboutUs.judul')`)
- Scroll-reveal animation via `IntersectionObserver` (class `.header` → `.show`)

### 4.3 Services (`dashboard/services.blade.php`)
- 3 service card: **Web Developer**, **Networking & CCTV**, **IT Consultant**
- Setiap card menampilkan deskripsi terpotong (`Str::limit(__, 150)`) + link "Read More"
- Detail section per service dengan: deskripsi lengkap, daftar keunggulan (Why Choose), harga mulai, dan CTA WhatsApp
- Navigasi "Read More" menggunakan smooth scroll ke section ID (`#web-dev`, `#network`, `#it-consultant`)
- Semua teks menggunakan **localization** (`lang/en/message.php`, `lang/id/message.php`)

### 4.4 Contact Us (`dashboard/contact.blade.php`)
- Form input: Name, Email, Subject, Message
- **Google reCAPTCHA v2** terintegrasi (validasi server-side di `ContactController`)
- Submit via **AJAX Fetch API** (tanpa reload halaman)
- Response JSON → tampilkan status message + reset form + reset reCAPTCHA
- Data contact disimpan ke tabel `contacts` via `Contact::create()`
- Auto-send email ke `customer.care@iexxass.com` via **Model Event** `static::created()` di `Contact.php`

### 4.5 Footer (`layout/footer.blade.php`)
- Informasi alamat perusahaan (Jl. Perum Bukit Tiara, Tangerang, Banten)
- Link email: `customer.care@iexxass.com` dan `support@iexxass.com`
- Social media icons: WhatsApp, Facebook, TikTok
- Navigasi footer (Home, About Us, Service, Contact)
- Daftar layanan (Web Developer, Networking, IT Consultant)
- **Leaflet.js Map** embed — marker lokasi kantor dengan popup link Google Maps
- Copyright notice

### 4.6 Multi-Language / Localization
- Bahasa tersedia: **English (en)** dan **Indonesia (id)**
- Language switcher di header menggunakan Alpine.js dropdown
- Route: `GET /lang/{locale}` → simpan ke session → redirect back
- Middleware `SetLocale` di-append ke web middleware group via `bootstrap/app.php`
- File terjemahan: `lang/en/message.php` dan `lang/id/message.php`

### 4.7 E-Book Portofolio Download
- Route: `GET /portofolio`
- Controller: `FileebookController@download`
- File disajikan inline (preview di browser) dari `storage/app/public/uplouds/portofolio.pdf`
- Validasi keberadaan file sebelum serve (`abort(404)` jika tidak ada)

### 4.8 Email Notification
- Mailable class: `App\Mail\ContactMail`
- Template: `emails/contact.blade.php`
- Trigger: Model Event `Contact::created()` → otomatis kirim email ke admin
- Data email: nama, email, subject, message pengirim

### 4.9 Rate Limiting
- Dikonfigurasi di `AppServiceProvider::ConfigurationRateLimiting()`
- Guest: 100 request/menit per IP
- Authenticated user: unlimited
- Applied via middleware group `throttle:guest` di `routes/web.php`

### 4.10 SEO
- Meta tags lengkap: description, keywords, OG tags (title, type, description, url, image, locale)
- Google Search Console verification meta tag
- Canonical URL
- `sitemap.xml` dan `robots.txt` di `/public`
- Favicon dan logo

### 4.11 UI/UX Features
- **Scroll-reveal animation** — elemen `.header` muncul dengan animasi `translateY` + `scale` saat masuk viewport (via `IntersectionObserver`)
- **Sticky navbar** — header berubah style saat scroll (`navbar-fixed`)
- **Hamburger menu** — responsive navigation untuk mobile (toggle class `hamburger-active` + `hidden`)
- **Smooth scroll** — navigasi menu scroll ke section target menggunakan `scrollIntoView({ behavior: 'smooth' })`
- **Tawk.to live chat widget** — embed di footer section

---

## 5. Aturan Pengembangan (Development Rules)

### 5.1 Prinsip OOP & Clean Code

- Semua logic bisnis **WAJIB** ada di Controller atau Service class, **BUKAN** di view/blade.
- Setiap Controller **WAJIB** meng-extend `App\Http\Controllers\Controller` (abstract base class).
- Setiap Model **WAJIB** berada di `app/Models/` dan menggunakan namespace `App\Models`.
- Setiap Mailable **WAJIB** berada di `app/Mail/` dan meng-extend `Illuminate\Mail\Mailable`.
- Setiap Middleware **WAJIB** berada di `app/Http/Middleware/`.
- Penamaan class menggunakan **PascalCase** (contoh: `ContactController`, `ContactMail`).
- Penamaan method menggunakan **camelCase** (contoh: `store()`, `download()`, `dashboard()`).

### 5.2 Konvensi Penamaan Folder & File

#### Controllers — Pisahkan berdasarkan area (Public vs Admin)
```
app/Http/Controllers/
├── Controller.php                    # Base controller (abstract) — JANGAN diubah
├── Public/                           # Controller untuk halaman publik (visitor)
│   ├── HalamanController.php         # Landing page
│   ├── ContactController.php         # Form contact
│   └── FileebookController.php       # Download portofolio
└── Admin/                            # Controller untuk panel admin (autentikasi)
    ├── DashboardController.php       # Dashboard admin
    └── ContactManageController.php   # Kelola data contact masuk
```

> **Catatan:** Saat ini semua controller masih di root `Controllers/`. Untuk fitur baru yang bersifat publik, buat di `Controllers/Public/`. Untuk fitur admin, buat di `Controllers/Admin/`. Controller yang sudah ada di root **boleh tetap** di sana untuk backward compatibility, tetapi fitur baru **WAJIB** mengikuti konvensi folder ini.

#### Views — Pisahkan berdasarkan area
```
resources/views/
├── index.blade.php                   # Entry point halaman utama (extends template)
├── layout/                           # Layout & reusable components
│   ├── template.blade.php            # Master layout (head, section wrapper)
│   ├── header.blade.php              # Component: navigasi + language switcher
│   └── footer.blade.php              # Component: footer + map + social
├── components/                       # Blade components reusable (BUAT BARU di sini)
│   ├── modal.blade.php               # Component: modal reusable
│   ├── service-card.blade.php        # Component: card layanan reusable
│   ├── cta-button.blade.php          # Component: tombol CTA WhatsApp
│   └── section-header.blade.php      # Component: heading section reusable
├── dashboard/                        # Section-section halaman publik
│   ├── home.blade.php                # Section Home
│   ├── about.blade.php               # Section About Us
│   ├── services.blade.php            # Section Services
│   └── contact.blade.php             # Section Contact
├── admin/                            # Halaman panel admin (BUAT BARU di sini)
│   ├── index.blade.php               # Dashboard admin
│   └── contacts/
│       └── index.blade.php           # Daftar contact masuk
└── emails/                           # Template email
    └── contact.blade.php             # Email notifikasi contact
```

#### Models
```
app/Models/
├── User.php                          # Model User (sudah ada)
└── Contact.php                       # Model Contact (sudah ada)
```
Model baru ditambahkan langsung di `app/Models/` dengan format `NamaModel.php`.

#### Routes
```
routes/
├── web.php                           # Route publik + admin (gunakan prefix & middleware group)
└── console.php                       # Artisan commands
```

### 5.3 Aturan Reusability Components

**WAJIB cek dulu apakah component/code yang dibutuhkan sudah ada sebelum membuat yang baru.**

#### Components yang SUDAH ADA (gunakan langsung):

| Component                   | Lokasi                              | Cara Pakai                          |
|-----------------------------|-------------------------------------|-------------------------------------|
| Master Layout               | `layout/template.blade.php`         | `@extends('layout.template')`       |
| Header / Navbar             | `layout/header.blade.php`           | `@include('layout.header')`         |
| Footer + Map                | `layout/footer.blade.php`           | `@include('layout.footer')`         |
| Scroll Animation            | CSS class `.header` di `app.css`    | Tambahkan class `header` ke elemen  |
| Modal Open/Close            | `app.js` `openModal()` / `closeModal()` | `onclick="openModal('modalId')"`  |
| Smooth Scroll Navigation    | `app.js` class `.menu-link` + `data-target` | `<a class="menu-link" data-target="sectionId">` |
| Hamburger Menu              | `app.js` + `app.css`               | Sudah otomatis di header            |
| AJAX Contact Submit         | `app.js` form `#contactForm`       | Sudah otomatis di contact section   |
| Language Switcher           | Alpine.js di `header.blade.php`    | Sudah otomatis di header            |
| reCAPTCHA                   | Google reCAPTCHA v2 di template    | `<div class="g-recaptcha" data-sitekey="...">`  |
| WhatsApp CTA Link           | Template string di views            | `https://wa.me/{{ config('app.contact_phone') }}?text=...` |
| Leaflet Map                 | `footer.blade.php` `@push('map')`  | Sudah otomatis di footer            |
| Contact Email Mailable      | `app/Mail/ContactMail.php`         | `Mail::to(...)->send(new ContactMail($data))` |

#### Rules untuk membuat component BARU:

1. **Cek tabel di atas** — jika sudah ada, gunakan yang sudah ada.
2. Jika belum ada, buat di `resources/views/components/` sebagai Blade Component.
3. Component harus **generic dan reusable** — terima parameter via `@props`.
4. Penamaan file: `kebab-case.blade.php` (contoh: `service-card.blade.php`).
5. Cara pakai: `<x-service-card :title="$title" :description="$desc" />` atau `@include('components.nama')`.

### 5.4 Aturan Halaman (Pages)

- Setiap halaman utama **WAJIB** menggunakan file `index.blade.php`.
- Contoh:
  - `resources/views/admin/index.blade.php` → Dashboard admin
  - `resources/views/admin/contacts/index.blade.php` → List contacts
- Halaman publik saat ini menggunakan `resources/views/index.blade.php` sebagai entry point.
- Semua section publik (About, Services, Contact) di-include dari `resources/views/dashboard/`.

### 5.5 Aturan Route

```php
// Route publik — sudah ada
Route::middleware('throttle:guest')->group(function () {
    Route::get('/', [HalamanController::class, 'dashboard'])->name('dashboard');
    Route::post('/', [ContactController::class, 'store'])->name('contact.us');
    Route::get('/portofolio', [FileebookController::class, 'download'])->name('file.download');
    Route::get('/lang/{locale}', function (...) { ... })->name('lang.switch');
});

// Route admin — BUAT BARU dengan pattern ini
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/contacts', [Admin\ContactManageController::class, 'index'])->name('admin.contacts');
});
```

### 5.6 Aturan Database & Model

- Migration file: `database/migrations/YYYY_MM_DD_HHMMSS_create_namatabel_table.php`
- Model: `app/Models/NamaModel.php`
- Setiap model **WAJIB** mendefinisikan `$fillable` atau `$guarded`.
- Gunakan **Model Events** untuk side-effect (contoh: kirim email saat `Contact::created`).
- Relasi antar model didefinisikan sebagai method di model class (contoh: `hasMany`, `belongsTo`).

### 5.7 Aturan Styling & Frontend

- **Tailwind CSS v4** — semua styling menggunakan utility class Tailwind.
- Custom theme di `resources/css/app.css` bagian `@theme { }`:
  - `--color-BG-IExxass: #030B7C` (biru utama brand)
  - `--color-BG-White: #FFFFFF`
  - `--color-BG-Black: #050506`
  - `--font-AbhayaLibre: "Abhaya Libre", serif`
- Animasi scroll-reveal: tambahkan class `header` ke elemen yang ingin di-animasi.
- Jika butuh custom CSS baru, tambahkan di `resources/css/app.css`.
- **JANGAN** inline style kecuali untuk dynamic value (contoh: `background-image: url(...)`).

### 5.8 Aturan JavaScript

- File utama: `resources/js/app.js`
- Semua fungsi global (modal, dll.) di-attach ke `window` object.
- Untuk interaktivitas ringan (dropdown, toggle), gunakan **Alpine.js** (`x-data`, `x-show`, `x-on`).
- Untuk DOM manipulation kompleks, gunakan vanilla JS di `app.js`.
- **JANGAN** tambahkan library JS baru tanpa alasan kuat — prioritaskan Alpine.js dan vanilla JS.

---

## 6. Database Schema

### Tabel `contacts`
| Kolom       | Tipe      | Keterangan                |
|-------------|-----------|---------------------------|
| id          | bigint    | Primary key, auto-increment |
| name        | string    | Nama pengirim             |
| email       | string    | Email pengirim            |
| subject     | string    | Subjek pesan              |
| message     | string    | Isi pesan                 |
| created_at  | timestamp | Waktu dibuat              |
| updated_at  | timestamp | Waktu diupdate            |

### Tabel `users`
| Kolom              | Tipe      | Keterangan                |
|--------------------|-----------|---------------------------|
| id                 | bigint    | Primary key               |
| name               | string    | Nama user                 |
| email              | string    | Email (unique)            |
| email_verified_at  | timestamp | Nullable                  |
| password           | string    | Hashed password           |
| remember_token     | string    | Token remember me         |
| created_at         | timestamp |                           |
| updated_at         | timestamp |                           |

### Tabel `sessions`
| Kolom         | Tipe    | Keterangan              |
|---------------|---------|-------------------------|
| id            | string  | Primary key             |
| user_id       | bigint  | Nullable, indexed       |
| ip_address    | string  | Max 45 char, nullable   |
| user_agent    | text    | Nullable                |
| payload       | longText|                         |
| last_activity | integer | Indexed                 |

---

## 7. Environment Variables Penting

| Variable              | Deskripsi                              | Contoh                    |
|-----------------------|----------------------------------------|---------------------------|
| `APP_NAME`            | Nama aplikasi                          | `iexxass`                 |
| `APP_URL`             | URL aplikasi                           | `https://iexxass.com`     |
| `APP_LOCALE`          | Bahasa default                         | `en`                      |
| `DB_CONNECTION`       | Driver database                        | `mysql`                   |
| `DB_DATABASE`         | Nama database                          | `iexxassc_iexxass`        |
| `RECAPTCHA_SITE_KEY`  | Google reCAPTCHA site key              | (lihat .env)              |
| `RECAPTCHA_SECRET_KEY`| Google reCAPTCHA secret key            | (lihat .env)              |
| `APP_CONTACT_PHONE`   | Nomor WhatsApp (format internasional)  | `6287838039611`           |
| `MAIL_MAILER`         | Driver email                           | `smtp` / `log`            |

---

## 8. Cara Menjalankan Project

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Migrasi database
php artisan migrate

# Jalankan development server
php artisan serve          # Laravel server di http://127.0.0.1:8000
npm run dev                # Vite dev server (HMR)

# Atau jalankan semua sekaligus
composer dev
```

---

## 9. Panduan Menambah Fitur Baru

### Langkah-langkah:

1. **Cek apakah component yang dibutuhkan sudah ada** (lihat tabel Section 5.3).
2. **Buat Model** (jika butuh tabel baru):
   - File: `app/Models/NamaModel.php`
   - Migration: `php artisan make:migration create_namatabel_table`
3. **Buat Controller** di folder yang sesuai:
   - Publik: `app/Http/Controllers/Public/NamaController.php`
   - Admin: `app/Http/Controllers/Admin/NamaController.php`
4. **Buat View**:
   - Publik section baru: `resources/views/dashboard/namasection.blade.php`
   - Halaman admin: `resources/views/admin/namafitur/index.blade.php`
   - Component reusable baru: `resources/views/components/nama-component.blade.php`
5. **Tambahkan Route** di `routes/web.php` sesuai grup (public/admin).
6. **Gunakan localization** untuk semua teks yang ditampilkan ke user.
7. **Gunakan animasi scroll-reveal** (class `header`) untuk elemen yang perlu animasi.
8. **Gunakan WhatsApp CTA** yang sudah ada: `config('app.contact_phone')`.

### Contoh: Menambah Halaman Blog (Publik)

```php
// 1. Model: app/Models/Blog.php
class Blog extends Model {
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'image'];
}

// 2. Controller: app/Http/Controllers/Public/BlogController.php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller {
    public function index() {
        $blogs = Blog::latest()->paginate(10);
        return view('dashboard.blog', compact('blogs'));
    }
}

// 3. Route: routes/web.php (di dalam group throttle:guest)
Route::get('/blog', [Public\BlogController::class, 'index'])->name('blog.index');

// 4. View: resources/views/dashboard/blog.blade.php
// — Gunakan @include('components.section-header') untuk heading
// — Gunakan class "header" untuk scroll-reveal animation
```

### Contoh: Menambah Halaman Admin Contacts

```php
// 1. Controller: app/Http/Controllers/Admin/ContactManageController.php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactManageController extends Controller {
    public function index() {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }
}

// 2. Route: routes/web.php
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/contacts', [Admin\ContactManageController::class, 'index'])->name('admin.contacts');
});

// 3. View: resources/views/admin/contacts/index.blade.php
// — Gunakan layout terpisah untuk admin atau extend template yang sama
```

---

## 10. Catatan Penting & Known Issues

1. **`ContactController@store`** — setelah `return response()->json(...)` di line 43-46, kode `Mail::to(...)` di line 47 **tidak pernah dieksekusi** karena sudah return. Email sebenarnya dikirim via **Model Event** `Contact::created()` di `Contact.php`, jadi line 47 di controller bisa dihapus.

2. **`FileebookController`** — typo nama class ("Fileebook" seharusnya "Filebook" atau "EbookController"). Untuk backward compatibility, biarkan nama yang sudah ada.

3. **`public/uplouds/`** — typo folder name ("uplouds" seharusnya "uploads"). Sudah digunakan di beberapa tempat, jadi jangan rename tanpa update semua referensi.

4. **`dashboard/home.blade.php`** — file kosong. Konten home sebenarnya ada di `index.blade.php` via `@yield('home')`. File ini bisa dihapus atau diisi konten.

5. **`app.js` CSRF token** — menggunakan `{{ csrf_token() }}` langsung di JS file. Ini **tidak akan bekerja** karena `app.js` bukan Blade file. Sebaiknya ambil CSRF token dari meta tag HTML: `document.querySelector('meta[name="csrf-token"]').content`.

6. **`resources/css/app.css`** — menggunakan `@import 'tailwindcss'` dan `@theme {}` yang merupakan syntax Tailwind CSS v4.

7. **Semua gambar statis** disimpan di `public/src/img/` dan diakses via `{{ asset('src/img/filename.png') }}`.

8. **Config `app.contact_phone`** — dipanggil via `config('app.contact_phone')` tapi didefinisikan di `.env` sebagai `APP_CONTACT_PHONE`. Pastikan di `config/app.php` ada key: `'contact_phone' => env('APP_CONTACT_PHONE')`. Jika belum ada, tambahkan.
