<!-- Googleで開くときのURL
http://localhost/mocomi/public/ -->
<!-- main_color #e3e548 -->
<!-- main_color dark ver.: #323310 -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- top -->
    <link rel="stylesheet" href="{{asset('css/top.css')}}">
    <link rel="stylesheet" href="{{asset('css/men_comic_top.css')}}">
    <link rel="stylesheet" href="{{asset('css/women_comic_top.css')}}">

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
        <div class="advertisement_banner">
            <p>サイト内広告バナー</p>
        </div>
        <div class="total_ranking">
            <p>総合</p>
            <div class="total_ranking_main">
                <!-- 総合ランキング -->
                @foreach($books_data as $book)
                <div class="total_ranking_number_wrap">
                    <a href="{{ route('comic_top', ['id' => $book->id]) }}" class="total_ranking_number">
                        <button type="submit" name="id" value="本ID" class="cover">
                            <div class="total_ranking_number_top">
                                <!-- 色：金色 --><i class="fa-solid fa-crown" style="color: #ffd700"></i>
                                <!-- 色：銀色 <i class="fa-solid fa-crown" style="color: #c0c0c0"></i> -->
                                <!-- 色：銅色 <i class="fa-solid fa-crown" style="color: #b87333"></i> -->
                                <!-- コミック表紙（仮） -->
                                <img src="{{ asset( $book->cover_path ) }}">
                            </div>
                            <div class="total_ranking_number_under">
                                <!-- コミックのタイトル（仮） -->
                                <h1>{{ $book->title }}</h1></br>
                                <!-- コミックの作者 -->
                                <h2>{{ $book->author }}</h2>
                            </div>
                        </button>
                    </a>
                    <!-- <a href="{{ route('comic_browse',['id' => $book->id] ) }}" class="readWrap">
                        <button type="submit" name="id" value="本ID" class="read">
                            <h1>読む</h1>
                        </button>
                    </a> -->
                </div>
                @endforeach
            </div>
        </div>
        <div class="men_ranking">
            <p class="men_ranking_title">少年/青年</p>
            <p class="men_ranking_continuation"><a href="{{ route('men') }}"><i class="fa-solid fa-caret-right"></i> 続きはこちら</a></p>
            
            <div class="men_ranking_main">
                <!-- 少年/青年ランキング -->
                @foreach($men_books_data as $book)
                <div class="men_ranking_number_wrap">
                    <a href="{{ route('comic_top', ['id' => $book->id]) }}" class="men_ranking_number">
                        <button type="submit" name="id" value="本ID" class="cover">
                            <div class="men_ranking_number_top">
                                <!-- 色：金色 --><i class="fa-solid fa-crown" style="color: #ffd700"></i>
                                <!-- 色：銀色 <i class="fa-solid fa-crown" style="color: #c0c0c0"></i> -->
                                <!-- 色：銅色 <i class="fa-solid fa-crown" style="color: #b87333"></i> -->
                                <!-- コミック表紙（仮）-->
                                <img src="{{ asset( $book->cover_path ) }}">
                            </div>
                            <div class="men_ranking_number_under">
                                <!-- コミックのタイトル（仮）-->
                                <h1>{{ $book->title }}</h1></br>
                                <!-- コミックの作者 -->
                                <h2>{{ $book->author }}</h2>
                            </div>
                        </button>
                    </a>
                    <!-- <a href="{{ route('comic_browse',['id' => $book->id] ) }}" class="men_readWrap">
                        <button type="submit" name="id" value="本ID" class="men_read">
                            <h1>読む</h1>
                        </button>
                    </a> -->
                </div>
                @endforeach
            </div>
        </div>
        <div class="women_ranking">
            <p class="women_ranking_title">少女/女性</p>
            <p class="women_ranking_continuation"><a href="{{ route('women') }}"><i class="fa-solid fa-caret-right"></i> 続きはこちら</a></p>

            <div class="women_ranking_main">
                <!-- 少女/女性ランキング -->
                @foreach($women_books_data as $book)
                <div class="women_ranking_number_wrap">
                    <a href="{{ route('comic_top', ['id' => $book->id]) }}" class="women_ranking_number">
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
                    <!-- <a href="{{ route('comic_browse', ['id' => $book->id] ) }}" class="women_readWrap">
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