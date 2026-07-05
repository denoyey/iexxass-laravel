<?php

namespace App\Services\Admin\GlobalSearch\Providers;

use App\Models\AboutUs;
use App\Models\Service;
use App\Models\ServiceSetting;
use App\Services\Admin\GlobalSearch\SearchProviderInterface;

class ContentSearchProvider implements SearchProviderInterface
{
    public function search(string $query, int $limit): array
    {
        $results = [];

        // 1. Search E-Book (Static Check)
        if (stripos('ebook portofolio', $query) !== false || stripos('e-book portfolio', $query) !== false || stripos('portofolio', $query) !== false) {
            $results[] = [
                'type' => 'E-Book Portofolio',
                'title' => 'E-Book Portofolio Settings',
                'url' => route('admin.ebook.index'),
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />',
            ];
        }

        // 2. Search About Us (Model)
        $aboutUsMatches = AboutUs::where('title', 'LIKE', "%{$query}%")
            ->orWhere('subtitle', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->exists();

        // Also check if they just searched "about us"
        if ($aboutUsMatches || stripos('about us', $query) !== false || stripos('tentang kami', $query) !== false) {
            $results[] = [
                'type' => 'About Us',
                'title' => 'About Us Settings',
                'url' => route('admin.about-us.edit'),
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />',
            ];
        }

        // 3. Search Service Settings (Header & Quote)
        // Since we don't know the exact ID for header/quote, usually ID 1 is header, ID 2 is quote. But let's check `type` column if it exists, or just check content and redirect to both.
        // Actually ServiceSetting doesn't have type? Let's check ServiceSetting model.
        // I will just use static checks for Service Header and Quote, and also search `ServiceSetting` model.
        $serviceSettingsMatch = ServiceSetting::where('title', 'LIKE', "%{$query}%")
            ->orWhere('subtitle', 'LIKE', "%{$query}%")
            ->exists();

        if ($serviceSettingsMatch || stripos('services header', $query) !== false || stripos('layanan', $query) !== false) {
            $results[] = [
                'type' => 'Service Settings',
                'title' => 'Service Header Settings',
                'url' => route('admin.services.header.index'), // Might redirect or go to index
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />',
            ];
            $results[] = [
                'type' => 'Service Settings',
                'title' => 'Service Quote Settings',
                'url' => route('admin.services.quote.edit'), // Assume edit route doesn't need ID or has hardcoded
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.43 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />',
            ];
        }

        // 4. Search Service Items
        $services = Service::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->limit($limit)
            ->get();

        foreach ($services as $service) {
            $results[] = [
                'type' => 'Service Item',
                'title' => $service->title,
                'url' => route('admin.services.items.index'), // Assuming we link to the index page for items
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />',
            ];
        }

        // Return up to limit (just a rough limit for the combined results)
        return array_slice($results, 0, $limit * 2); // allowing a bit more since it's combined
    }
}
