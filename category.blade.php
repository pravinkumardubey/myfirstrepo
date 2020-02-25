<!DOCTYPE html>
<html>
<head>
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
		<h1 class="text-center">Add Category</h1>
		</div>
		<div class="col-md-1">
		</div>
	</div>   
  </div>

<div class="container-fluid">
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
    <div class="alert alert-danger" style="display: none;" id="error"></div>
<form action="addingcategory" method="post">
	@csrf
  <div class="form-group">
    <label for="name">Categry Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name">
  </div>
  <div class="form-group">
    <label>Type:</label>
    <select name="type" class="form-control">
    	<option value="">--Choose Option--</option>
    	<option>Mendatory</option>
    	<option>Optional</option>
    </select>
  </div><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-sm-3"></div>
</body>
</html>