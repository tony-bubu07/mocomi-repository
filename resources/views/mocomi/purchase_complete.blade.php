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
    <link rel="stylesheet" href="{{asset('css/purchase_complete.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<?php
session_start();
// users_data配列を初期化
// $books_data = array();

// セッションから値を取得
if (session()) {
    $books['id'] = session('session_id');
    $books['cover_path'] = session('session_cover_path');
    $books['title'] = session('session_title');
    $books['author'] = session('session_author');
    $books['price'] = session('session_price');
}
?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
<main>
    <div class="purchase_complete_title">
        <h1>ご購入して頂きありがとうございます</h1>
    </div>
    <div class="transition_action">
        <a href="{{ route('top') }}" class="transition_top_button">
            <p>TOPページへ戻る</p>
        </a>
        <a href="{{ route('bookshelf', ['id' => Auth::user()->id]) }}" class="transition_bookshelf_button">
            <p>本棚へ移動</p>
        </a>
    </div>
    
</main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>