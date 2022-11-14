<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{


    //Hiển Thị Đăng Nhập
    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.home');
        } else {
            return view('auth.login');
        }
    }

    //xử lí đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // dd($request->all());

            $request->session()->regenerate();

            return redirect()->route('dashboard.home');
        }
        $error = [
            'message' => 'error',
        ];
        return back()->with($error);
        // ->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }

    //Hiển Thị Đăng Ký
    public function viewRegister()
    {
        return view('auth.register');
    }
    //xử lí đăng ký
    public function register(UserRequet $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        try {
            $user->save();
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error("message:" . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
