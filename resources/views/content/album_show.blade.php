您現在在相簿頁/{{$album_show->title}} 相本

<!-- retrieved from the author Duley Storey
 form the web site https://codepen.io/dudleystorey/pen/DvZjLz -->

<div id="carousel">
  <figure id="spinner">
    @for ($i = 0 ; $i < 8 ; $i++)
        <img src="{{ $photos[$i] }}" >
    @endfor

  </figure>
</div>
<span style="float:left" class="ss-icon" onclick="galleryspin('-')">&lt;</span>
<span style="float:right" class="ss-icon" onclick="galleryspin('')">&gt;</span>

<style>
    div#carousel { 
    perspective: 1200px; 
    /* background: #100000;  */
    background: #1f1d2b; 
    /* padding-top: 10%;  */
    font-size:0; 
    /* margin-bottom: 3rem;  */
    height: 60vh;
    overflow: scroll; 
    }
    figure#spinner { 
    transform-style: preserve-3d; 
    height: 68vh; 
    transform-origin: 50% 50% -500px; 
    transition: 1s; 
    } 
    figure#spinner img { 
    width: 40%; max-width: 425px; 
    position: absolute; left: 30%;
    transform-origin: 50% 50% -500px;
    outline:1px solid transparent; 
    }
    figure#spinner img:nth-child(1) { transform:rotateY(0deg); }
    figure#spinner img:nth-child(2) { transform: rotateY(-45deg); }
    figure#spinner img:nth-child(3) { transform: rotateY(-90deg); }
    figure#spinner img:nth-child(4) { transform: rotateY(-135deg); }
    figure#spinner img:nth-child(5){ transform: rotateY(-180deg); }
    figure#spinner img:nth-child(6){ transform: rotateY(-225deg); }
    figure#spinner img:nth-child(7){ transform: rotateY(-270deg); }
    figure#spinner img:nth-child(8){ transform: rotateY(-315deg); }
    div#carousel ~ span { 
    color: #fff; 
    margin: 5%; 
    display: inline-block; 
    text-decoration: none; 
    font-size: 2rem; 
    transition: 0.6s color; 
    position: relative; 
    margin-top: -6rem; 
    border-bottom: none; 
    line-height: 0; }
    div#carousel ~ span:hover { color: #888; cursor: pointer; }
</style>

<script>
    var angle = 0;
    function galleryspin(sign) { 
    spinner = document.querySelector("#spinner");
    if (!sign) { angle = angle + 45; } else { angle = angle - 45; }
    spinner.setAttribute("style","-webkit-transform: rotateY("+ angle +"deg); -moz-transform: rotateY("+ angle +"deg); transform: rotateY("+ angle +"deg);");
    }
</script>