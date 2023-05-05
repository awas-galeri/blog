<?php

namespace App\Http\Controllers;

use App\Mail\MailSend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function attemptLogin(Request $request)
    {
        $data = [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($data)) {
            User::where('email', $request->username)->first();
            return redirect('/dashboard');
        } else {
            Session::flash('error', 'Email atau Password salah!');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegist(Request $request)
    {
        $str = Str::random(50);
        $user = User::create([
            'email'      => $request->email,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
            'verify_key' => $str
        ]);

        $details = [
            'username' => $request->username,
            'website'  => 'Test Web',
            'datetime' => date('Y-m-d H:i:s'),
            'url'      => request()->getHttpHost() . '/register/verify/' . $str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Registrasi Berhasil. Silakan cek email Anda untuk verifikasi');
        return redirect('register');
    }

    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
            ->where('verify_key', $verify_key)
            ->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key);

            return view('auth.verify');
        } else {
            return "Keys tidak valid";
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
