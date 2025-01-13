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

            <!-- load the Content accoring to the select of menu -->
            @include($page_chose)

        </main>

    </div>
    <footer>
        <p class="footer_word">© 2025 Desmo co.ltd</p>
        <p class="footer_word">Privacy</p>
        <p class="footer_word">Contect</p>
    </footer>
</body>
</html>