<div id="context">
    <div id="part1" class="theme">
        @for ($i = 0; $i < 2; $i++)
        <div class="topic_box2" style="background-image: url('{{ $homes[$i]->back_img }}');">
            <h2 class="topic_box_title">{{ $homes[$i]->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $homes[$i]->views }} views, {{ substr($homes[$i]->created_at,0,10) }}</h5>
        </div>       
        @endfor
    </div>

    <h2 class="topic">travel</h2>
    <div class="theme">
        @for ($i = 1; $i < 5; $i++)
        <div class="topic_box4" style="background-image: url('{{ $homes[$i]->back_img }}');">
            <h2 class="topic_box_title">{{ $homes[$i]->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $homes[$i]->views }} views, {{ substr($homes[$i]->created_at,0,10) }}</h5>
        </div>       
        @endfor
    </div>

    <h2 class="topic">album</h2>
    <div class="theme">
        @for ($i = 2; $i < 5; $i++)
        <div class="topic_box3" style="background-image: url('{{ $homes[$i]->back_img }}');">
            <h2 class="topic_box_title">{{ $homes[$i]->title }}</h2>
            <h4 class="topic_box_auth">Deniel Xie</h4>
            <h5 class="topic_box_infos">{{ $homes[$i]->views }} views, {{ substr($homes[$i]->created_at,0,10) }}</h5>
        </div>       
        @endfor
    </div>
</div>