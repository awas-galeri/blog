<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        return view('profile.index', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request);
        if ($request->id) {
            $user     = User::where('id', $request->id)->first();
        } else {
            $user               = new User();
            $user->user_id      = Auth::id();
            // $user->created_at   = Carbon::now();
        }
        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->sapaan       = $request->sapaan;
        $user->panggilan    = $request->panggilan;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->tgl_lahir    = $request->tgl_lahir;
        $user->provinsi     = $request->provinsi;
        $user->kota         = $request->kota;
        $user->kecamatan    = $request->kecamatan;
        $user->desa         = $request->desa;
        $user->updated_at   = Carbon::now();
        $user->save();
        return redirect('profile')->with('success', 'Data berhasil disimpan.');
    }
}
