@extends('admin.app')
@section('content')
<div class="sidebar">
<div class="logo">
<i class="fa fa-user-circle" aria-hidden="true"></i>
<p>Admin</p>
</div>

<div class="menu">
<ul>
<li><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i>
 Dashboard</a></li>
<li><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i>
 Game Title</a></li>
<li class="active"><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i>
 View Games</a></li>
<li><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
Users</a></li>
<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li> 

</ul>
</div>

</div>
<div class="content">
    <div class="content-body">
    <div class="notif" id="notif">
        <p>Hi Admin!</p>
        <p class="close" onclick="closediv()">x</p>
</div>
<div class="links">
<ul>
<li><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i><br/>
 Dashboard</a></li>
<li><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 Game Title</a></li>
<li class="acve"><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 View Games</a></li>
<li><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
Users</a></li>
<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li> 

</ul>
</div>
<div class="cards">
<table>
<h4>Game Table</h4>
<thead>
<td>Player 1</td>
<td>Player 2</td>
<td class="time">Time Left</td>
<td class="time">Rounds</td>
<td>Score 1</td>
<td>Score 2</td>
<td class="win">Winner</td>
</thead>

@foreach($row as $user)
<tr>
<td>{{ $user->player1 }}</td>
<td> {{ $user->player2 }} </td>
<td class="time"> {{ $user->minutes .":". $user->seconds}}</td>
<td class="time"> {{ $user->game_rounds}}</td>
<td> {{ $user->player1score }}</td>
<td> {{ $user->player2score }}</td>
<td class="win">
@if($user->player1score > $user->player2score)
<b>{{ $user->player1}}</b>
@else
<b>{{ $user->player2}}</b>
@endif
</td>

</tr>
@endforeach
</table>
</div>



</div>
</div>
@endsection

@push('scripts')
<script>

    function closediv(){
        var x = document.getElementById("notif");
         x.style.display = "none";
        
        
    }

    </script>
@endpush