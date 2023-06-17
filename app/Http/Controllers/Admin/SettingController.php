<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Traits\ImageUpload;

class SettingController extends Controller
{
    use ImageUpload;
    public function index()
    {
        return view('Admin.Pages.Settings.index');
    }

    public function edit(Setting $setting)
    {
        return view('Admin.pages.Settings.edit',compact('setting'));
    }

    public function update(SettingUpdateRequest $request ,Setting $setting)
    {
        $setting->update([
            'value'=>$request->value
        ]);
        toast('Setting Updated Successfully','success');
        return redirect()->back();
    }
}
