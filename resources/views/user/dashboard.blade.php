@extends('user.app')
@section('content')
<div class="dash">
<h3>Ria Guess Game and Score</h3>
<div class="dash-head">
<h4>Score: <span>0</span></h4>
<h4>Player: <span>{{ Auth::user()->username }}</span></h4>
<a href="logout" class="logout">Logout</a>
</div>
<div class="dash-game">
    <h2 class="game-title" id="title">Gbaye</h2>
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
<h2 class="game-title" id="title">Gbaye</h2>
</div>

<p>- Riaguessgameandscore (v1.0) -<br/> &copy; <?php echo date("Y"); ?> <i>All rights reserved</i></p> 
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function(){
    $('.game-card').click(function(){
        var id = $(this).attr('data-id');
        var title = ".g"+id;
        $('.game-card').css("background-color", "white");
        $('.game-card').css("font-weight", "normal");
        $('.game-card').css("text-transform", "capitalize");


        $(title).css("background-color", "yellow");
       
        $(title).css("font-weight", "bold");
        $(title).css("text-transform", "uppercase");

    });

    $('.game-title').click(function(){
        alert('game time');
    });
});


</script>

@endpush