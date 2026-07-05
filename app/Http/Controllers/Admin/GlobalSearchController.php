<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\GlobalSearch\Providers\ContentSearchProvider;
use App\Services\Admin\GlobalSearch\Providers\RoleSearchProvider;
use App\Services\Admin\GlobalSearch\Providers\UserSearchProvider;
use Illuminate\Http\Request;

class GlobalSearchController extends Controller
{
    /**
     * Daftarkan semua provider pencarian di sini.
     * Jika ada tabel/modul baru, cukup tambahkan class Provider-nya ke array ini.
     */
    protected array $providers = [
        UserSearchProvider::class,
        RoleSearchProvider::class,
        ContentSearchProvider::class,
    ];

    public function search(Request $request)
    {
        $request->validate(['query' => 'required|string|max:100']);
        $query = $request->input('query');

        if (empty($query)) {
            return response()->json([]);
        }

        $results = [];

        foreach ($this->providers as $providerClass) {
            $provider = app($providerClass);
            $providerResults = $provider->search($query, 3);

            $results = array_merge($results, $providerResults);
        }

        return response()->json($results);
    }
}
