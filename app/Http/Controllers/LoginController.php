<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * 認証の試行を処理
     */
    public function login_email(Request $request)
    {
        $user_info = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ログインに成功したとき
        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();
            
            return redirect()->route('top');
        }

        // 上記のif文でログインに成功した人以外(=ログインに失敗した人)がここに来る
        return redirect()->back();
        
    }
}
