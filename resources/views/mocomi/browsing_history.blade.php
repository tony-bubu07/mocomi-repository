<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 閲覧履歴</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/browsing_histry.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <h1 class="browsing_histry_title">閲覧履歴</h1>
        <div class="browsing_histry_wrap">
            <div class="browsing_histry_item_box">
                <a href="{{ route('comic_top') }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{asset('images/cover_sample.jpg')}}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">すなあらし（仮）</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">はりねずみ（仮）</h2>
                        </div>
                    </button>
                </a>
            </div>
            <div class="browsing_histry_item_box">
                <a href="{{ route('comic_top') }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{asset('images/cover_sample.jpg')}}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">すなあらし（仮）</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">はりねずみ（仮）</h2>
                        </div>
                    </button>
                </a>
            </div>
            <div class="browsing_histry_item_box">
                <a href="{{ route('comic_top') }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{asset('images/cover_sample.jpg')}}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">すなあらし（仮）</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">はりねずみ（仮）</h2>
                        </div>
                    </button>
                </a>
            </div>
            <div class="browsing_histry_item_box">
                <a href="{{ route('comic_top') }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{asset('images/cover_sample.jpg')}}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">すなあらし（仮）</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">はりねずみ（仮）</h2>
                        </div>
                    </button>
                </a>
            </div>
            <div class="browsing_histry_item_box">
                <a href="{{ route('comic_top') }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{asset('images/cover_sample.jpg')}}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">すなあらし（仮）</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">はりねずみ（仮）</h2>
                        </div>
                    </button>
                </a>
            </div>
            <div class="browsing_histry_item_box">
                <a href="{{ route('comic_top') }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{asset('images/cover_sample.jpg')}}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">すなあらし（仮）</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">はりねずみ（仮）</h2>
                        </div>
                    </button>
                </a>
            </div>
            
        </div>

    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>