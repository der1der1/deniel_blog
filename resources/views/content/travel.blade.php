<div id="context">
    <div id="part1" class="theme">
        @for ($i = 0; $i < 2; $i++)
        <a href="{{ route('travel_show', ['travel' => $travels[$i]->title]) }}" class="topic_box2" style="background-image: url('{{ $travels[$i]->back_img }}');">
            <h2 class="topic_box_title">{{ $travels[$i]->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $travels[$i]->views }} views, {{ substr($travels[$i]->created_at,0,10) }}</h5>
        </a>
        
        @endfor
    </div>

    <h2 class="topic">more</h2>
    <div class="theme">
        @for ($i = 2; $i < 5; $i++)
        <a href="{{ route('travel_show', ['travel' => $travels[$i]->title]) }}" class="topic_box3" style="background-image: url('{{ $travels[$i]->back_img }}');">
            <h2 class="topic_box_title">{{ $travels[$i]->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $travels[$i]->views }} views, {{ substr($travels[$i]->created_at,0,10) }}</h5>
        </a>

        @endfor
    </div>
</div>