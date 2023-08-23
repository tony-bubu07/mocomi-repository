<?php
/*namaspease...名前空間。関数名やclass名が属するグループを定義する*/

namespace App\Http\Controllers;

/*リクエストを受け取る*/
//使いたいクラスを書く

use App\Models\Book;
use App\Models\Bookshelf;
use App\Models\member;
use App\Models\Mocomi;
use Illuminate\Contracts\View\View;
//Illuminate...Laravelの大事なコンポーネントが置いてある場所
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

//class MocomiController extends Controller...Controllerを継承したMocomiController
class MocomiController extends Controller
{
    // public function index()
    // {
    //     $object = new Mocomi();  //Modelsフォルダの対象ファイルを設定
    //     $data = $object->getData(); //インスタンスを設定
    //     return  view('hello.index', ['data' => $data]);
    // }

    // TOPページ
    public function top(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.top');

        // テーブルと接続済みのモデル指定
        $object = new Book();
        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        // オールジャンル
        $books_data = $object->orderBy('id', 'DESC')->take(10)->get();

        // 少年/青年
        $men_books_data = $object->where('book_kinds_id', 1)->orderBy('id', 'DESC')->take(5)->get();

        // 少女/女性
        $women_books_data = $object->where('book_kinds_id', 2)->orderBy('id', 'DESC')->take(5)->get();

        // var_dump($books_data, $men_books_data, $women_books_data);

        return view('mocomi.top', ['books_data' => $books_data, 'men_books_data' => $men_books_data, 'women_books_data' => $women_books_data]);
    }

    // ログイン
    public function login(Request $request)
    {
        return view('mocomi.login');
    }

    // マイページ DB情報取得
    public function mypage(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.mypage');

        $object = new User();
        //users テーブルのデータを User Model のgetData メソッド経由で取得する
        $users_data = $object->getData();

        // var_dump($users_data);

        //viewの呼び出し
        return view('mocomi.mypage', ['users_data' => $users_data]);
    }

    // アカウント情報編集ページ
    public function account_edit(Request $request)
    {
        $object = new User();
        //users テーブルのデータを User Model のgetData メソッド経由で取得する
        $users_data = $object->getData();
        return view('mocomi.account_edit', ['data' => $users_data]);
    }

    // アカウント情報編集確認ページ
    public function account_edit_confirmation(Request $request)
    {
        // return view('mocomi.account_edit_confirmation');

        $validateRules = [
            'image' => ['mimes:jpg,jpeg,png'],
            'name' => ['required', 'string', 'max:30'],
            'email' => ['string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:20',  'confirmed'],
        ];

        $validateMessages = [
            // 画像 バリデーションメッセージ
            // "image.required" => "イメージの画像は必須項目です",
            "image.mimes:jpg,jpeg,png" => "イメージの画像ファイル形式はjpg、jpeg、pngにしてください",

            // ユーザー名 バリデーションメッセージ
            "name.required" => "ユーザー名は必須項目です",
            "name.max:30" => "ユーザー名は30文字以内で入力してください",

            // メールアドレス バリデーションメッセージ
            "email.required" => "メールアドレスは必須項目です",
            "email.max:255" => "メールアドレスは255文字以内で入力してください",
            // "email.unique:users" => "メールアドレスは有効なものを入力してください",
            "email.email" => "正しく入力してください",

            // パスワード バリデーションメッセージ
            "password.required" => "パスワードは必須項目です",
            "password.min:8" => "パスワードは8文字以上20文字以内で入力してください",
            "password.max:20" => "パスワードは8文字以上20文字以内で入力してください",
        ];

        // ディレクトリ名
        $dir = 'sample';

        // $newImagePath = null;

        // ファイルのアップロード
        if ($request->hasFile('image')) {

            // sampleディレクトリに画像を保存
            $file = $request->file('image');
            $file_name = $file->store('public/' . $dir);

            // アップロードされたファイル名を取得
            $newImagePath = str_replace('public/', 'storage/', $file_name);

            // セッションに画像パスをセット
            $request->session()->put('session_image_path', $newImagePath);

        }else if (!$request->hasFile('image')) {

            $nowImagePath = Auth::user()->image_path;
            
            $request->session()->put('session_image_path', $nowImagePath);
        }

        $request->session()->put('session_name', $request->input('name'));
        $request->session()->put('session_email', $request->input('email'));
        $request->session()->put('session_password', $request->input('password'));

        $this->validate($request, $validateRules, $validateMessages);
        $users_data = $request->all();

        // var_dump($users_data);

        return view('mocomi.account_edit_confirmation')->with('users_data', $users_data);
    }

    // アカウント情報編集完了ページ
    public function account_edit_complete(Request $request)
    {
        $image_path = session('session_image_path');
        $name = session('session_name');
        $email = session('session_email');
        $password = session('session_password');
        $id = session('id');

        // データベースの更新
        User::where('id', '=', Auth::user()->id)->update([
            'image_path' => $image_path,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // データベースの更新
        $users_data = $request->all();

        // セッションをクリア
        $request->session()->flush();

        // 完了ページを表示
        return view('mocomi.account_edit_complete')->with('users_data', $users_data);
    }

    // アカウント削除確認ページ
    public function account_delete_confirmation(Request $request)
    {
        $object = new User();
        //users テーブルのデータを User Model のgetData メソッド経由で取得する
        $users_data = $object->getData();
        return view('mocomi.account_delete_confirmation', ['users_data' => $users_data]);
    }

    // アカウント削除完了ページ
    public function account_delete_complete(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
        return view('mocomi.account_delete_complete');
    }

    // 本棚
    public function bookshelf(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.bookshelf');

        $object = new Book();

        $loggedInUserId = Auth::user()->id; // @@ログイン中のユーザー ID を取得  

        //users テーブルのデータを User Model のgetData メソッド経由で取得する
        $book = $object
            ->join('bookshelfs as bs', 'books.id', '=', 'bs.book_id')
            ->join('users as u', 'bs.user_id', '=', DB::raw($loggedInUserId)) // @@ 'u.id' を $loggedInUserId に変更
            ->select('books.*')
            ->where('u.id', $loggedInUserId)
            ->get();


        // var_dump($book);

        //viewの呼び出し
        return view('mocomi.bookshelf', ['book' => $book]);
    }

    // お気に入り一覧
    public function favorite(Request $request)
    {
        return view('mocomi.favorite');
    }

    // 購入履歴ページ
    public function purchase_history(Request $request)
    {
        return view('mocomi.purchase_history');
    }

    // 閲覧履歴ページ
    public function browsing_history(Request $request)
    {
        return view('mocomi.browsing_history');
    }

    // カート
    public function cart(Request $request)
    {
        // return view('mocomi.cart');

        $request->session()->put('session_id', $request->input('id'));
        $request->session()->put('session_cover_path', $request->input('cover_path'));
        $request->session()->put('session_title', $request->input('title'));
        $request->session()->put('session_author', $request->input('author'));
        $request->session()->put('session_price', $request->input('price'));

        $books = $request->all();

        // セッションからデータを取得して配列に追加
        $books['id'] = session('session_id');
        $books['cover_path'] = session('session_cover_path');
        $books['title'] = session('session_title');
        $books['author'] = session('session_author');
        $books['price'] = session('session_price');

        return view('mocomi.cart')->with('books_data', $books);
    }

    // 購入手続き
    public function purchase(Request $request)
    {
        // return view('mocomi.purchase');

        $request->session()->put('session_id', $request->input('id'));
        $request->session()->put('session_cover_path', $request->input('cover_path'));
        $request->session()->put('session_title', $request->input('title'));
        $request->session()->put('session_author', $request->input('author'));
        $request->session()->put('session_price', $request->input('price'));

        $books_data = $request->all();

        // セッションからデータを取得して配列に追加
        $books['id'] = session('session_id');
        $books_data['cover_path'] = session('session_cover_path');
        $books_data['title'] = session('session_title');
        $books_data['author'] = session('session_author');
        $books_data['price'] = session('session_price');


        return view('mocomi.purchase')->with('books_data', $books_data);
    }

    // 購入完了
    public function purchase_complete(Request $request)
    {
        // return view('mocomi.purchase_complete');

        $user_id = Auth::user()->id;
        $book_id = session('session_id');

        $insert_bookshelf = new Bookshelf();

        // データベースの作成
        $insert_bookshelf->create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'created_at' => now(),
        ]);

        // データベースの更新
        $bookshelf_data = $request->all();

        // セッションをクリア
        $request->session()->flush();

        // 完了ページを表示
        return view('mocomi.purchase_complete')->with('bookshelf_data', $bookshelf_data);
    }

    // 少年・青年コミックTOPページ
    public function men(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.men_comic_top');

        // テーブルと接続済みのモデル指定
        $object = new Book();
        //books テーブルのデータを Book Model のgetData メソッド経由で取得する

        // 少年/青年
        $men_books_data = $object->where('book_kinds_id', 1)->orderBy('id', 'DESC')->get();

        // var_dump($men_books_data);

        return view('mocomi.men_comic_top', ['men_books_data' => $men_books_data]);
    }

    // 少女・女性コミックTOPページ
    public function women(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.women_comic_top');

        // テーブルと接続済みのモデル指定
        $object = new Book();
        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        // 少女/女性
        $women_books_data = $object->where('book_kinds_id', 2)->orderBy('id', 'DESC')->get();

        // var_dump( $women_books_data);

        return view('mocomi.women_comic_top', ['women_books_data' => $women_books_data]);
    }

    // コミック巻ごとのTOPページ
    public function comic_top(Request $request, $id)
    {
        // return view('mocomi.comic_top');

        $object = new Book();

        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        $books =  $object->where('id', '=', $id)->first();

        if (!$books) {
            // レコードが存在しない場合の処理をここに記述する（例: エラーメッセージを表示）
        }

        // var_dump($books);

        return view('mocomi.comic_top', ['books' => $books]);
    }

    // コミック閲覧ページ
    public function comic_browse(Request $request, $id)
    {
        // return view('mocomi.comic_browse');

        $object = new Book();

        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        $books =  $object->where('id', '=', $id)->first();

        // var_dump($books);

        return view('mocomi.comic_browse', ['books' => $books]);

        return view('mocomi.comic_browse');
    }

    // コミック巻ごとのコメントや評価
    public function comic_evaluation(Request $request)
    {
        return view('mocomi.comic_evaluation');
    }

    // サインアップ
    public function signup(Request $request)
    {
        return view('mocomi.signup');
    }

    // アップロード
    public function upload(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.upload');

        $object = new Book();
        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        $books_data = $object->getData();

        // var_dump($books_data);

        return view('mocomi.upload', ['books_data' => $books_data]);
    }

    // アップロード確認
    public function upload_confirmation(Request $request)
    {
        // return view('mocomi.upload_comfirmation');

        $validateRules = [
            'cover' => ['required', 'mimes:jpg,jpeg,png'],
            'title' => ['required', 'string', 'max:100', 'unique:books'],
            'author' => ['required', 'string', 'max:50'],
            'price' => ['required', 'alpha_num', 'max:20'],
            'book_kinds_id' => ['required', 'alpha_num'],
        ];

        $validateMessages = [
            // 表紙画像 バリデーションメッセージ
            "cover.required" => "表紙画像は必須項目です",
            "cover.mimes:jpg,jpeg,png" => "表紙画像のファイル形式はjpg、jpeg、pngにしてください",

            // 作品名 バリデーションメッセージ
            "title.required" => "作品名は必須項目です",
            "title.max:30" => "作品名は100文字以内で入力してください",
            "title.unique:books" => "同じ作品名が登録されています",

            // 作者名 バリデーションメッセージ
            "author.required" => "作者名は必須項目です",
            "author.max:50" => "作者名は50文字以内で入力してください",

            // 価格 バリデーションメッセージ
            "price.required" => "価格は必須項目です",
            "price.alpha_num" => "価格は半角数字で入力してください",
            "password.max:20" => "価格は20文字以内で入力してください",

            // 分野別ID バリデーションメッセージ
            "book_kinds_id.required" => "分野別IDの選択は必須項目です",
            "book_kinds_id.alpha_num" => "分野別IDの選択は半角数字",
        ];

        // ディレクトリ名
        $dir = 'cover_image';

        // ファイルのアップロード
        if ($request->hasFile('cover')) {

            // sampleディレクトリに画像を保存
            $file = $request->file('cover');
            $file_name = $file->store('public/' . $dir);

            // アップロードされたファイル名を取得
            $cover_path = str_replace('public/', 'storage/', $file_name);

            // セッションに画像パスをセット
            $request->session()->put('session_cover_path', $cover_path);
        }

        $request->session()->put('session_title', $request->input('title'));
        $request->session()->put('session_author', $request->input('author'));
        $request->session()->put('session_price', $request->input('price'));
        $request->session()->put('session_book_kinds_id', $request->input('book_kinds_id'));

        $this->validate($request, $validateRules, $validateMessages);
        $books_data = $request->all();

        // セッションからデータを取得して配列に追加
        $books_data['cover_path'] = session('session_cover_path');
        $books_data['title'] = session('session_title');
        $books_data['author'] = session('session_author');
        $books_data['price'] = session('session_price');
        $books_data['book_kinds_id'] = session('session_book_kinds_id');

        return view('mocomi.upload_confirmation')->with('books_data', $books_data);
    }

    // アップロード完了
    public function upload_complete(Request $request)
    {
        // return view('mocomi.upload_complete');

        $cover_path = session('session_cover_path');
        $title = session('session_title');
        $author = session('session_author');
        $price = session('session_price');
        $book_kinds_id = session('session_book_kinds_id');

        $new_data = new Book();

        // データベースの作成
        $new_data->create([
            'cover_path' => $cover_path,
            'title' => $title,
            'author' => $author,
            'price' => $price,
            'book_kinds_id' => $book_kinds_id,
        ]);

        // データベースの更新
        $books_data = $request->all();

        // セッションをクリア
        $request->session()->flush();

        // 完了ページを表示
        return view('mocomi.upload_complete')->with('books_data', $books_data);
    }

    // 検索結果 開発中だけ使用
    public function search_result(Request $request)
    {
        // viewの呼び出し
        // return view('mocomi.search_result');

        $object = new Book();
        // Book Modelを使ってbooksテーブルから全てのレコードを取得する
        $companies = $object->query();

        /* キーワードから検索処理 */
        $keyword = $request->input('keyword');

        // "or"はまたはという意味合いになるから、orwhereHasは別のキーワードもフィルターにかけるメソッド
        if (!empty($keyword)) { //$keyword　が空ではない場合、検索処理を実行します
            $companies->where('title', 'LIKE', "%{$keyword}%")
                ->orwhere('author', 'LIKE', "%{$keyword}%")
                ->get();
        }

        /* ページネーション */
        $posts = $companies->paginate(6);

        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        $books_data = $object->getData();

        // var_dump($posts, $books_data);

        return view('mocomi.search_result', ['posts' => $posts, 'books_data' => $books_data]);
    }
}
