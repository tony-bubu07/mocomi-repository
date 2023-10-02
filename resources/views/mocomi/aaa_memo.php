<!-- 各ページを書くときに最初に記述すること -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/各ページに合わせて変える.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>

    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>

<!-- signupへのデータ挿入 -->
@foreach($data as $userData)

<li>{{ $userData->name }}</li>

@endforeach



@foreach($data as $userData)
<p class="user_name">{{ $userData->name }}</p>
@endforeach


@can('admin')
<table border="1">
    <tr>
        <th class="th">id</th>
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
        <td><img src="{{ asset( $book->cover_path ) }}"></td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
        <td>{{ $book->book_kinds_id }}</td>
        <td>{{ $book->created_at }}</td>
    </tr>
    @endforeach

</table>
@endcan


@can('admin')

<table border="1">
    <p>パスワードは暗号化されているため下記ような表記となります</p>
    <tr>
        <th class="th">ユーザーid</th>
        <th class="th">ユーザーネーム</th>
        <th class="th">ユーザーアドレス</th>
        <th class="th">ユーザーパスワード</th>
        <th class="th">ユーザー権限</th>
        <th class="th">ユーザーイメージ</th>
        <th class="th">本の評価ID</th>
        <th class="th">本のおきにいりID</th>
        <th class="th">本棚ID</th>
        <th class="th">カートID</th>
        <th class="th">アカウント作成日</th>
        <th class="th">アカウント更新日</th>
    </tr>


    @foreach($users_data as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->password }}</td>
        <td>{{ $user->rore }}</td>
        <td class="user_img"><img src="{{ asset( $user->image_path ) }}"></td>
        <td>{{ $user->favorite_id }}</td>
        <td>{{ $user->bookshelf_id }}</td>
        <td>{{ $user->purchase_history_id }}</td>
        <td>{{ $user->cart_id }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
    </tr>
    @endforeach

</table>
@endcan

{{ route('comic_top',['id' => $books_data->id]) }}

<li>
    <div class="comicWrap">
        <!-- コミック表紙（仮）-->
        <a href="{{ route('comic_top') }}" class="comic">
            <img src="{{asset('images/cover_sample.jpg')}}">

            <div class="comicInfo">
                <div class="title">
                    <!-- コミックのタイトル（仮）-->
                    <p>すなあらし（仮）</p>
                </div>
                <div class="author">
                    <!-- コミックの作者 -->
                    <p>はりねずみ（仮）</p>
                </div>
                <div class="evaluation">
                    <p><span class="star5_rating" data-rate="3.5"></span> 3.5</p>
                </div>
            </div>
        </a>
    </div>
</li>

<!-- Google API -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="クライアントIDを記述">


    <script>
        function onSignIn(googleUser) {
            var id_token = googleUser.getAuthResponse().id_token;
            $.ajax({
                type: "POST",
                url: "{{ route('register_google') }}", // 登録コントローラーのルート
                data: {
                    'token': id_token,
                },
                dataType: 'json',
            }).done(function(json) {
                var html = "";
                var key;
                for (key in json) {
                    html += "<p>" + key + " => " + json[key] + "</p>";
                }
                $("#data").html(html);
            });
        }
    </script>


( $likes->is_liked_by_auth_user() )