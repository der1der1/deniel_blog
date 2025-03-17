<!-- 報錯 -->
@if(session('error'))
<script>alert("{{ session('error') }}");</script>
@elseif(session('success'))
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
                <h1>{{ $album->title }} 相本</h1>
            </div>

            <div id="admin_outerbox2">
                @foreach ($pics as $pic)
                <form method="POST" action="{{ route('admin_photo_edit_store') }}" enctype="multipart/form-data" class="image-upload-form">
                    @csrf
                    
                    <input type="text" name="album_chose" value="{{ $album->id }}" style="display: none;">
                    <input type="text" name="old_pic" value="{{ $pic }}" style="display: none;">
                    <div class="image-container">
                        <img src="{{ $pic }}" alt="" class="preview-image" data-original="{{ $pic }}">
                        <input type="file" name="pic" id="pic_{{ $loop->index }}" class="file-input" accept="image/*" onchange="previewImage(this)">
                        <div class="upload-overlay">
                            <span>點擊上傳</span>
                        </div>
                    </div>
                    <input type="submit" value="確定" class="submit-button" style="display: none;">
                </form>
                @endforeach
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
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var form = input.closest('form');
            var previewImg = form.querySelector('.preview-image');
            var submitBtn = form.querySelector('.submit-button');
            
            reader.onload = function(e) {
                // 顯示新上傳的圖片
                previewImg.src = e.target.result;
                
                // 顯示提交按鈕
                submitBtn.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
