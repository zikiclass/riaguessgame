@extends('validator.app')
@section('content')

<div class="reset">
    <form action="">
    <img src="img/logo.jpeg"/>
        <h3>Reset Password</h3>
        <input type="password" name="password" placeholder="New Password"/>
        <input type="password" name="confirmpassword" placeholder="Confirm Password"/>
        <input type="submit" value="Reset Password"/>
        

    </form>
</div>
@endsection