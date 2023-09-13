<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 少女/女性</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- women_comic_top -->
    <link rel="stylesheet" href="{{asset('css/women_comic_top.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="advertisement_banner">
            <p>サイト内広告バナー</p>
        </div>
        <div class="women_ranking">
            <p class="women_ranking_title">少女/女性</p>
            <div class="women_ranking_main">
                <!-- 少女/女性ランキング -->
                @foreach($women_books_data as $book)
                <div class="women_ranking_number_wrap">
                    <a href="{{ route('comic_top',['id' => $book->id]) }}" class="women_ranking_number">
                        <button type="submit" name="id" value="本ID" class="cover">
                            <div class="women_ranking_number_top">
                                <!-- 色：金色 --><i class="fa-solid fa-crown" style="color: #ffd700"></i>
                                <!-- 色：銀色 <i class="fa-solid fa-crown" style="color: #c0c0c0"></i> -->
                                <!-- 色：銅色 <i class="fa-solid fa-crown" style="color: #b87333"></i> -->
                                <!-- コミック表紙（仮）-->
                                <img src="{{ asset( $book->cover_path ) }}">
                            </div>
                            <div class="women_ranking_number_under">
                                <!-- コミックのタイトル（仮）-->
                                <h1>{{ $book->title }}</h1></br>
                                <!-- コミックの作者 -->
                                <h2>{{ $book->author }}</h2>
                            </div>
                        </button>
                    </a>
                    <!-- <a href="{{ route('comic_browse',['id' => $book->id]) }}" class="women_readWrap">
                        <button type="submit" name="id" value="本ID" class="women_read">
                            <h1>読む</h1>
                        </button>
                    </a> -->
                </div>
                @endforeach

            </div>
        </div>
    </main>

    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')

</body>