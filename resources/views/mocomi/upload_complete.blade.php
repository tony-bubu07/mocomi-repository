<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 購入完了</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/upload_complete.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<?php
session_start();

// セッションから値を取得
if (session()) {
    $books_data['id'] = session('id');
    $books_data['cover_path'] = session('session_cover_path');
    $books_data['title'] = session('session_title');
    $books_data['author'] = session('session_author');
    $books_data['price'] = session('session_price');
    $books_data['book_kind_id'] = session('session_book_kind_id');
    $books_data['book_evaluation_id'] = session('session_book_evaluation_id');
}
?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
<main>
    <div class="upload_comlete_title">
        <h1>アップロードが完了しました</h1>
    </div>
    <div class="transition_action">
        <a href="{{ route('top') }}" class="transition_top_button">
            <p>TOPページへ戻る</p>
        </a>
        <a href="{{ route('upload') }}" class="transition_bookshelf_button">
            <p>続けてアップロード</p>
        </a>
    </div>
    
</main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>