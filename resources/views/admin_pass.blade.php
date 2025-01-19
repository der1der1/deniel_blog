<!-- 報錯 -->
@if(session('error'))
<script>alert("{{ session('error') }}");</script>
@elseif(session(key: 'success'))
<script>alert("{{ session('success') }}");</script>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deniel_blog</title>

    <!-- 將 CSS 文件連結到 HTML -->
    <link rel="stylesheet" href="{{ asset('deniel_blog.css') }}">

</head>
<body>
    <div id="container">
        <aside>
            <a href="{{ route('home_show') }}">
                <h2 id="aside_title">Deniel's Blog</h2>
            </a>
            <div class="aside_items">
                <h4 class="aside_items_title">topic</h4>

                @foreach ( $menus as $menu )
                    <a href="{{ route('home_show', ['page_chose' => $menu->id]) }}">
                    
                        <div class="aside_items_item">
                            <img src="{{ $menu->icon_dir }}" class="aside_items_item_icon">
                            <h4 class="aside_items_item_title">{{ $menu->title }}</h4>
                        </div>
                    </a>

                @endforeach
            </div>
        </aside>

        <main>
            <div id="header">
                <div id="row1">
                    <div id="input">
                        <input type="text" name="" id="search" placeholder="search">
                        <img src="{{ asset('img/magnifier.png') }}" id="search_btn">
                    </div>
                    <div id="auth">
                        <img src="{{ asset('img/avatar.png') }}" id="avatar">
                        <h3 id="myname">Deniel</h3>
                        <img src="{{ asset('img/arrow.png') }}" id="auth_more">
                        <img src="{{ asset('img/bell1.png') }}" id="auth_info">
                    </div>
                </div>
                <h1>Administrator</h1>
            </div>

            <div id="admin_outerbox">
                <div id="admin_chose">
                    <button  onclick="edit_album()" class="admin_chose_btn"><h4>album</h4> </button>
                    <button  onclick="edit_article()" class="admin_chose_btn"><h4>article</h4></button>
                </div>
                <div id="admin_panel">
                    <div id="admin_panel_article" class="admin_panel_article">
                        @foreach ($articles as $article)
                        <div id="one_article_{{$article->id}}" class="one_article" onclick="editing({{$article->id}})" title="點擊以編輯">
                            <p id="edit_category_s">{{$article->category}}</p>
                            <p id="edit_title_s">{{$article->title}}</p>
                            @if(strlen($article->context)>20)
                            <p id="edit_context_s">{{mb_substr($article->context, 0, 22,'UTF-8')}}...</p>
                            @else
                            <p id="edit_context_s">{{$article->context}}</p>
                            @endif
                        </div>
                        <!-- 如果點開才會出現的 -->
                            <form method="POST" action="{{ route('admin_store') }}" enctype="multipart/form-data">
                            @csrf
                                <div id="admin_window_{{$article->id}}" class="display_none">
                                    <div class="row1">
                                        <input type="text" class="row1_category" value="{{$article->category}}" name="category">
                                        <input type="text" class="row1_title" value="{{$article->title}}" name="title">
                                        <div class="row1_back" onclick="editing({{$article->id}})" title="點擊以收合" > back</div>
                                        <!-- <button onclick="editing({{$article->id}})">back</button> -->
                                    </div>
                                    <div class="row2">
                                        <div class="row2_1">
                                            <!-- <input class="row2_1_title" type="text" value="{{$article->back_img}}" name="title"> -->
                                            <!-- <img class="row2_1_row2_img" src="{{$article->back_img}}" alt=""> -->
                                            
                                            {{-- 顯示現有圖片 --}}
                                            <img src="{{ asset( $article->back_img) }}" width="100">
                                            <label for="image">change picture</label>
                                            <input type="file" class="row2_1_row2_img" name="back_img" accept="image/*">
                                        </div>
                                        <textarea class="row2_context" name="context" >{{$article->context}}</textarea>
                                        <div class="row2_2">
                                            <input type="text" name="id" value="{{$article->id}}" style="display:none;">
                                            <input class="row2_2_enter" type="submit" value="enter" title="確認">
                                            <input class="row2_2_delete" type="text" placeholder="delete" name="delete" title="刪除">
                                        </div>
                                
                                    </div>
                                </div>
                            </form>

                        <!-- 
                            <input type="text" id="edit_category_s" value="{{$article->category}}">
                            <input type="text" id="edit_title_s" value="{{$article->title}}">
                            <input type="text" id="edit_context_s" value="{{$article->context}}"> -->
                        @endforeach
                    </div>
                    <div id="admin_panel_album" class="admin_panel_album"></div>

                </div>
            </div>
        </main>

    </div>
    <footer>
        <p class="footer_word">© 2025 Desmo co.ltd</p>
        <p class="footer_word">Privacy</p>
        <p class="footer_word">Contect</p>
    </footer>
</body>
</html>
<script>
    function edit_article() {
        document.getElementById("admin_panel_article").className = "admin_panel_article";
        document.getElementById("admin_panel_album").className = "display_none";
    }
    function edit_album() {
        document.getElementById("admin_panel_album").className = "admin_panel_album";
        document.getElementById("admin_panel_article").className = "display_none";
    }


    // 處裡單一項目項目編輯的開啟與關閉
    function editing(itemId) {
    // 獲取對應的詳細資訊div
    const detailDiv = document.getElementById(`admin_window_${itemId}`);
    // 判斷是否有 one_article_edit class
    if (detailDiv.classList.contains('one_article_edit')) {
        // 如果有 one_article_edit class，移除它並添加 display_none
        document.getElementById(`one_article_${itemId}`).className = "one_article";
        detailDiv.classList.remove('one_article_edit');
        detailDiv.classList.add('display_none');
    } else {
        // 如果沒有 one_article_edit class，移除 display_none 並添加 one_article_edit
        document.getElementById(`one_article_${itemId}`).className = "display_none";
        detailDiv.classList.remove('display_none');
        detailDiv.classList.add('one_article_edit');
    }
}
</script>