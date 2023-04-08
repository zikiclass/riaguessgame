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
<li><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 View Games</a></li>
<li class="acve"><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
Users</a></li>
<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li> 

</ul>
</div>
<div class="cards">
    
<table>
<h4>List of Users/Admin</h4>
<thead>
<td>Username</td>
<td>Password</td>
<td>User Type</td>
<td>Action</td>
</thead>

@foreach($users as $user)
<tr>
<td>{{ $user->username }}</td>
<td> ******** </td>
<td> 
    @if($user->role == 1)
    ADMIN
    @else
    USER
    @endif
</td>
<td class="colord">
@if($user->role == 1)
<span class="down"><a href="down/{{$user->username}}">Down</a></span>
    @else
    <span class="up"><a href="up/{{$user->username}}">Up</a></span>
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