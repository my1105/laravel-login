<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'password.required' => 'パスワードを入力してください',
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'login' => 'メールアドレスまたはパスワードが正しくありません',
            ]);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }


}
