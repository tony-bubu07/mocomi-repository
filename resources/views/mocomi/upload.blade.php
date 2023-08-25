<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | アップロード</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/upload.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('js/upload.js') }}"></script>
</head>

<?php session_start(); ?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="upload_wrap">
            <h1 class="upload_wrap_title">アップロード</h1>
            <form action="{{ route('upload_confirmation') }}" method="POST" enctype="multipart/form-data" id="book_upload_form">
                @csrf
                <dl>
                    <div id="book_upload_form_main">
                        <div id="book_cover_wrap">
                            <!-- ブックカバー選択フォーム -->
                            <dt id="book_cover">
                                <label for="image">本の表紙画像を追加</label>
                            </dt>
                            <div id="book_cover">
                                <img src="" id="preview">
                            </div>
                            <p id="book_cover_norts">画像サイズは画面の構成上、2:3を推奨します</p>
                            <dd id="book_cover_input">
                                <input type="file" name="cover" id="cover" value="" onchange="previewFile(this);">
                                @if ($errors->has('cover'))
                                @foreach ($errors->get('cover') as $message)
                                <li style="color: red" id="image_erorr_message">{{ $message }}</li>
                                @endforeach
                                @endif
                            </dd>
                        </div>

                        <div id="account_edit_form_text">
                            <!--ブックタイトル入力フォーム-->
                            <dt id="book_title_titke"><!--説明する言葉-->
                                <label for="book_title">タイトル</label>
                            </dt>
                            <dd id="book_title_input"><!--定義文 or 説明文(dtの内容を説明している)-->
                                <input type="text" name="title" id="book_title" placeholder="本の題名を入力" value="{{ !empty(session('session_title')) ? session('session_title') : old('title') }}">
                                @if ($errors->has('title'))
                                @foreach ($errors->get('title') as $message)
                                <li style="color: red">{{ $message }}</li>
                                @endforeach
                                @endif
                            </dd>

                            <!--作者入力フォーム-->
                            <dt id="book_author_title">
                                <label for="book_author">作者</label>
                            </dt>
                            <dd id="book_author_input">
                                <input type="text" name="author" id="book_author" placeholder="本の作者を入力" value="{{ !empty(session('session_author')) ? session('session_author') : old('author') }}">
                                @if ($errors->has('author'))
                                @foreach ($errors->get('author') as $message)
                                <li style="color: red">{{ $message }}</li>
                                @endforeach
                                @endif
                            </dd>

                            <!--価格入力フォーム-->
                            <dt id="book_price_title">
                                <label for="book_price">価格<span id="price_notes">※半角数字のみ入力してください</span></label>
                            </dt>
                            <dd id="book_price_input">
                                <input type="text" name="price" id="book_price" placeholder="本の価格を入力" value="{{ !empty(session('session_price')) ? session('session_price') : old('price') }}">
                                @if ($errors->has('price'))
                                @foreach ($errors->get('price') as $message)
                                <li style="color: red">{{ $message }}</li>
                                @endforeach
                                @endif
                            </dd>

                            <!--分野別ID入力フォーム-->
                            <dt id="book_kind_id_title">
                                <label for="book_kinds_id">分野選択</label>
                            </dt>
                            <dd id="book_kind_id_input">
                                <select name="book_kind_id" id="book_kind_id">
                                    <option value="">分野を選択してください</option>
                                    <option value="1">少年/青年</option>
                                    <option value="2">少女/女性</option>
                                </select>
                                @if ($errors->has('book_kinds_id'))
                                @foreach ($errors->get('book_kinds_id') as $message)
                                <li style="color: red">{{ $message }}</li>
                                @endforeach
                                @endif
                            </dd>
                        </div>
                    </div>

                    <a href="{{ route('upload_confirmation') }}"><button type="submit" name="submit" id="confirmation_button">アップロード確認</button></a>
                </dl>
            </form>
        </div>
    </main>

    <!--booksデータベースに登録したデータを表示-->

    <!--borderの後の数字は表の枠の線の太さ-->
    @can('admin')
    <table border="1">
        <tr>
            <th class="th">本id</th>
            <th class="th">タイトル</th>
            <th class="th">表紙</th>
            <th class="th">作者</th>
            <th class="th">価格</th>
            <th class="th">分野</th>
            <th class="th">作成日</th>
        </tr>


        @foreach($books_data as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td class="cover_img"><img src="{{ asset( $book->cover_path ) }}"></td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->book_kinds_name }}</td>
            <td>{{ $book->created_at }}</td>
        </tr>
        @endforeach

    </table>
    @endcan

    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>