<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 投稿コミック削除完了</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/book_delete_complete.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <!-- <script src="{{asset('js/account_edit.js') }}"></script> -->
</head>

<!--sessionで引き継いできたデータを使う-->
<?php
session_start();
?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>

        <div class="complete_wrap">
            <div class="title">
                <h1 class="title_text">投稿コミック情報 削除完了</h1>
            </div>
            <div class="message">
                <p class="message_text">投稿していただいたコミックの削除が完了いたしました</p>
            </div>
            <div class="button">
                <a href="{{ route('upload') }}" class="go_uplpad_button">アップロードページへ</a>
                <a href="{{ route('top') }}" class="go_top_button">トップページへ</a>
            </div>

        </div>


    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>