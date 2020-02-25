<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ URL::asset('js/login.js') }}"></script>
</head>
<body>
<div class="container">
  <div class="row">
     <div class="col-md-3">
     </div>
    <div class="col-md-6 ">
      <h2 align="center">Login Here</h2>
      <form id="loginform" action="{{route('validateLogin')}}" method="post">
        @csrf
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
    </div>
     <div class="col-md-3 "></div>
  </div>
</div>
</body> 
</html>