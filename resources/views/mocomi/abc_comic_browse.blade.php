<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi</title>

    <!-- css読み込みタグ -->
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/browse.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->

</head>

<body>
    <div class="browse_header">
        <div class="browse_header_main">
            <div class="title">
                <p>すなあらし（仮）</p>
            </div>
            <div class="browse_close">
                <i class="fa-solid fa-square-xmark"></i>
                <p>閉じる</p>
            </div>
        </div>
    </div>
    <main>
        <div class="comic_page">
            <img src="{{asset('images/2.png')}}">
            <img src="{{asset('images/1.png')}}">
        </div>
        <div class="pagination">
            <div class="go_previous_page">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="go_back_page">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>

    </main>
</body>