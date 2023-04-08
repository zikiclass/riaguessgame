@extends('validator.app')
@section('content')
<div class="signup">
    <form>
        @csrf
        <a href="/"><img src="img/logo.jpeg"/></a>
        <h3>Sign Up</h3>
        <input type="text" name="fullname" placeholder="Full Name" id="fullname"/>
        <input type="email" name="email" placeholder="Email Address" id="email"/>
        <input type="text" name="username" placeholder="Username" id="username"/>
        <input type="password" name="password" placeholder="Password" id="password"/>
        <input type="password" name="cpassword" placeholder="Confirm Password" id="cpassword"/>
        <input type="submit" id="reg_form" value="Register"/>
     
        <p>Already have an account? <a href="login">Login</a></p>

    </form>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('#reg_form').on('click', function(e){
            var fullname = $('fullname').val();
            var email = $('email').val();
            var username = $('username').val();
            var password = $('password').val();
            var cpassword = $('cpassword').val();
            var form = $(this).parents('form');
            $(form).validate({
                rules: {
                    fullname: {
                        required: true
                    },
                    email:{
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    cpassword: {
                        required: true,
                        equalTo: "#password"
                    },
                },
                messages: {
                    fullname: "Full Name is required",
                    email: "Email is required",
                    username: "Username is required",
                    password: "Password is required",
                    cpassword: "Confirm Password is required",
                    cpassword: {
                        equalTo: "Confirm password not matched"
                    },

                },
                highlight: function(element){
                    $(element).addClass('error')
                },
                submitHandler: function(){
                    var formData = new FormData(form[0]);
                    $.ajax({
                        type: 'POST',
                        url: 'save_user',
                        data: formData,
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success:function(data) {
                            if(data.exists){
                                $('#notifDiv').fadeIn();
                                $('#notifDiv').css('background', 'red');
                                $('#notifDiv').text('Email already exists');
                                setTimeout(() => {
                                    $('#notifDiv').fadeOut();
                                }, 3000);
                                
                            }else if(data.success){
                                $('#notifDiv').fadeIn();
                                $('#notifDiv').css('background', 'green');
                                $('#notifDiv').text('User Registered Successfully');
                                setTimeout(() => {
                                    $('#notifDiv').fadeOut();
                                    location = "login";
                                }, 3000);
                                $('[name="fullname"]').val('');
                                $('[name="email"]').val('');
                                $('[name="username"]').val('');
                                $('[name="password"]').val('');
                                $('[name="cpassword"]').val('');
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
                }
            });

        });
    });
    </script>

@endpush