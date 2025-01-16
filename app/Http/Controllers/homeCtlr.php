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

        // $hashed_pwd = Hash::make('den959glow487');
        // $hashed_input = Hash::make($pwd->pwd);
        if ($pwd->pwd == 'den959glow487') {


            $articles = articleModel::all();

            $menus = menuModel::all();
            return view('admin_pass', compact('menus','articles'));
        } else {

            return redirect()->route('home_show')->with('error', '大哥你不是我本人，不能進入。');
        }

    }
}
