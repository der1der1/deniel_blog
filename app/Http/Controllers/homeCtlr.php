<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\menuModel;
use App\Models\articleModel;
use App\Models\albumModel;
use Illuminate\Support\Facades\Hash;
// use App\Models\chatModel;





class homeCtlr extends Controller
{
    public function home_show($page_chose = null)
    {
        $menus = menuModel::all();

        switch ($page_chose) {
            case 2:
                $page_chose = 'content.aboutme';
                return view('deniel_blog', compact('menus','page_chose'));

            case 3:
                $travels = articleModel::where('category', 'travel')->inRandomOrder()->get();
                $page_chose = 'content.travel';
                return view('deniel_blog', compact('menus','page_chose','travels'));

            case 7:
                $page_chose = 'content.myweb';
                return view('deniel_blog', compact('menus','page_chose'));

            case 8:
                $page_chose = 'content.chat';
                $chats = articleModel::where('category', 'chat')->inRandomOrder()->get();
                return view('deniel_blog', compact('menus','page_chose','chats'));
    
            case 9:
                $albums = albumModel::inRandomOrder()->get();
                $page_chose = 'content.album';
                return view('deniel_blog', compact('menus','page_chose', 'albums'));
    
            case 10:
                \Log::debug('case 10');
                $page_chose = 'content.admin';
                return view('deniel_blog', compact('menus','page_chose'));
    
            default:
                $homes = articleModel::inRandomOrder()->get();
                $page_chose = 'content.home';
                return view('deniel_blog', compact('menus','page_chose','homes'));
        }
    }

    public function album_show($album)
    {
        $menus = menuModel::all();
        $album_show = albumModel::where('title', $album)->first();
        $page_chose = 'content.album_show';

        // 取出照片欄，重寫成陣列
        $photos = explode(';', $album_show->photos);

        return view('deniel_blog', compact('menus','page_chose', 'album_show','photos'));
    }

    public function chat_show($chat)
    {
        $menus = menuModel::all();
        $chat_show = articleModel::where('title', $chat)->first();
        $page_chose = 'content.chat_show';

        return view('deniel_blog', compact('menus','page_chose', 'chat_show'));
    }
    public function travel_show($travel)
    {
        $menus = menuModel::all();
        $travel_show = articleModel::where('title', $travel)->first();
        $page_chose = 'content.travel_show';

        return view('deniel_blog', compact('menus','page_chose', 'travel_show'));
    }
    public function admin_show(Request $pwd)
    {
        if ($pwd->pwd == 'den959glow487') {

            $articles = articleModel::all();

            $menus = menuModel::all();
            return view('admin_pass', compact('menus','articles'));
        } else {

            return redirect()->route('home_show')->with('error', '大哥你不是我本人，不能進入。');
        }
    }
    public function admin_pass()
    {
        $articles = articleModel::all();

        $menus = menuModel::all();
        return view('admin_pass', compact('menus','articles'));
    }

    public function admin_store(Request $request) {

        $article = articleModel::where('id', $request->id)->first();

        $article->category = ($article->category != $request->category) ? $request->category : $article->category;
        $article->title = ($article->title != $request->title) ? $request->title : $article->title;
        $article->context = ($article->context != $request->context) ? $request->context : $article->context;


        $article->save();
        // 如果要刪除先刪掉
        // if ($request->delete == "1") {
        //     $product->delete();
        // } else {
        //     // 如果資料庫的該筆資料 != 網頁上的送出資料 => 更新
        //     $product->id = ($product->id != $request->id) ? $request->id : $product->id;
        //     $product->pic_name = ($product->pic_name != $request->pic_name) ? $request->pic_name : $product->pic_name;
        //     $product->product_name = ($product->product_name != $request->product_name) ? $request->product_name : $product->product_name;
        //     $product->description = ($product->description != $request->description) ? $request->description : $product->description;
        //     $product->price = ($product->price != $request->price) ? $request->price : $product->price;
        //     $product->ori_price = ($product->ori_price != $request->ori_price) ? $request->ori_price : $product->ori_price;
        //     $product->category = ($product->category != $request->category) ? $request->category : $product->category;

        //     $product->save();
        // }

        // 5. 圖片處理區
        // 檢查是否有上傳檔案
        // 找到產品
        // 檢查是否有上傳新圖片
        if ($request->hasFile('back_img')) {
            // 取得上傳的圖片
            $image = $request->file('back_img');

            // 移動新圖片到目標位置
            $image->move(public_path('img/article_picture'), $image->getClientOriginalName());
            
            // 更新資料庫圖片路徑
            $article->back_img = 'img/article_picture/' . $image->getClientOriginalName();
            $article->save();
        }
        return redirect()->route('admin_pass');
    }
}
