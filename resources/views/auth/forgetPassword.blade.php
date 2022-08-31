@extends('layout.layout')
@section('content')
<center>
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
<form method="post" style="width:400px" action="{{ route('forget.password.post') }}">
@csrf
 @include('inc.errors')
</br></br></br></br>
    <h1>Forget Password Form</h1>
    </br>
        <div class="form-group" >
        <input type="email" class="form-control" placeholder="email" name="email"></br>
        </div>
        <div class="right-w3l">
            <br>
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </div>
    </br>
</br></br></br></br></br></br></br></br></br></br></br>

</form>
@endsection
