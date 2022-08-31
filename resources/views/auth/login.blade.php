@extends('layout.layout')
@section('content')
<center>
<form method="post" style="width:400px" action="{{ route('auth.handleLogin') }}">
@csrf
 @include('inc.errors')
    <h1>Login Form</h1>
    </br>
        <div class="form-group" >
        <input type="email" class="form-control" placeholder="email" name="email"></br>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="password" name="password" id="myInput">
            <br>
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
        <div class="sub-w3l">
                <input type="checkbox" name="remember_me" value="1">
                <label for="remember_me">Remember me?</label>
            </div>
        <div class="right-w3l">
            <br>
            <input type="submit" class="form-control btn btn-primary" value="Login" name="btn-login">
        </div>
        <div class="right-w3l">
            <br>
            <a class="btn" href="{{ route('github.redirect') }}"
                    style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                    Login with Github
                </a>
        </div>
        <p class="text-center dont-do mt-3">
            <a href="{{ route('forget.password.get') }}">
                Forget Password</a>
        </p>
        <p class="text-center dont-do mt-3">
            <a href="Dashboardlogin.php">
                Login As Admin</a>
        </p>
        <p class="text-center dont-do mt-3">Don't have an account?
            <a href="{{ route('auth.register') }}">
                Register Now</a>
        </p>
</form>
@endsection
