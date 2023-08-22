<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | アカウント編集</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/account_edit.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('js/account_edit.js') }}"></script>
</head>

<?php session_start(); ?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="account_edit_wrap">
            <h1 class="account_edit_wrap_title">アカウント編集</h1>
            <form action="{{ route('account_edit_confirmation' ,  ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data" id="account_edit_form">
                @csrf
                <dl>
                    <!-- ユーザーアイコン選択フォーム -->
                    <dt id="image_title">
                        <label for="image">イメージを編集する</label>
                    </dt>

                    <dd id="image_input">
                        <div class="now_user_icon">
                            <p class="now_user_icon_txt">現在のイメージ</p>
                            @auth
                            <img src="{{ asset(Auth::user()->image_path) }}" alt="User Image">
                            @endauth
                        </div>
                        <div id="change_user_icon">
                            <div id="user_icon">
                                <p class="change_user_icon_txt">次のイメージ</p>
                                <img src="" id="preview">
                            </div>
                            <input type="file" name="image" id="image" value="" onchange="previewFile(this);">
                            @if ($errors->has('image'))
                            @foreach ($errors->get('image') as $message)
                            <li style="color: red" id="image_erorr_message">{{ $message }}</li>
                            @endforeach
                            @endif
                        </div>
                    </dd>

                    <div id="account_edit_form_text">
                        <!--ユーザーネーム入力フォーム-->
                        <dt id="name_title"><!--説明する言葉-->
                            <label for="name">ユーザーネーム<span id="name_notes">※特殊文字は使わないでください</span></label>
                        </dt>
                        <dd id="name_input"><!--定義文 or 説明文(dtの内容を説明している)-->
                            <input type="text" name="name" id="name" placeholder="" value="{{ !empty(session('session_name')) ? session('session_name') : (Auth::user()->name ? Auth::user()->name : old('name')) }}">
                            @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $message)
                            <li style="color: red">{{ $message }}</li>
                            @endforeach
                            @endif
                        </dd>

                        <!--メールアドレス入力フォーム-->
                        <dt id="email_title">
                            <label for="email">メールアドレス</label>
                        </dt>
                        <dd id="email_input">
                            <input type="email" name="email" id="email" placeholder="test@test.co.jp" value="{{ !empty(session('session_email')) ? session('session_email') : (Auth::user()->email ? Auth::user()->email : old('email')) }}">
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                            <li style="color: red">{{ $message }}</li>
                            @endforeach
                            @endif
                        </dd>

                        <!--パスワード入力フォーム-->
                        <dt id="password_title">
                            <label for="password">パスワード</label>
                        </dt>
                        <dd id="password_input">
                            <input type="password" name="password" id="password" placeholder="8文字以上20文字以内で入力してください" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                            <li style="color: red">{{ $message }}</li>
                            @endforeach
                            @endif
                        </dd>

                        <!--パスワード入力フォーム-->
                        <dt id="password_confirmation_title">
                            <label for="password-confirm">パスワード確認</label>
                        </dt>
                        <dd id="password_input">
                            <input type="password" name="password_confirmation" id="password-confirmation" placeholder="8文字以上20文字以内で入力してください" value="{{ old('password_confirmation') }}">
                            @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                            <li style="color: red">{{ $message }}</li>
                            @endforeach
                            @endif
                        </dd>
                    </div>

                    <a href="{{ route('account_edit_confirmation' ,  ['id' => Auth::user()->id]) }}"><button type="submit" name="submit" id="confirmation_button">確認</button></a>
                </dl>
            </form>
            <a href="{{ route('account_delete_confirmation' ,  ['id' => Auth::user()->id]) }}" class="delete_button">
                <p class="delete">このアカウントを削除する</p>
            </a>
        </div>
    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>