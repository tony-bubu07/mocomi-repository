<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | アカウント編集完了</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/account_edit_complete.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <!-- <script src="{{asset('js/account_edit.js') }}"></script> -->
</head>

<!--sessionで引き継いできたデータを使う-->
<?php
session_start();

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

        <div class="complete_wrap">
            <div class="title">
                <h1 class="title_text">アカウント情報 更新完了</h1>
            </div>
            <div class="message">
                <p class="message_text">アカウント情報の更新が完了いたしました</p>
                <p class="message_text2"></p>
            </div>
            <div class="button">
                <a href="{{ route('mypage') }}" class="go_account_button">マイページへ</a>
            </div>

        </div>


    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>