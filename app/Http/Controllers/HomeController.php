<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // viewの呼び出し
        // return view('home');

        // テーブルと接続済みのモデル指定
        $object = new Book();
        //books テーブルのデータを Book Model のgetData メソッド経由で取得する
        // オールジャンル
        $books_data = $object->orderBy('id', 'DESC')->take(10)->get();

        // 少年/青年
        $men_books_data = $object->where('book_kinds_id', 1)->orderBy('id', 'DESC')->take(10)->get();

        // 少女/女性
        $women_books_data = $object->where('book_kinds_id', 2)->orderBy('id', 'DESC')->take(10)->get();

        // var_dump($books_data, $men_books_data, $women_books_data);

        return view('home', ['books_data' => $books_data, 'men_books_data' => $men_books_data, 'women_books_data' => $women_books_data]);
    }
}
