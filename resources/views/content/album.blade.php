<div id="context">
    <h2 class="topic">相冊</h2>
    <div id="theme_album" >

    @foreach ($albums as $album)
        <div class="topic_box3" style="margin-bottom:100px;" >
            <div style="height:20vh;overflow:hidden;">
                <a href="{{ route('album_show', ['album' => $album->title]) }}">
                    <img src="{{ $album->back_img }}" alt="album_image" width="100%">
                </a>
            </div>
            <h2 class="topic_box_title">{{ $album->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $album->context }} views, {{ substr($album->created_at,0,10) }}</h5>
        </div>
    @endforeach

    </div>
</div>