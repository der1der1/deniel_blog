<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\menuModel;
use App\Models\articleModel;
use App\Models\albumModel;




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

            case 9:
                $albums = albumModel::all();
                $page_chose = 'content.album';
                return view('deniel_blog', compact('menus','page_chose', 'albums'));
    
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
        return view('deniel_blog', compact('menus','page_chose', 'album_show'));

    }
}
