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
            <h2 id="aside_title">Deniel's Blog</h2>
            <div class="aside_items">
                <h4 class="aside_items_title">topic</h4>

                @foreach ( $menus as $menu )
                    <div class="aside_items_item">
                        <img src="{{ $menu->icon_dir }}" class="aside_items_item_icon">
                        <h4 class="aside_items_item_title">{{ $menu->title }}</h4>
                    </div>
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

            <div id="context">
                <div id="part1" class="theme">
                    <div class="topic_box2">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                    <div class="topic_box2">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                </div>

                <h2 class="topic">it's time to hang</h2>
                <div id="part2" class="theme">
                    <div class="topic_box4">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                    <div class="topic_box4">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                    <div class="topic_box4">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                    <div class="topic_box4">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                </div>

                <h2 class="topic">albums</h2>
                <div class="theme">
                    <div class="topic_box3">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                    <div class="topic_box3">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
                    </div>
                    <div class="topic_box3">
                        <h2 class="topic_box_title">How to do Basic Jumping and how to landing safely</h2>
                        <h4 class="topic_box_auth">Deniel Xie</h4>
                        <h5 class="topic_box_infos">53K views, 2 weeks ago</h5>
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