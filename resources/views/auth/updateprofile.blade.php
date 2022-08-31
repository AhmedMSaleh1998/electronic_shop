@extends('layout.layout')
@section('content')
<center>
</br>
</br>
@include('inc.errors')
    <form method="POST" style="width:500px" enctype="multipart/form-data" action="{{ route('auth.edit.profile', Auth::user()->id) }}">
        @csrf
        <div class="form-group text-left">
         <label for="name"><span class="error";></span>Username</label>
         <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Only letters and white space allowed"/>
        </div>
        <div class="form-group text-left">
         <label for="phone"><span class="error";></span>phone</label>
         <input type="phone" class="form-control" name="phone" value="{{ Auth::user()->phone }}" placeholder="Phone must be 11 Numbers" />
        </div>
        <div class="form-group text-left">
         <label for="email"><span class="error";></span>Email</label>
         <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="ahmed@ahmed.com"/>
        </div>
        <tr><td> Upload Image Profile</td>
         <td><input type="file" class="form-control"  name="image"/></td></tr>
        <div class="right-w3l">
         <input type="submit" class="form-control btn btn-primary" value="update" name="btn-update">
        </div>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </form>
</center>
@endsection
