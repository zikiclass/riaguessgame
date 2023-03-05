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
<li><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i>
 View Games</a></li>
<li class="active"><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
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
<li><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i><br/>
 Dashboard</a></li>
<li><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 Game Title</a></li>
<li><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 View Games</a></li>
<li class="acve"><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
 Players</a></li>
<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li> 

</ul>
</div>
<div class="cards">

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