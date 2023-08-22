<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mocomi | レビュー</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/evaluation.css')}}">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- js読み込みタグ -->
    <script src="{{asset('/js/main.js') }}"></script>
</head>

<body>
    <!-- ヘッダーの外部ファイル('header.blade.php')を読み込み -->
    @include('mocomi.header')
    <main>
        <h1>レビュー</h1>
        <div class="evaluation_wrap">
            <div class="book_infomation">
                <div class="book_cover">
                    <img src="{{asset('images/cover_sample.jpg')}}">
                </div>
                <div class="book_title_author">
                    <div class="book_title">
                        <p>すなあらし（仮）</p>
                    </div>
                    <div class="book_author">
                        <p>はりねずみ（仮）</p>
                    </div>
                </div>
            </div>
            <form action="" method="post" id="comment" class="evaluation_form">
                <h2 class="evaluation_form_title">レビュー投稿</h2>
                <dl><!--説明リスト-->
                    <dd><!-- 星の評価入力フォーム -->
                        <div class="review_rate_form">
                            <input id="star5" type="radio" name="rate" value="5">
                            <label for="star5">★</label>
                            <input id="star4" type="radio" name="rate" value="4">
                            <label for="star4">★</label>
                            <input id="star3" type="radio" name="rate" value="3">
                            <label for="star3">★</label>
                            <input id="star2" type="radio" name="rate" value="2">
                            <label for="star2">★</label>
                            <input id="star1" type="radio" name="rate" value="1">
                            <label for="star1">★</label>
                        </div>
                        <a href="{{ route('comic_evaluation') }}" class="review_rating_comment"></a>
                    </dd>

                    <dd><!--コメント入力フォーム-->
                        <textarea class="evaluation_textarea" name="comment" id="comment" placeholder="感想を書き込む" value=""></textarea>
                    </dd>
                    <!-- JSで確認画面へ -->
                    <button type="submit" name="submit" id="submit" class="button_submit">投稿</button>
                </dl>

            </form>
        </div>
        <div class="all_review_wrap">
            <h2>みんなのレビューコメント</h2>
            <div class="star_rating">
                <p><span class="star5_rating" data-rate="3.5"></span> 3.5</p>
            </div>

            <table class="all_review" border="1">
                <tr>
                    <th class="individual_star_rating">
                        <span class="star5_rating" data-rate="4.0"></span>
                    </th>
                </tr>

                <tr>
                    <td class="individual_comment">個人のコメント表示</td>
                </tr>

            </table>

            <div class="back">
                <a href="{{ route('comic_top') }}" class="back_button">戻る</a>
            </div>


        </div>
    </main>
    <!-- フッターの外部ファイル('footer.blade.php')を読み込み -->
    @include('mocomi.footer')
</body>