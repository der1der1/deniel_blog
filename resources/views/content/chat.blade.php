<div id="context">

    <h2 class="topic">閒聊</h2>
    <h5>(articles were produced by ai)</h5>
    <div class="theme">

        @foreach ($chats as $chat)
        <a href="{{ route('chat_show', ['chat' => $chat->title]) }}" class="topic_box3" style="background-image: url('{{ $chat->back_img }}');">
            <h2 class="topic_box_title">{{ $chat->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $chat->views }} views, {{ substr($chat->created_at,0,10) }}</h5>
        </a>
        @endforeach
 
    </div>

</div>