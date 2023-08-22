<!-- login.php,signup.php以外の共通フッター外部ファイル -->
<header class="common_footer">
    <!-- <div class="search_footer">
        <i class="fa-solid fa-magnifying-glass" style="color:#323310"></i>
        <form action="http://localhost/mocomi" method="get" class="search_form">
            <input type="text" name="search_form" placeholder="作品名・作者・キーワードで検索"> -->
    <!-- 検索フォームに入力したときに検索ボタンが表示されるようにする -->
    <!-- <button type="submit">検索</button> -->
    </form>
    </div>

    <div class="footer_beneath">
        <div class="comic_genre_list">
            <h1>ジャンル一覧</h1>
            <ul>
                <li><a href="{{ route('men') }}">少年/青年向けまんが</a></li>
                <li><a href="{{ route('women') }}">少女/女性向けまんが</a></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="member_page_list">
            <h1>会員ページ</h1>
            <ul>
                <li>
                    @auth
                    <a href="{{ route('bookshelf', ['id' => Auth::user()->id]) }}">
                        <button type="submit" name="id" value="使用者ID" class="bookshelfTxt_f">
                            <h2>本棚</h2>
                        </button>
                    </a>
                    @else
                    <a href="{{ route('bookshelf') }}">
                        <button type="submit" name="id" value="使用者ID" class="bookshelfTxt_f">
                            <h2>本棚</h2>
                        </button>
                    </a>
                    @endauth
                </li>
                <!-- <li>
                    <a href="{{ route('favorite') }}">
                        <button type="submit" name="id" value="使用者ID" class="favoriteTxt_f">
                            <h2>おきにいり一覧</h2>
                        </button>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('mypage') }}">
                        <button type="submit" name="id" value="使用者ID" class="mypageTxt_f">
                            <h2>マイページ</h2>
                        </button>
                    </a>
                </li>
                <li>
                    @auth
                    <a href="{{ route('account_edit', ['id' => Auth::user()->id]) }}">
                        <button type="submit" name="id" value="使用者ID" class="mypageTxt_f">
                            <h2>アカウント情報編集</h2>
                        </button>
                    </a>
                    @else
                    <a href="{{ route('account_edit') }}">
                        <button type="submit" name="id" value="使用者ID" class="mypageTxt_f">
                            <h2>アカウント情報編集</h2>
                        </button>
                    </a>
                    @endauth
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        <button type="submit" name="id" value="使用者ID" class="logoutTxt_f">
                            <h2>ログアウト</h2>
                        </button>

                    </a>
                </li>
            </ul>
        </div>
        <div class="mocomi_guide_list">
            <h1>Mocomiガイド</h1>
            <ul>
                <li>XXXXXXXXXXX</li>
                <li>XXXXXXXXXXX</li>
                <li>XXXXXXXXXXX</li>
                <li>XXXXXXXXXXX</li>
                <li>XXXXXXXXXXX</li>
            </ul>
        </div>
    </div>
</header>