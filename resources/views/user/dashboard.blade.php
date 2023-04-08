@extends('user.app')
@section('content')
<div class="dash">
<h3>Ria Guess Game and Score</h3>
<div class="dash-head">

<h4>Score: <span>
@foreach($chkplayer as $score)
@if(Auth::user()->username == $score->player1)
{{ $score->player1score }}
@else
{{ $score->player2score }}
@endif
@endforeach
</span></h4>
<h4>Player: <span>{{ Auth::user()->username }}</span></h4>
<a href="logout" class="logout">Logout</a>
</div>
<div class="dash-game">
    
@foreach($chkplayer as $time)
    <div class="time" id="time"><span id="minutes">{{ $time->minutes }}</span> : <span id="seconds">{{ $time->seconds}}</span></div>
    @endforeach
    
    
    <div id="gameshow">
    @csrf
    @foreach ($chkplayer as $chklist)
    @if($chklist->guesstitle == '--' and $chklist->player1 <> Auth::user()->username)
    <h2 class="game-title">&nbsp;</h2>
    @else
    <h2 class="game-title play" id="title">{{$chklist->strikeword}}</h2>
    @endif
    @endforeach
    
    <div class="game-container">
        @foreach ($list as $item)
    <div class="game-card g{{ $item->game_id }}" data-id="{{ $item->game_id }}">
        
    <img src="{{ $item->pix }}" />
    @if($item->title == "")
    <p id="cardP">No Title</p>
    @endif
    @if($item->title <> "")
    <p id="cardP">{{ $item->title }}</p>
    @endif
        </div>
        @endforeach
        
</div>
@foreach ($chkplayer as $chklist)
    @if($chklist->guesstitle == '--' && $chklist->player1 <> Auth::user()->username)
    <h2 class="game-title">&nbsp;</h2>
    @else
    @csrf
    <h2 class="game-title play" id="title">{{$chklist->strikeword}}</h2>
    @endif
    @endforeach

</div>

<div id="gameend">
<h2>End of Game</h2>

@foreach($chkplayer as $score)
@if(Auth::user()->username == $score->player1)
@if((int)$score->player1score < (int)$score->player2score)
<p id="loss">YOU LOSS!</p>
@else
<p id="won">YOU WON!!</p>
@endif
@else
@if((int)$score->player2score < (int)$score->player1score)
<p id="loss">YOU LOSS!</p>
@else
<p id="won">YOU WON!!</p>
@endif
@endif
@endforeach



<h5 class="endscore"><b>SCORE: </b><span>
@foreach($chkplayer as $score)
@if(Auth::user()->username == $score->player1)
{{ $score->player1score }}
@else
{{ $score->player2score }}
@endif
@endforeach

</span>

</h5>


<table>
    <thead class="the">
<td>Player 1</td>
<td>Player 2</td>
<td>Score 1</td>
<td>Score 2</td>
</thead>
@foreach($chkplayer as $gamestats)
<tr>
<td>{{ $gamestats->player1 }}</td>
<td>{{ $gamestats->player2 }}</td>
<td>{{ $gamestats->player1score }}</td>
<td>{{ $gamestats->player2score }}</td>
</tr>
@endforeach

</table>

<div>
<a href="playagain" class="playagain">Play Again / End Game</a>
</div>
</div>
</div>

<p>- Riaguessgameandscore (v1.0) -<br/> &copy; <?php echo date("Y"); ?> <i>All rights reserved</i></p> 
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function(){
    var seconds = document.getElementById("seconds").innerHTML;
    var minutes = document.getElementById("minutes").innerHTML;

    seconds = parseInt(seconds);
    minutes = parseInt(minutes);
    var zero = "0";
    setInterval(
        function()
        {
            
            if(minutes > 0 || seconds > 0){
            
            if(seconds == 0){
            seconds = 60;
            minutes -= 1;
            if(minutes < 10){
                
                document.getElementById("minutes").innerHTML = zero.concat(minutes);
                minutes = zero.concat(minutes);
            }
            else{
            document.getElementById("minutes").innerHTML = minutes;
            }
           }

            var new_secs = seconds - 1;

            seconds = new_secs;
            if(seconds < 10){
                document.getElementById("seconds").innerHTML = zero.concat(seconds);
                seconds = zero.concat(seconds);
            }
            else{
           document.getElementById("seconds").innerHTML = seconds;
            }

            $.ajax({
                url: 'updateTime/'+minutes+'/'+seconds,
                type: 'GET',
                dataType: 'JSON'
            });
            //console.log(new_secs);
           }
           else{
            document.getElementById("gameshow").style.display = "none";
            document.getElementById("time").style.display = "none";
            document.getElementById("gameend").style.display = "block";
           }
        }
        
        ,1000);

    var title_select;
    $('.game-card').click(function(){
        var id = $(this).attr('data-id');
        var title = ".g"+id;
        $('.game-card').css("background-color", "white");
        $('.game-card').css("font-weight", "normal");
        $('.game-card').css("text-transform", "capitalize");


        $(title).css("background-color", "yellow");
       
        $(title).css("font-weight", "bold");
        $(title).css("text-transform", "uppercase");

        title_select = id;

    });

    $('.play').click(function(){
        // alert(title_select);
        var id = title_select;
        
        $.ajax({
            url: 'playgame/'+id,
            type: 'GET',
            dataType: 'JSON',
            headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
            success: function(data){
               if(data.success){
                alert(data.success);
                window.location.reload();
               }
               
               
            }

        });
    });
});


</script>

@endpush