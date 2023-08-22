<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // ユーザーが存在しない場合、新規ユーザーを登録
        $existingUser = User::where('email', $user->getEmail())->first();
        if (!$existingUser) {
            User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getEmail()),
            ]);
        }
        // ユーザーログインなどの処理を行う

        // 既存ユーザーを取得
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        }

        // ログイン後のリダイレクトなどの処理を行う
        return redirect('/');
    }

    // ログアウト処理
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
