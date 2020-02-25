<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="{{ URL::asset('js/login.js') }}"></script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-11">
		<h1 class="text-center">Registration here</h1>
		</div>
		<div class="col-md-1">
			 <a class="btn btn-outline-success my-2 my-sm-0" href="{{route('login')}}">Login</a>
		</div>
	</div>   
  </div>

<div class="container-fluid">
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
    <div class="alert alert-danger" style="display: none;" id="error"></div>
<form action="register" id="myform">
	@csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label for="dob">Dob:</label>
    <input type="date" class="form-control" placeholder="Enter dob" name="dob">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>
  <div class="form-group">
    <label for="number">Contact:</label>
    <input type="number" class="form-control" placeholder="Enter contact" name="mobile">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <input type="button" onclick="register()" class="btn btn-primary" value="Register">
</form>
</div>
<div class="col-sm-3"></div>
</div>
</div>
</div>
</body>
</html>
