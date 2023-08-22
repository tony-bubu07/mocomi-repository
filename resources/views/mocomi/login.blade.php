<!DOCTYPE html>
<html lang="ja">

<?php session_start()?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | ログイン</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('l_s_header.blade.php')を読み込み -->
    @include('mocomi.headerSub')
    <main>
        <div class="accWrap">
            <header class="accheader">
                <p>ログイン</p>
            </header>
            <div class="loginMenuList">
                <ul>
                    <li class="login_email">
                        <p><i class="fa-solid fa-envelope"></i> メールアドレス</p>
                        <form action="{{ route('login_email') }}" method="post" id="login_email">
                        @csrf
                            <dl>
                                <dd><input type="email" name="email" id="email" placeholder="メールアドレス"></dd>
                                <dd><input type="text" name="password" id="password" placeholder="パスワード"></dd>
                                <dd><button type="submit" name="id" value="使用者ID" class="loginButton">ログイン</button></dd>
                            </dl>
                        </form>
                    </li>
                    <li class="login_Twitter">
                        <p><i class="fa-brands fa-twitter"></i> Twitter</p>
                        <!-- API連携 後述 -->
                    </li>
                    <li class="login_LINE">
                        <p><i class="fa-brands fa-line"></i> LINE</p>
                        <!-- API連携 後述 -->
                    </li>
                    <li class="login_Apple">
                        <p><i class="fa-brands fa-apple"></i> Apple</p>
                        <!-- API連携 後述 -->
                    </li>
                    <li class="login_Google">
                        <p><i class="fa-brands fa-google"></i> Google</p>
                        <!-- API連携 後述 -->
                    </li>
                </ul>
            </div>
            <div class="go_signup">
                <p>アカウントをお持ちでない方は</p>
                <a href="{{ route('signup') }}">
                    <li class="singup">
                        <h1>かんたん無料登録</h1>
                    </li>
                </a>
            </div>

        </div>
        
    </main>


</body>