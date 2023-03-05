@extends('validator.app')
@section('content')
<div class="login">
    <form>
        @csrf
        <img src="img/logo.jpeg"/>
        <h3>Login</h3>
        <input type="text" name="username" placeholder="Username" id="username"/>
        <input type="password" name="password" placeholder="Password" id="password"/>
        
        <input type="submit" id="login_btn" value="Login"/>
        <p><a href="forgot">Forgot Password</a></p>
        <p>Don't have an account? <a href="signup">Sign Up</a></p>

    </form>
    
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#login_btn').click(function(e) {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        
        $.ajax({
            type: 'POST',
            url: 'user_login',
            data:{
                
                username: username,
                password: password
            },
            
            success:function(data){
                if($.isEmptyObject(data.error)){
                    if(data.success){
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text('User Successfully Login');
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                        if(data.success == 'Successfully Logged In'){
                        window.location = "gamearena";
                        }
                        else if(data.success == 'Admin Successfully Logged In'){
                            window.location = "admin";
                        }
                    }
                }
                else{
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('An error occured. Please try later');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            }
        });
    });
});
    </script>

@endpush