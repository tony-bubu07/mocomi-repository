<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | マイページ</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/mypage.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<?php session_start() ?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <ul class="mypage_header">
            <a href="{{ route('mypage') }}" class="upside">
                <li class="transition_mypage">
                    <h1 class="transition">マイページトップ</h1>
                </li>
            </a>
            <a href="{{ route('bookshelf') }}" class="upside">
                <li class="transition_bookshelf">
                    <h1 class="transition">本棚</h1>
                </li>
            </a>
            <a href="{{ route('favorite') }}" class="upside">
                <li class="transition_favorite">
                    <h1 class="transition">おきにいり一覧</h1>
                </li>
            </a>
            <a href="{{ route('account_edit', ['id' => Auth::user()->id]) }}" class="beneath">
                <li class="transition_account_edit">
                    <h1 class="transition">アカウント編集</h1>
                </li>
            </a>
            <a href="{{ route('purchase_history') }}" class="beneath">
                <li class="transition_purchase_history">
                    <h1 class="transition">購入履歴</h1>
                </li>
            </a>
            <a href="{{ route('browsing_history') }}" class="beneath">
                <li class="transition_browsing_history">
                    <h1 class="transition">閲覧履歴</h1>
                </li>
            </a>
            @can('admin')
            <a href="{{ route('upload') }}" class="transition_apload_wrap">
                <li class="transition_apload">
                    <h1 class="apload">アップロード専用ページ</h1>
                </li>
            </a>
            @elsecan('post-user')
            <a href="{{ route('upload') }}" class="transition_apload_wrap">
                <li class="transition_apload">
                    <h1 class="apload">アップロード専用ページ</h1>
                </li>
            </a>
            @endcan
        </ul>
        <div class="mypage_wrap">
            <h1 class="mypage_title">マイページ</h1>
            <div class="user_infomation">
                <div class="user_icon">
                    @auth
                    <img src="{{ asset(Auth::user()->image_path) }}" alt="User Image">
                    @endauth
                </div>
                <div class="user_name_wrap">
                    <h1 class="user_name_title">ユーザーネーム</h1>
                    @auth
                    <p class="user_name">{{ Auth::user()->name }}</p>
                    @endauth
                </div>
            </div>
        </div>
    </main>

    <!--booksデータベースに登録したデータを表示-->

    <!--borderの後の数字は表の枠の線の太さ-->
    @can('admin')

    <table border="1">
        <p class="table_title">登録済みユーザー一覧</p>
        <div class="norts_comment_wrap">
            <p class="norts_comment1">※パスワードは暗号化されているため下記ような表記となります</p>
            <p class="norts_comment2">ユーザー権限 0 : 一般ユーザー | 1 : 投稿ユーザー | 2 : 管理者</p>
        </div>
        <tr>
            <th class="th">ユーザーid</th>
            <th class="th">ユーザーネーム</th>
            <th class="th">ユーザーアドレス</th>
            <th class="th">ユーザーパスワード</th>
            <th class="th">ユーザー権限</th>
            <th class="th">ユーザーイメージ</th>
            <!-- <th class="th">本の評価ID</th>
            <th class="th">本のおきにいりID</th>
            <th class="th">本棚ID</th>
            <th class="th">カートID</th> -->
            <th class="th">アカウント作成日</th>
            <th class="th">アカウント更新日</th>
        </tr>


        @foreach($users_data as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->role }}</td>
            <td class="user_img"><img src="{{ asset( $user->image_path ) }}"></td>
            <!-- <td>{{ $user->favorite_id }}</td>
            <td>{{ $user->bookshelf_id }}</td>
            <td>{{ $user->purchase_history_id }}</td>
            <td>{{ $user->cart_id }}</td> -->
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
        @endforeach

    </table>
    @endcan

    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>