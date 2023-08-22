<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidatesController extends Controller
{
    /**
     * お問い合わせをバリデーションする
     * 
     * @return 
     */
    public function signupVal(Request $request)
    {
        // $data = $request->all();

        $rules = [
            'name' => 'required | max:10',
            'email' => 'required | email',
            'password' => 'required| regex:/^[0-9a-zA-Z]*$/ | max:20',
        ];

        $messages = [
            "required" => "これは必須項目です",
            "name.max" => "10文字以内で入力してください",
            "email.email" => "正しく入力してください",
            "password.max" => "20文字以内で入力してください",
            "password.regex" => "半角英数字で入力してください"
        ];

        $request->session()->put('session_name', $request['name']);
        $request->session()->put('session_email', $request['email']);
        $request->session()->put('session_password', $request['password']);

        $this->validate($request, $rules, $messages);

        $data = $request->all();
        return view('mocomi.signup')->with('data', $data);
    }
}
