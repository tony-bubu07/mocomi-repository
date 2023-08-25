<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | 本棚</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/bookshelf.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <h1 class="bookshelf_title">本棚</h1>
        <div class="bookshelf_wrap">
            @foreach($book as $item)
            <div class="bookshelf_item_box">
                <!-- ['id' => $book->id] -->
                <a href="{{ route('comic_top',['id' => $item->id] ) }}" class="book_item">
                    <button type="submit" name="id" value="本ID" class="book_cover">
                        <div class="book_cover_img">
                            <!-- コミック表紙（仮） -->
                            <img src="{{ asset( $item->cover_path ) }}">
                        </div>
                        <div class="book_item_infomation">
                            <!-- コミックのタイトル（仮） -->
                            <h1 class="book_title">{{ $item->title }}</h1></br>
                            <!-- コミックの作者 -->
                            <p class="book_author">{{ $item->author }}</h2>
                        </div>
                    </button>
                </a>
                <a href="{{ route('comic_browse',['id' => $item->id]) }}" class="readWrap">
                    <button type="submit" name="id" value="本ID" class="read">
                        <h1 class="read_text">読む</h1>
                    </button>
                </a>
            </div>
            @endforeach
            
        </div>

    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>