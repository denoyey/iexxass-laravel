<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceSettingUpdateRequest;
use App\Models\ServiceSetting;

class ServiceHeaderController extends Controller
{
    public function index()
    {
        $setting = ServiceSetting::firstOrCreate(['id' => 1]);

        return view('pages.admin.services.header.index', compact('setting'));
    }

    public function edit($id)
    {
        $setting = ServiceSetting::findOrFail($id);

        return view('pages.admin.services.header.edit', compact('setting'));
    }

    public function update(ServiceSettingUpdateRequest $request, $id)
    {
        $setting = ServiceSetting::findOrFail($id);

        $setting->update([
            'subtitle' => $request->input('subtitle'),
            'title' => $request->input('title'),
        ]);

        return redirect()->route('admin.services.header.index')->with('success', 'Header section updated successfully.');
    }
}
