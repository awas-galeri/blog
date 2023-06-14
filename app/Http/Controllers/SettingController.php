<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('setting.index');
    }

    public function store(Request $request, $id = null) {
        $setting = $id ? Setting::findOrFail($id) : new Setting();
        $setting->navbar_color = $request->navbar_color;
        $setting->navbar_font = $request->navbar_font;
        $setting->sidebar_font = $request->sidebar_font;
        $setting->sidebar_active = $request->sidebar_active;
        $setting->updated_at = Carbon::now();

        if (!$id) {
            $setting->created_at = Carbon::now();
        }

        // Simpan data ke database
        $setting->save();

        $message = $id ? 'Setting berhasil diperbarui.' : 'Setting berhasil disimpan.';
        return redirect()->back()->with('success', $message);
    }
}
