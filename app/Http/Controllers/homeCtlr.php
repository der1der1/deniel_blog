<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\menuModel;


class homeCtlr extends Controller
{
    public function home_show()
    {
        // $user = Auth::user();
        $menus = menuModel::all();

        // 返回結果，傳遞給 welcome.blade.php 視圖
        return view('deniel_blog', compact('menus'));
        
    }
}
