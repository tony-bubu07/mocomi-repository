<!-- login.php,signup.php以外の共通ヘッダー外部ファイル -->
<header class="common_header">
    <div class="common_header_upside">
        <div class="common_header_left">
            <div class="logo">
                <a href="{{ route('top') }}">
                    <img src="{{asset('images/logo_beside_full.png')}}">
                </a>
            </div>

            <div class="search_header">
                <form action="{{ route('search_result') }}" method="GET">
                    @csrf
                    <input class="search_header_input" type="text" name="keyword" placeholder="作品名・作者・キーワードで検索">

                    <a href="{{ route('search_result') }}"><input class="search_header_button" type="submit" value="検索"></a>
                </form>
            </div>

        </div>
        <div class="common_header_right">
            <div class="common_header_right_upper">
                @auth
                <a href="{{ route('bookshelf', ['id' => Auth::user()->id]) }}" class="bookshelf">
                    <button type="submit" name="id" value="使用者ID" class="bookshelfTxt">
                        <i class="fa-solid fa-chart-column" style="color:#323310"></i></br>
                        <p>本棚</p>
                    </button>
                </a>
                @else
                <a href="{{ route('bookshelf') }}" class="bookshelf">
                    <button type="submit" name="id" value="使用者ID" class="bookshelfTxt">
                        <i class="fa-solid fa-chart-column" style="color:#323310"></i></br>
                        <p>本棚</p>
                    </button>
                </a>
                @endauth

                <!-- <a href="{{ route('favorite') }}">
                    <button type="submit" name="id" value="使用者ID" class="favoriteTxt">
                        <i class="fa-solid fa-star" style="color:#323310"></i></br>
                        <p>おきにいり</p>
                    </button>
                </a> -->


                <!-- <a href="{{ route('cart') }}">
                    <button type="submit" name="id" value="使用者ID" class="cartTxt">
                        <i class="fa-solid fa-cart-shopping fa-flip-horizontal" style="color:#323310"></i></br>
                        <p>カート</p>
                    </button>
                </a> -->

                <a href="{{ route('mypage') }}">
                    <button type="submit" name="id" value="使用者ID" class="mypageTxt">
                        <i class="fa-solid fa-user" style="color:#323310"></i></br>
                        <p>マイページ</p>
                    </button>
                </a>

                <a href="{{ route('login') }}">
                    <button type="submit" name="id" value="使用者ID" class="loginTxt">
                        <i class="fa-solid fa-door-open" style="color:#323310"></i></br>
                        <p>ログイン・ログアウト</p>
                    </button>
                </a>

                <!-- <a href="{{ route('login') }}">
                    <button type="submit" name="id" value="使用者ID" class="logoutTxt">
                        <i class="fa-solid fa-right-from-bracket" style="color:#323310"></i></br>
                        <p>ログアウト</p>
                    </button>
                </a> -->
            </div>

            <div class="common_header_right_under">
                <div class="comment">
                    @can('admin')
                    <p class="for_admin_comment">管理者としてログイン中</p>
                    @elsecan('post-user')
                    <p class="for_post-user_comment">投稿ユーザーとしてログイン中</p>
                    @elsecan('user')
                    <p class="fot_user_comment">一般ユーザーとしてログイン中</p>
                    @endcan
                </div>
            </div>

        </div>
    </div>
    <div class="common_header_beneath">
        <ul>
            <li class="link_total"><a href="{{ route('top') }}" class="link">総合</a></li>
            <li class="link_boyYoung"><a href="{{ route('men') }}" class="link">少年/青年</a></li>
            <li class="link_girlWoman"><a href="{{ route('women') }}" class="link">少女/女性</a></li>
        </ul>
    </div>
</header>