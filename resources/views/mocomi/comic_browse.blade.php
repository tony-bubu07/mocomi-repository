<!DOCTYPE html>
<html lang="ja">

<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <title>{{ $books->title }}</title>

    <!-- css読み込みタグ -->
    <!-- parts (ヘッダー、フッター) -->
    <link rel="stylesheet" href="{{asset('css/parts.css')}}">
    <!-- 各ページに合わせて変える -->
    <link rel="stylesheet" href="{{asset('css/aaa_free.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/1c70550d95.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- js読み込みタグ -->
    <script src="{{asset('js/book.js') }}"></script>
    <script>
        /** 入力ここから **/
        var page = 4; //ページ数
        var imgtype = "png"; //画像の拡張子
        var title = "{{ $books->title }}"; //タイトル名
        var site = "{{ route('top') }}"; //サイトのURL
        var copy = "{{ $books->author }}"; //作者名
        var display = 1; //左ページ始まりは「0」、右ページ始まりは「1」
        /* *ここまで **/

        $(function() {
            $("title,h1").text(title);
            $(".o_button").attr("onClick", "location.href='" + site + "'");
            $(".copy").text(copy);
            for (var i = 1; i <= page; i++) {
                $('#last_page').before('<div class="c_i"><div><img data-lazy="' + i + '.' + imgtype + '"></div></div>');
            }

            /**長すぎるからh1の方のタイトル改行したいって時var/コメントアウト解除して編集**/
            //$("h1").html("サンプル<br>サンプル");

        });
    </script>
</head>

<body>
    <!--漫画表示ゾーンここから-->
    <div class="slider" dir="rtl">
        <div id="first_page"></div>
        <div id="last_page">
            <div class="last_page_in" dir="ltr">
                <div>
                    <!--最終ページフリー追加ゾーンここから-->
                    <!--最終ページフリー追加ゾーンここまで-->
                </div>
                <h1></h1>
                <small>
                    <p>Copyright &copy;</p>
                    <span class="copy">

                    </span>
                    <p>All Rights Reserved</p>
                </small>
                <!--最終ページにボタンを追加する場合は以下をコメントアウト解除して編集-->
                <!--
                <p>
                    <a class="button" href="#">次の話へ</a>
                    <a class="button" href="#">前の話へ</a>
                </p>
                -->
                <p>
                    <input type="button" value="もう一度読む" class="button b_button">
                    <input type="button" value="サイトへ戻る" class="button o_button orange">
                </p>
            </div>
        </div>
    </div>
    <!--漫画表示ゾーンここまで-->

    <!--メニューここから-->
    <div class="menu_box">
        <div class="menu_button">
            <i class="fa-solid fa-square-caret-down"></i>
            <p>menu</p>
        </div>
        <div class="menu_show">
            
            <h1></h1>
            
            <small>Copyright &copy; <span class="copy"></span> All Rights Reserved</small>
            <!--メニューにボタンを追加する場合は以下をコメントアウト解除して編集-->
            <!--
            <p>
                <a class="button" href="#">次の話へ</a>
                <a class="button" href="#">前の話へ</a>
            </p>
            -->
            <p>
                <input type="button" value="操作ヘルプ" class="button p_button">
                <input type="button" value="全画面表示" class="button g_button sp_none">
                <input type="button" value="拡大モード" class="button z_button">
                <input type="button" value="サイトへ戻る" class="button o_button orange">
            </p>
            <div class="slick-counter">
                <span class="current">

                </span>
                /
                <span class="total">

                </span>
            </div>
            <div class="dots" dir="rtl">

            </div>
            <div class="menu_button close">
                <i class="fa-solid fa-square-caret-up"></i>
                <p>close</p>
            </div>
        </div>
    </div>
    <!--メニューここまで-->

    <!--操作ヘルプここから-->
    <div class="help">
        <div class="help_in">
            <div class="help_img">
                <img src="{{asset('images/help.png')}}" width="300">
            </div>
            <p>【画面操作】</p>
            <!--class="sp_none"でPC以外だと非表示・class="pc_none"でPCだと非表示-->
            <ul class="pc_none">
                <li>
                    &#9312;中央ダブルタップ
                    <span>
                        ……拡大モード
                    </span>
                </li>
                <li>
                    &#9312;中央フリック
                    <span>
                        ……次のページ・前のページ
                    </span>
                </li>
                <li>
                    &#9313;両端タップ
                    <span>
                        ……次のページ・前のページ
                    </span>
                </li>
                <li>
                    &#9314;ページャータップ
                    <span>
                        ……ページ移動
                    </span>
                </li>
            </ul>
            <ul class="sp_none">
                <li>
                    &#9312;中央スライド
                    <span>
                        ……次のページ・前のページ
                    </span>
                </li>
                <li>
                    &#9313;両端クリック
                    <span>
                        ……次のページ・前のページ
                    </span>
                </li>
                <li>
                    &#9314;ページャークリック
                    <span>
                        ……ページ移動</span>
                </li>
            </ul>
            <p class="sp_none">【キーボード操作】</p>
            <ul class="sp_none">
                <li>←キー……次のページ</li>
                <li>→キー……前のページ</li>
                <li>↓キー……メニュー表示</li>
                <li>↑キー……拡大モード</li>
                <li>F11キー……全画面表示</li>
            </ul>
        </div>
    </div>
    <!--操作ヘルプここまで-->

    <!--初期表示ガイドここから-->
    <div class="guide">
        <div class="slide-arrow prev-arrow">
            <span>
                <i class="fa-solid fa-chevron-right"></i>
            </span>
        </div>
        <div class="guide_yazirusi">
            <div class="icon">
                <i class="fa-solid fa-caret-up"></i>
            </div>
            <div class="text">

            </div>
        </div>
        <div class="guide_operation">
            <!--ガイド内容ここから-->
            <img src="{{asset('images/guide.png')}}" width="190"><br>
            <p>横へ読みます</p>
            <!--ガイド内容ここまで-->
        </div>
        <div class="slide-arrow next-arrow">
            <span>
                <i class="fa-solid fa-chevron-left"></i>
            </span>
        </div>
    </div>
    <!--初期表示ガイドここまで-->

    <!--拡大モードここから-->
    <div class="zoomwrap"></div>
    <div class="zoom_reset z_button">
        <div class="zr_in">拡大モードを解除</div>
    </div>
    <!--拡大モードここまで-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('js/book.js') }}"></script>
</body>