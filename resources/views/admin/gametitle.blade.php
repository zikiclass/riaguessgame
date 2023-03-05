@extends('admin.app')
@section('content')
<div class="card-modal"  id="closeMda">

    <div class="card-modal-content">
        <div onclick="closeModal()" class="closeModal">x</div>
    <h2>UPDATE <br/>Game Card</h2>
    <img src="img/profile.png" id="imgView" alt="Game Card"/>
    <form id="form1" enctype="multipart/form-data" method="POST">
        @csrf
    <input type="text" id="gameID" name="gameId" hidden />
    <input type="file" id="imgSel" onchange="PreviewImage();" name="imgFile" accept="image/*"/>
    <input type="text"  name="gametitle" placeholder="Title" id="title"/>
    <input type="submit" value="Update"/>
</form>

</div>

</div>
<div class="sidebar">
<div class="logo">
<i class="fa fa-user-circle" aria-hidden="true"></i>
<p>Admin</p>
</div>

<div class="menu">
<ul>
<li><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i>
 Dashboard</a></li>
<li class="active"><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i>
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
<li><a href="admin"><i class="fa fa-tachometer" aria-hidden="true"></i><br/>
 Dashboard</a></li>
<li class="acve"><a href="gametitle"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 Game Title</a></li>
<li><a href="viewgames"><i class="fa fa-gamepad" aria-hidden="true"></i><br/>
 View Games</a></li>
<li><a href="players"><i class="fa fa-male" aria-hidden="true"></i>
 Players</a></li>
<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Logout</a></li> 

</ul>
</div>
<div class="game-cards">
    @foreach ($list as $item)
<div class="game-card" onclick="openModal()" data-id="{{ $item->game_id }}">
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



<p class="copyright">- Riaguessgameandscore (v1.0) -<br/> &copy; <?php echo date("Y"); ?> <i>All rights reserved</i></p> 
</div>
</div>


@endsection

@push('scripts')
<script>
var xclose = document.getElementById("closeMda");

    function closediv(){
        var x = document.getElementById("notif");
         x.style.display = "none";
        
        
    }
    function closeModal(){
        xclose.style.display = "none";
    }

    function openModal(){
        // var pText = document.getElementById("cardP").innerHTML;
        // document.getElementById("gcard").innerHTML = pText;
        xclose.style.display = "block";
        
    }

    window.onclick = function(event) {
  if (event.target == xclose) {
    xclose.style.display = "none";
  }
}



function PreviewImage(){
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("imgSel").files[0]);
    oFReader.onload = function(oFREvent){
        document.getElementById("imgView").src = oFREvent.target.result;
    };
}

$(document).ready(function(){
    
  


    $('.game-card').click(function(){
        const id = $(this).attr('data-id');
        $.ajax({
            url: 'gametitledetails/'+id,
            type: 'GET',
            dataType: 'json',
            data: {
                "id" : id
            },
            success: function(data){
                $('#imgView').attr('src',data['info'].pix);
                $('#gameID').attr('value',data['info'].game_id);
                $('#title').attr('value', data['info'].title);
            }
        });
    });

    $('#form1').on('submit', (function (e){
        e.preventDefault();
        $.ajax({
            url: "gametitleupdate",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                $('#form1')[0].reset();

                window.location.reload();
            }
        });
    }));
});
    </script>
@endpush