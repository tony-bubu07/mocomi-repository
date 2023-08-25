<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | アップロード確認</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/upload_confirmation.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('js/upload.js') }}"></script>
</head>

<?php
session_start();

// users_data配列を初期化
$books_data = array();

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
        <div class="upload_wrap">
            <h1 class="upload_wrap_title">アップロード確認</h1>
            <form action="{{ route('upload_complete') }}" method="POST" enctype="multipart/form-data" id="upload_form">
                @csrf
                <dl>
                    <div id="upload_form_main">
                        <div id="book_cover_wrap">
                            <!-- ブックカバー選択フォーム -->
                            <dt id="book_cover">
                                <label for="image">本の表紙画像</label>
                            </dt>
                            <div id="book_cover">
                                <img src="{{ asset($books_data['cover_path']) }}" id="preview">
                            </div>
                        </div>

                        <div id="account_edit_form_text">
                            <!--ブックタイトル入力フォーム-->
                            <dt id="book_title_titke"><!--説明する言葉-->
                                <label for="book_title">タイトル</label>
                            </dt>
                            <dd id="book_title_input"><!--定義文 or 説明文(dtの内容を説明している)-->
                                {{ $books_data['title'] }}
                            </dd>

                            <!--作者入力フォーム-->
                            <dt id="book_author_title">
                                <label for="book_author">作者</label>
                            </dt>
                            <dd id="book_author_input">
                                {{ $books_data['author'] }}
                            </dd>

                            <!--価格入力フォーム-->
                            <dt id="book_price_title">
                                <label for="book_price">価格<span id="price_notes">※数字のみ入力してください</span></label>
                            </dt>
                            <dd id="book_price_input">
                                {{ $books_data['price'] }}
                            </dd>

                            <!--分野別ID入力フォーム-->
                            <dt id="book_kind_id_title">
                                <label for="book_kind_id">分野選択<span id="book_kind_id_notes">1 : 少女/女性 | 2: 少年/青年 </span></label>
                            </dt>
                            <dd id="book_kind_id_input">
                                <select disabled id="book_kind_id_input_select">
                                    <option value="">分野を選択してください</option>
                                    <option value="1" {{ $books_data['book_kind_id'] === '1' ? 'selected' : '' }}>少年/青年</option>
                                    <option value="2" {{ $books_data['book_kind_id'] === '2' ? 'selected' : '' }}>少女/女性</option>
                                </select>
                            </dd>
                        </div>
                    </div>
                    <div class="action_button">
                        <a href="{{ route('upload') }}" class="back_button">アップロードページに戻る</a>
                        <a href="{{ route('upload_complete') }}" class="complete_button">アップロード確定</a>
                    </div>
                </dl>
            </form>
        </div>
    </main>

    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>