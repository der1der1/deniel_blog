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
                <h1>Discover</h1>
            </div>

            <div id="admin_outerbox">
                <div id="admin_chose">
                    <button  onclick="edit_album()" class="admin_chose_btn"><h4>album</h4> </button>
                    <button  onclick="edit_article()" class="admin_chose_btn"><h4>article</h4></button>
                </div>
                <div id="admin_panel">
                    <div id="admin_panel_album" class="admin_panel_album"></div>
                    <div id="admin_panel_article" class="admin_panel_article">
                        @foreach ($articles as $article)
                        <div class="one_article" onclick="editing()">
                            <p id="edit_category_s">{{$article->category}}</p>
                            <p id="edit_title_s">{{$article->title}}</p>
                            @if(strlen($article->context)>20)
                            <p id="edit_context_s">{{mb_substr($article->context, 0, 22,'UTF-8')}}...</p>
                            @else
                            <p id="edit_context_s">{{$article->context}}</p>
                            @endif
                        </div>

                        
                            <!-- 如果點開才會出現的 -->
                             <div id="admin_window" style="position: fixed; z-index: 9999; top: 400px; right: 530px; background: red; padding: 10px; color: white;">
                                123
                             </div>
                        <!-- 
                            <input type="text" id="edit_category_s" value="{{$article->category}}">
                            <input type="text" id="edit_title_s" value="{{$article->title}}">
                            <input type="text" id="edit_context_s" value="{{$article->context}}"> -->
                        @endforeach
                    </div>
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
</script>