<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | アカウント削除確認</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/account_delete_confirmation.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <!-- <script src="{{asset('js/account_edit.js') }}"></script> -->
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="account_edit_wrap">
            <h1 class="account_edit_wrap_title">アカウント削除確認</h1>
            <h2 class="account_edit_notes">本当にこのアカウントを削除してよろしいですか？</h2>
            <form action="{{ route('account_edit_confirmation' ,  ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data" id="account_edit_form">
                <dl>
                    <!-- ユーザーアイコン選択フォーム -->
                    <div class="now_user_icon">
                        <p class="now_user_icon_txt">現在のイメージ</p>
                        @auth
                        <img src="{{ asset(Auth::user()->image_path) }}" alt="User Image">
                        @endauth
                    </div>

                    <div id="account_edit_form_text">
                        <!--ユーザーネーム入力フォーム-->
                        <dt id="name_title"><!--説明する言葉-->
                            <label for="name">ユーザーネーム<span id="name_notes">※特殊文字は使わないでください</span></label>
                        </dt>
                        <dd id="name_input"><!--定義文 or 説明文(dtの内容を説明している)-->
                        <input type="text" name="name" id="name" placeholder="" value="{{ !empty(Auth::user()->name) ? Auth::user()->name : old('name') }}">
                        </dd>

                        <!--メールアドレス入力フォーム-->
                        <dt id="email_title">
                            <label for="email">メールアドレス</label>
                        </dt>
                        <dd id="email_input">
                        <input type="email" name="email" id="email" placeholder="test@test.co.jp" value="{{ !empty(Auth::user()->email) ? Auth::user()->email : old('email') }}">
                        </dd>
                    </div>
                    <div class="action_button">
                        <a href="{{ route('account_edit' ,  ['id' => Auth::user()->id]) }}" class="back_button">編集ページに戻る</a>
                        <a href="{{ route('account_delete_complete' , ['id' => Auth::user()->id]) }}" class="complete_button">削除</a>
                    </div>
                </dl>
            </form>


        </div>
    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>