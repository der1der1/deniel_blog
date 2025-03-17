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
        if ($pwd->pwd == 'den959glow487') {
            $articles = articleModel::orderBy('id', 'desc')->get();
            $menus = menuModel::all();
            $albums = albumModel::all();
            foreach($albums as $album) {
                $album->photos = str_replace('; ', ';', $album->photos);
                $album->photos = explode(';', $album->photos);             
            }
                
            return view('admin_pass', compact('menus','articles','albums'))->with('success', 'Hi 歡迎編輯 !');
        } else {

            return redirect()->route('home_show')->with('error', '大哥你不是我本人，不能進入。');
        }
    }
    public function admin_pass()
    {
        $articles = articleModel::orderBy('id', 'desc')->get();
        $menus = menuModel::all();
        $albums = albumModel::all();
        foreach($albums as $album) {
            $album->photos = str_replace('; ', ';', $album->photos);
            $album->photos = explode(';', $album->photos);             
        }

        return view('admin_pass', compact('menus','articles','albums'));
    }

    public function admin_store(Request $request) {

        $article = articleModel::where('id', $request->id)->first();

        $article->category = ($article->category != $request->category) ? $request->category : $article->category;
        $article->title = ($article->title != $request->title) ? $request->title : $article->title;
        $article->context = ($article->context != $request->context) ? $request->context : $article->context;

        $article->save();

        // 5. 圖片處理區
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

    public function admin_delete(Request $request) {
        $article = articleModel::where('id', $request->id)->first();
        $article->delete();
        return redirect()->route('admin_pass');
    }
    public function create_article(Request $request) {
        // 取得上傳的圖片
        $image = $request->file('back_img');
        // 移動新圖片到目標位置
        $image->move(public_path('img/article_picture'), $image->getClientOriginalName());

        articleModel::create([
            'category' => $request->category,
            'title' => $request->title,
            'back_img' => 'img/article_picture/' . $image->getClientOriginalName(),
            'context' => $request->context,
            'show' => '1',
        ]);

        return redirect()->route('admin_pass');
    }
    public function admin_album_store(Request $request){
        \Log::debug("request");
        \Log::debug($request); 
        // 文字處理區
        $album = albumModel::where('id', $request->album_id)->first();

        $album->title = ($album->title != $request->album_title) ? $request->album_title : $album->title;
        $album->context = ($album->context != $request->album_context) ? $request->album_context : $album->context;

        $album->save();
        
        // 圖片處理區
        // 檢查是否有上傳新圖片
        if ($request->hasFile('back_img')) {
            // 驗證上傳的檔案
            $request->validate([
                'back_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $image = $request->file('back_img');
            
            try {
                // 移動新圖片到目標位置
                $request->back_img->move(public_path('img/'), $image->getClientOriginalName());
                // 更新資料庫圖片路徑
                $album->back_img = 'img/' . $image->getClientOriginalName();
                $album->save();
                return back()->with('success', '圖片上傳成功！');
                
            } catch (\Exception $e) {
                // 處理錯誤
                return back()->with('error', '圖片上傳失敗：' . $e->getMessage());
            }
        }

        // 如果沒有修改圖片則回傳此行
        return redirect()->route('admin_pass')->with('success', '修改成功！');
    }
    public function admin_photo_store(Request $request){
            $image = $request->file('back_img');
            try {
                // 移動新圖片到目標位置
                $request->back_img->move(public_path('img/'), $image->getClientOriginalName());
                // 更新資料庫圖片路徑
                $album->back_img = 'img/' . $image->getClientOriginalName();
                $album->save();
                return back()->with('success', '圖片上傳成功！');
                
            } catch (\Exception $e) {
                // 處理錯誤
                return back()->with('error', '圖片上傳失敗：' . $e->getMessage());
            }
        return redirect()->route('admin_pass');
    }
    public function admin_photo_edit(Request $request){
        $menus = menuModel::all();
        $album = albumModel::where('id', $request->album_chose)->first();
        $album->photos = rtrim($album->photos, ';');
        $pics = explode(';', $album->photos);
        return view('admin_photo_edit', compact('menus', 'album', 'pics'));
    }
    public function admin_photo_edit_store(Request $request){
        $album = albumModel::where('id', $request->album_chose)->first();
        $pics = explode(';', $album->photos);
        $old_pic = $request->old_pic;
        $image = $request->file('pic');
        $pic_route = explode('/', $old_pic);
        $new_pic_array = [];
        foreach ($pics as $pic) {
            if ($pic == $old_pic){
                $pic_route[count($pic_route) - 1] = $image->getClientOriginalName();
                $pic = implode('/', $pic_route);
            }
            $new_pic_array[] = $pic;
        }
        $album->photos = implode(';', $new_pic_array);
        $this_route = [];
        for ($i = 0; $i < 4; $i++) {
            $this_route[] = $pic_route[$i];
        }
        $this_route_str = implode('/', $this_route);

        try {
            $image->move(public_path($this_route_str . '/'), $image->getClientOriginalName());
            $album->save();
            return back()->with('success', '圖片上傳成功！');
        } catch (\Exception $e) {
            return back()->with('error', '圖片上傳失敗：' . $e->getMessage());
        }
        return back();
    }
}
