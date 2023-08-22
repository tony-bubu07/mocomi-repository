<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 検索結果</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/search.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="searchResultWrap">
            <div class="numberIndication">
                <!-- 1-20のところは変更できるようにする -->
                <p>検索結果 1-6 件を表示</p>
            </div>
            <div class="searchResult">
                <ul>
                    @foreach($posts as $post)
                    <li>
                        <!-- 1件目 --> <!-- 最終的には同じものを20件分コピーする -->
                        <div class="comicWrap">
                            <!-- コミック表紙（仮）-->
                            <a href="{{ route('comic_top',['id' => $post->id]) }}" class="comic">
                                <!-- <img src="{{asset('images/cover_sample.jpg')}}"> -->
                                <img src="{{ asset( $post->cover_path ) }}">
                                <div class="comicInfo">
                                    <div class="title">
                                        <!-- コミックのタイトル（仮）-->
                                        <p>{{ $post->title }}</p>
                                    </div>
                                    <div class="author">
                                        <!-- コミックの作者 -->
                                        <p>{{ $post->author }}</p>
                                    </div>
                                    <div class="evaluation">
                                        <p><span class="star5_rating" data-rate="3.5"></span> 3.5</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>

        </div>

    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>