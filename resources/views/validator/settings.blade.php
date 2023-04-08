@extends('validator.app')
@section('content')
<div class="signup">
    <form>
        
        @csrf
        <img src="img/logo.jpeg"/>
        <h3>Settings</h3>
        <?php $checkDB = 0; ?>
        @unless(count($list2) == 0)
        <?php $checkDB = 1; ?>
        <div>
        <h4>Waiting...</h4>
        <img src="img/waiting.gif" alt=""/>
        <p><i>please refresh page once a player is assigned to you</i></p>
        <br/>
        <button class="setplayer">Refresh</button>
        <p><a href="logout">Logout</a></p>
        
</div>
@endunless

@unless(count($list) == 0)
<?php $checkDB = 1; ?>

        
        
        <div>
        <p class="selectp">Select player to play with</p>
        <table>
            @foreach ($list as $item)
            
            <tr>
                <td>{{ $item->username }}_RIA</td>
                <td><a class="playgame" href="startGame/{{ $item->username }}">Play</a></td>
            </tr>
            
            @endforeach
            
        </table>
        <p><a href="logout">Logout</a></p>
</div>

@endunless
@if($checkDB == 0)
        <div class="noplayer">
        <p class="pno">No available player</p><br/>
        <a href="become_player" class="setplayer">Become  A Player</a>
        
        <p style="margin-top: 25px;"><a href="logout">Logout</a></p>
        </div>
@endif

        
        
        

    </form>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
    //   $('.setplayer').click(function(){
    //         window.location.reload();
    //   });
       $('.playgame').click(function(){
            const id = $(this).data("id");
            $.ajax({
                url: "startGame"+$id,
                type: 'GET',
                data: {
                    "id" : username
                },
                success: function(data){
                    alert("success");
                }


            }); 
       }); 
    });
    </script>

@endpush