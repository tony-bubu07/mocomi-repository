<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | アカウント編集確認</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/account_edit_confirmation.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('js/account_edit.js') }}"></script>

</head>

<?php
session_start();

// users_data配列を初期化
$users_data = array();

// セッションから値を取得
if (session()) {
    $users_data['image_path'] = session('session_image_path');
    $users_data['name'] = session('session_name');
    $users_data['email'] = session('session_email');
    $users_data['password'] = session('session_password');
    $users_data['id'] = session('id');
}
?>
<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="account_edit_wrap">
            <h1 class="account_edit_wrap_title">アカウント編集確認</h1>
            <form action="{{ route('account_edit_complete' ,  ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data" id="account_edit_confimation" name="account_edit_confirmation">
                @csrf
                <dl>
                    <!-- ユーザーアイコン選択フォーム -->
                    <dt id="image_title">
                        <label for="image">イメージ</label>
                    </dt>
                    <div id="user_icon">
                        <img src="{{ asset($users_data['image_path']) }}" id="preview">
                    </div>

                    <div id="account_edit_form_text">
                        <!--ユーザーネーム入力フォーム-->
                        <dt id="name_title"><!--説明する言葉-->
                            <label for="name">ユーザーネーム<span id="name_notes">※特殊文字は使わないでください</span></label>
                        </dt>
                        <dd id="name_input"><!--定義文 or 説明文(dtの内容を説明している)-->
                            {{ $users_data['name'] }}
                        </dd>

                        <!--メールアドレス入力フォーム-->
                        <dt id="email_title">
                            <label for="email">メールアドレス</label>
                        </dt>
                        <dd id="email_input">
                            {{ $users_data['email'] }}
                        </dd>

                        <!--パスワード入力フォーム-->
                        <dt id="password_title">
                            <label for="password">パスワード</label>
                        </dt>
                        <dd id="password_input">
                            {{ $users_data['password'] }}
                        </dd>
                    </div>
                    <div class="action_button">
                        <a href="{{ route('account_edit') }}" class="back_button">編集ページに戻る</a>
                        <a href="{{ route('account_edit_complete', ['id' => Auth::user()->id]) }}" class="complete_button">更新</a>
                    </div>
                </dl>
            </form>


        </div>
    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>