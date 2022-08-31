@extends('layout.layout')
@section('content')
<div class="container">
    <div class="row">
        <center>
        <h1 >Profile Page </h1>
        <table class="table table-border table-striped" style="margin:25px;width:800px;" >

            <tr><td colspan="2"  style="text-align:center">
            <img src="images/users/{{ Auth::user()->image }}" width="200px" height="200px"/> </td></tr>
            <tr><td>Full Name </td><td> {{ Auth::user()->name }} </td></tr>
            <tr><td>Phone </td><td> {{ Auth::user()->phone }}  </td></tr>
            <tr><td>Email </td><td> {{ Auth::user()->email }}  </td></tr>
            <tr><td colspan="2" style="text-align:center"> <a href="{{ route('auth.updateprofile') }}" class="btn btn-warning">Update My Profile</a></td></tr>
            <tr><td colspan="2" style="text-align:center"> <a href="{{ route('auth.delete', Auth::user()->id) }}" class="btn btn-danger">Delete My Account</a></td></tr>
         </table>
        </center>
    </div>
    </div>
@endsection
