<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 表示するコミックごとにtitleを変更できるようにする -->
    <title>Mocomi | {{ $books->title }}</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/comic_top.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- いいね実装 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- js読み込みタグ -->
    <script src="{{asset('/js/like.js') }}"></script>
    <script>
        var likeUrl = "{{ route('like') }}";
    </script>
</head>

<?php session_start() ?>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <div class="bookTopWrap">
            <div class="bookTop">

                <div class="title">
                    <!-- コミックのタイトル（仮）-->
                    <p>{{ $books->title }}</p>
                </div>
                <div class="book_information">
                    <!-- コミック表紙（仮）-->
                    <div class="book_cover">
                        <img src="{{ asset( $books->cover_path ) }}">
                    </div>
                    <div class="author_price_evaluation_like">
                        <div class="author">
                            <!-- コミックの作者 -->
                            <p>{{ $books->author }}</p>
                        </div>
                        <div class="price_evaluation">
                            <div class="price">
                                <!-- コミックの価格（仮）-->
                                <p>{{ $books->price }} 円（税込）</p>
                            </div>
                            <div class="evaluation">
                                <p><span class="star5_rating" data-rate="3.5"></span> 3.5</p>
                                <a href="{{ route('comic_evaluation') }}" class="review_count"> 240</a>
                            </div>
                        </div>
                        <div class="likesWrap">
                            <!-- いいね実装 -->
                            <!-- 参考：$booksにはMocomiControllerから本のレコード$booksをforeachで展開 -->
                            @auth
                            <!-- Book.phpに作ったisLikedByメソッドをここで使用 -->
                            @if (!$books->isLikedBy(Auth::user()))
                            <span class="likes">
                                <p class="likesSentence">いいね</p>
                                <i class="fa-solid fa-thumbs-up  like-toggle" data-book-id="{{ $books->id }}"></i>
                                <span class="like-counter">{{ $likeCount }}</span>
                            </span><!-- /.likes -->
                            @else
                            <span class="likes">
                                <p class="likesSentence">いいね</p>
                                <i class="fa-solid fa-thumbs-up heart like-toggle liked" data-book-id="{{ $books->id }}"></i>
                                <span class="like-counter">{{ $likeCount }}</span>
                            </span><!-- /.likes -->
                            @endif
                            @endauth
                            @guest
                            <span class="likes">
                                <p class="likesSentence">いいね</p>
                                <i class="a-solid fa-thumbs-up heart"></i>
                                <span class="like-counter">{{ $likeCount }}</span>
                            </span><!-- /.likes -->
                            @endguest
                        </div>
                        <!-- <div class="read">
                            <a href="{{ route('comic_browse', ['id' => $books->id]) }}" class="comicRead">
                                <p>読む</p>
                            </a>
                        </div> -->
                    </div>
                </div>
                <div class="beneath">
                    <form action="{{ route('cart') }}" method="post" class="button_wrap">
                        @csrf
                        <input type="hidden" name="id" value="{{ $books->id }}">
                        <input type="hidden" name="cover_path" value="{{ $books->cover_path }}">
                        <input type="hidden" name="title" value="{{ $books->title }}">
                        <input type="hidden" name="author" value="{{ $books->author }}">
                        <input type="hidden" name="price" value="{{ $books->price }}">
                        <a href="{{ route('cart') }}">
                            <button type="submit" class="cart_button">
                                <div class="cart">
                                    <i class="fa-solid fa-cart-shopping fa-flip-horizontal" style="color:#323310"></i>
                                    <p>カートに入れる</p>
                                </div>
                            </button>
                        </a>
                    </form>

                    <div class="favorite">
                        <i class="fa-solid fa-star" style="color:#323310"></i>
                        <p>お気に入りに追加</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="contents_series">
            <h1>同シリーズ</h1>
            <ul class="contents_series_list">
                <!-- リスト1件目 見本 -->
                <li class="contents_series_list_item">
                    <a href="" class="list_item_content">
                        <div class="item_cover">
                            <img src="{{asset('images/cover_sample.png')}}" alt="" class="lagy_img">
                        </div>
                        <p class="book_item_title">すなあらし（仮）</p>
                    </a>
                    <div class="book_item_action">
                        <div class="icon-btn-wrapper">
                            <button type="button" class="icon-btn" id="本ID">
                                <i class="fa-solid fa-cart-shopping fa-flip-horizontal" style="color:#323310"></i>
                            </button>
                        </div>
                    </div>

                </li>
            </ul>

        </div>
    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>