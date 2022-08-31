@extends('layout.layout')
@section('content')
<h1 class="alert text-center">Register Page</h1>
        <center>
        <h4 class="alert alert-danger" style="width:700px">* Required Fields</h4>
        <form method="post" style="width:500px" enctype="multipart/form-data" action="{{ route('auth.handleRegister') }}">
        @csrf
            @include('inc.errors')
            <div class="form-group text-left">
             <label for="name"><span class="error";>*</span>Username</label>
             <input type="text" class="form-control" name="name" placeholder="white space  are not allowed"/>
            </div>
            <div class="form-group text-left">
            <label for="password"><span class="error";>*</span>password</label>
             <input type="password" class="form-control" name="password" placeholder="Min 8 char, at least 1 uppercase , 1 lowercase , 1 num and 1 special" id="myInput"/>
             <input type="checkbox" class="form-check-input" onclick="myFunction()"> Show Password
            </div>
            <div class="form-group text-left">
            <label for="password_confirmation"><span class="error" >*</span>password Confirm</label>
             <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation" id="myInput2"/>
             <input type="checkbox" class="form-check-input" onclick="myFunction2()"> Show Password
            </div>
            <div class="form-group text-left">
             <label for="phone"><span class="error";>*</span>phone</label>
             <input type="phone" class="form-control" name="phone" placeholder="Phone must be 11 Numbers" />
            </div>
            <div class="form-group text-left">
             <label for="email"><span class="error";>*</span>Email</label>
             <input type="text" class="form-control" name="email" placeholder="email@email.com"/>
            </div>
            <div class="form-group text-warning">
            <span class="error";>*</span>
             <input type="checkbox"  required name="checkaggree"/> </td>
              I Agree your terms & Condaitions
             </div>
            <div class="right-w3l">
             <input type="submit" class="form-control btn btn-primary" value="Register" name="btn-register">
            </div>
            <br>
         </form>
    </center>
    <!--===============================================================================================-->
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>
<!--===============================================================================================-->
<script>
    function myFunction2() {
      var y = document.getElementById("myInput2");
      if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
    }
</script>
<!--===============================================================================================-->
@endsection
