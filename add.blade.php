<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="{{ URL::asset('js/blob.js') }}"></script>
</head>
<body>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-11">
		<h1 class="text-center">Add Description</h1>
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
<form action="add-description" method="post">
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="name">Title:</label>
    <input type="text" class="form-control" placeholder="Enter Title" name="title">
  </div>
  <div class="form-group">
  <label for="desc">Description:</label>
    <textarea class="form-control" placeholder="Enter Description" name="description"></textarea>
  </div>
  <div class="form-group">
    <label>Type:</label>
    <select name="type" id="type" class="form-control" onchange="selectType()">
      <option value="">--Choose Option--</option>
    	<option>Mendatory</option>
    	<option>Optional</option>
    </select>
  </div>
  <div class="form-group">
    <label>Category:</label>
    <select name="select" class="form-control" id="select">
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="col-sm-3"></div>
</body>
</html>