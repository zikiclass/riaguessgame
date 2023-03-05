@extends('admin.app')
@section('content')
<div class="sidebar">
<div class="logo">
<i class="fa fa-user-circle" aria-hidden="true"></i>
<p>Admin</p>
</div>

<div class="menu">
<ul>
<li class="active"><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i>
 Dashboard</a></li>
<li><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i>
 Game Title</a></li>
<li><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i>
 View Games</a></li>
<li><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
 Players</a></li>
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
<li class="acve"><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i><br/>
 Dashboard</a></li>
<li><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 Game Title</a></li>
<li><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 View Games</a></li>
<li><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
 Players</a></li>
<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li> 

</ul>
</div>
<div class="cards">
<div class="card">
    <p>Players</p>
    <h3>23</h3>
</div>
<div class="card2">
    <p>Game Played</p>
    <h3>230</h3>
</div>
<div class="card3">
    <p>Admin</p>
    <h3>2</h3>
</div>
<div class="card4">
    <p>Comments</p>
    <h3>13</h3>
</div>
</div>


<div class="graph">
    
<img src="img/line-chart.png"/>
<img src="img/graph.png"/>
<img src="img/bar-chart.png"/>

</div>
<p class="copyright">- Riaguessgameandscore (v1.0) -<br/> &copy; <?php echo date("Y"); ?> <i>All rights reserved</i></p> 
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