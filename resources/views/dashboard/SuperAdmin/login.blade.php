<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Super Admin Login</title>
  </head>
  <body>
    
  <div class="row">
    <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Log In</h5>
            <form action="{{ route('SuperAdmin.check')}}" method="post" autocomplete="off" >
              @if(Session::get('fail'))
                <div class="alert alert-danger">
                  {{Session::get('fail')}}
                </div>
              @endif
              @csrf
              <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                  <span class="text-danger">@error('password'){{$message}} @enderror</span>

              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
              <br>
              <br>
              <a href="{{ route('SuperAdmin.register')}}">Create New Account</a>
            </form>
        </div>
      </div>
    </div>
  </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>