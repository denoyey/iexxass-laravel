<?php

namespace App\Services\Admin\GlobalSearch\Providers;

use App\Models\Project;
use App\Services\Admin\GlobalSearch\SearchProviderInterface;

class ProjectSearchProvider implements SearchProviderInterface
{
    public function search(string $query, int $limit): array
    {
        $projects = Project::where('title', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->select('id', 'title')
            ->limit($limit)
            ->get();

        return $projects->map(function ($item) {
            return [
                'type' => 'Project',
                'title' => $item->title,
                'url' => route('admin.projects.edit', $item->id),
                'icon_svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.084-.816 1.96-1.875 2.05-3.715.31-7.48.31-11.195 0-1.059-.09-1.875-.966-1.875-2.05V14.15c.89.37 1.815.65 2.766.837a4.5 4.5 0 0 0 1.488.163h4.634a4.5 4.5 0 0 0 1.488-.163c.951-.186 1.876-.466 2.766-.837ZM20.25 10.5s0 0 0 0a2.25 2.25 0 0 0-2.25-2.25h-1.5V5.25c0-1.084-.816-1.96-1.875-2.05a40.38 40.38 0 0 0-5.25 0C8.316 3.29 7.5 4.166 7.5 5.25v3H6a2.25 2.25 0 0 0-2.25 2.25c0 0 0 0 0 0v1.5c0 1.084.816 1.96 1.875 2.05.385.032.772.053 1.161.063.262.007.525.01.787.01h4.854c.262 0 .525-.003.787-.01a40.54 40.54 0 0 0 1.161-.063c1.059-.09 1.875-.966 1.875-2.05v-1.5Z" />',
            ];
        })->toArray();
    }
}
