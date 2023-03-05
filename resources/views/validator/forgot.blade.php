@extends('validator.app')
@section('content')
<div class="forgot">
    <form action="">
    <img src="img/logo.jpeg"/>
        <h3>Retrieve Password</h3>
        <p class="forgot-p">Enter your username or email below to receive instructions on resetting your password</p>
        <input type="text" name="username" placeholder="Username / email"/>
        
        <input type="submit" value="Retrieve"/>
        

    </form>
</div>

@endsection