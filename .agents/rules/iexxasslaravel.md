---
trigger: always_on
description: Panduan lengkap project I'Exxass Laravel — arsitektur, fitur, konvensi OOP, dan aturan pengembangan.
---

# I'Exxass Project - AI Agent Context & Rules

## 0. System Persona & Behavior
- **Role:** Expert Full Stack Web Developer & Security Specialist.
- **Mindset:** Perform advanced-level analysis. Always provide highly optimized, scalable, secure, and production-ready solutions. Prioritize **maximum performance** and fast page loads.
- **OOP Paradigm:** ALL generated code MUST strictly follow Object-Oriented Programming (OOP) principles without exception.

## 1. Project Overview & Stack
- **Type:** ICT Company Profile SPA-like Website (iexxass.com).
- **Stack:** Laravel 12 (PHP >= 8.2), Blade, Tailwind CSS v4 (Vite), Alpine.js v3, MySQL, Leaflet.js.
- **Architecture:** SPA-like rendering via `@include` and `@yield` in `index.blade.php` with smooth scrolling. Multi-language (ID/EN) implemented via Laravel localization.

## 2. Security & Vulnerability Prevention (Zero-Trust)
- **Fortified Codebase:** Code MUST be heavily secured against ALL attack vectors, specifically SQL Injection, XSS, CSRF, Local File Inclusion (LFI), and IDOR. Defenses must be un-bypassable.
- **Validation & Auth:** Never trust user input. Enforce rigorous server-side validation and sanitization. Implement airtight authentication/authorization for the Admin panel to prevent any privilege escalation or bypass attempts.

## 3. Directory Structure & Clean Code
- **Strict Separation:** MUST separate `Admin` and `Public` areas.
  - Controllers: `app/Http/Controllers/Public/` vs `app/Http/Controllers/Admin/`.
  - Views: `resources/views/dashboard/` (Public Sections) vs `resources/views/admin/`.
- **Logic Placement:** Business logic belongs in Controllers or Services, NEVER in Blade views. 
- **Inheritance:** All controllers MUST extend `App\Http\Controllers\Controller`.
- **Models:** Place in `app/Models/`. Must define `$fillable` or `$guarded`.

## 4. UI/UX, Reusability & Responsiveness
- **100% Responsive Design:** Layouts must adapt flawlessly across all devices.
- **Mobile UI Strict Rules:** On mobile viewports, button text MUST be smaller (use Tailwind `text-[12px]`, `text-xs`, or `text-sm`). Buttons and cards must scale proportionally for a clean, neat appearance.
- **Components:** Reuse existing layouts (`layout.template`, `header`, `footer`). Create new reusable components in `resources/views/components/` using generic `@props`.
- **Interactions:** Apply `.header` for scroll-reveal animations. Use Alpine.js or Vanilla JS (`app.js`). Do NOT add unnecessary JS libraries.

## 5. Routing & Database
- **Routes:** Public routes use `throttle:guest`. Admin routes MUST use `prefix('admin')` and `middleware(['auth'])`.
- **Database:** Key tables are `contacts`, `users`, `sessions`.
- **Contact Form:** Submitted via AJAX Fetch API. Email sending is STRICTLY handled via Model Event `Contact::created()`.

## 6. Known Quirks & Strict Constraints (DO NOT FIX TYPOS)
- **Email Logic:** Ignore `Mail::to()` in `ContactController@store`; emails are handled by Model Events.
- **CSRF Token:** NEVER use `{{ csrf_token() }}` in `app.js`. Fetch it dynamically from the HTML meta tag.
- **Legacy Typos:** Retain `public/uplouds/` folder name and `FileebookController` exactly as spelled for backward compatibility.
- **Config Map:** WhatsApp CTA uses `config('app.contact_phone')`, mapped from `APP_CONTACT_PHONE` in `.env`.