<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function edit(Setting $setting)
    {
        return view('dashboard.settings.edit' , ['title' => trans('dashboard.edit_record') , 'setting' => $setting]);
    }

    public function update(Request $request, Setting $setting)
    {
        $data = $this->validate(request() , [] , [] , []);
        $setting->update($data);
        session()->flash('success' , trans('dashboard.record_updated'));
        return redirect()->route('settings.edit');

    }

}
