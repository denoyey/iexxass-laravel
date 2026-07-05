<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\ServiceSetting;

class HalamanController extends Controller
{
    public function dashboard()
    {
        $aboutUs = AboutUs::first();
        $serviceSetting = ServiceSetting::first();
        $services = Service::orderBy('order_column')->get();

        return view('pages.public.home.index', [
            'title' => 'I\'Exxass | ICT Solutions, Web Development & IT Consultancy',
            'aboutUs' => $aboutUs,
            'serviceSetting' => $serviceSetting,
            'services' => $services,
        ]);
    }
}
