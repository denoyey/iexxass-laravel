<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceSettingUpdateRequest;
use App\Models\ServiceSetting;

class ServiceQuoteController extends Controller
{
    public function edit()
    {
        $setting = ServiceSetting::firstOrCreate(['id' => 1]);

        return view('pages.admin.services.quote.edit', compact('setting'));
    }

    public function update(ServiceSettingUpdateRequest $request)
    {
        $setting = ServiceSetting::firstOrCreate(['id' => 1]);

        $setting->update([
            'quote_title' => $request->input('quote_title'),
            'quote_subtitle' => $request->input('quote_subtitle'),
        ]);

        return redirect()->back()->with('success', 'Quote section updated successfully.');
    }
}
