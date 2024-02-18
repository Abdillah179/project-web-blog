<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Routing\Route;
use Illuminate\Auth\Events\Registered;

class LoginRegistration extends Controller
{
    public function index()
    {
        return view("login_user", [
            "judul" => 'Halaman Login User',
        ]);
    }


    public function Registration()
    {
        return view("registration_user", [
            "judul" => 'Halaman Registrasi User',
        ]);
    }


    public function PostRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:9|max:255',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 0,
            'is_online' => 0,
            'image' => 'default.jpg'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }


    public function PostLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];


        $user = User::where('email', $request->input('email'))->first();

        if (Auth::attempt($credentials)) {

            $user->update([
                'is_online' => 1,
            ]);

            $request->session()->regenerate();

            return redirect()->intended('/Dashboard')->with('loginsukses', 'Selamat Datang');
        }

        return back()->with('gagal', 'Login Gagal !!');
    }


    public function logout(Request $request)
    {
        $user = User::where('id', auth()->user()->id);

        $user->update([
            'is_online' => 0,
        ]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function NotificationResetPassword()
    {
        return view('Halaman_Notification_Reset_Password', [
            'judul' => 'Reset Password',
        ]);
    }
}
