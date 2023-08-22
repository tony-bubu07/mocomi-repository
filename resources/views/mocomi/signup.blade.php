<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 会員登録</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/signup.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('l_s_header.blade.php')を読み込み -->
    @include('mocomi.headerSub')
    <main>
        <div class="registerWrap">
            <header class="registerHeader">
                <p>会員登録</p>
            </header>
            <div class="signupMenuList">
                <ul>
                    <li class="signup_email">
                        <p><i class="fa-solid fa-envelope"></i> メールアドレス</p>
                        <form action="{{ route('signupVal_create') }}" method="post" id="signup_email">
                            @csrf
                            <dl>
                                <dt class="name_form_dt">
                                    @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $messages)
                                    <h3 style="color: red">{{ $messages }}</h3>
                                    @endforeach
                                    @endif
                                </dt>
                                <dd class="name_form"><input type="text" name="name" id="name" placeholder="ユーザーネーム"></dd>

                                <dt>
                                    @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $messages)
                                    <h3 style="color: red">{{ $messages }}</h3>
                                    @endforeach
                                    @endif
                                </dt>
                                <dd class="email_form"><input type="email" name="email" id="email" placeholder="メールアドレス"></dd>

                                <dt>
                                    @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $messages)
                                    <h3 style="color: red">{{ $messages }}</h3>
                                    @endforeach
                                    @endif
                                </dt>
                                <dd class="password_form"><input type="text" name="password" id="password" placeholder="パスワード"></dd>
                                <dd class="signup_email_button"><button type="submit" name="id" value="使用者ID" class="signupButton">メールアドレスで登録</button></dd>
                            </dl>
                        </form>
                    </li>
                    <li class="signup_Twitter">
                        <p><i class="fa-brands fa-twitter"></i> Twitter</p>
                        <!-- API連携 後述 -->
                    </li>
                    <li class="signup_LINE">
                        <p><i class="fa-brands fa-line"></i> LINE</p>
                        <!-- API連携 後述 -->
                    </li>
                    <li class="signup_Apple">
                        <p><i class="fa-brands fa-apple"></i> Apple</p>
                        <!-- API連携 後述 -->
                    </li>
                    <li class="signup_Google">
                        <p><i class="fa-brands fa-google"></i> Google</p>
                        <!-- API連携 後述 -->
                    </li>
                </ul>
            </div>
        </div>
    </main>

</body>