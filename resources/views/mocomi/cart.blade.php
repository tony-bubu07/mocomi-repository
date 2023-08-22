<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | カート</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">

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

    <? var_dump($books_data) ?>
    <main>
        <div class="cart_wrap">
            <div class="cart">
                <div class="title">
                    <p>カート</p>
                </div>
                <ul class="cart_list">
                    <li>
                        <a href="{{ route('comic_top', ['id' => session('session_id')]) }}" class="book_item_box">
                            <div class="book_item">
                                <div class="book_cover">
                                    <img src="{{ asset( session('session_cover_path') ) }}">
                                </div>
                                <div class="book_information">
                                    <div class="book_title">
                                        <!-- コミックのタイトル（仮）-->
                                        <p>{{ session('session_title') }}</p>
                                    </div>
                                    <div class="book_author">
                                        <!-- コミックの作者 -->
                                        <p>{{ session('session_author') }}</p>
                                    </div>
                                    <div class="book_price">
                                        <!-- コミックの価格（仮）-->
                                        <p>{{ session('session_price') }}円（税込）</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="book_item_actions">
                            <div class="favorite_addition">
                                <p><a href="{{ route('favorite') }}">おきにいりに追加</a></p>
                            </div>
                            <div class="cart_delete">
                                <p>削除</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="total_price_box">
                <h1>1点の合計金額（税込）</h1>
                <div class="total_price">
                    <p>{{ session('session_price') }}円</p>
                </div>
            </div>
            <div class="purchase_action">
                <form action="{{ route('purchase') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ session('session_id') }}">
                    <input type="hidden" name="cover_path" value="{{ session('session_cover_path') }}">
                    <input type="hidden" name="title" value="{{ session('session_title')}}">
                    <input type="hidden" name="author" value="{{ session('session_author') }}">
                    <input type="hidden" name="price" value="{{ session('session_price') }}">
                    <a href="{{ route('purchase') }}" class="purchase_button">
                        <button type="submit" class="button">
                            <p>購入へ進む</p>
                        </button>
                    </a>
                </form>

            </div>
        </div>
    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>