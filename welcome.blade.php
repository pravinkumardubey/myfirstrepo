<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/welcome.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
	<div id="main">
		<h2 align="center">Registration Here</h2>
	<form id="myForm" enctype="multipart/form-data">
	   	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
		<input type="text" name="name" placeholder="Enter Name"><br>
		<input type="date" name="dob" placeholder="Enter dob"><br>
		<input type="email" name="email" placeholder="Enter Email"><br>
		<input type="file" name="file"><br>
		<input type="number" name="mobile" placeholder="Enter Contact"><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	</div>
	
	<div id="images">
		<h3 align="center">Your Uploaded Image Are Here</h3>
		<table align="center" border="2" rules="all">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Dob</th>
					<th>Email</th>
					<th>File</th>
					<th>Contact</th>
					<th>Delete</th>
				</tr>
			</thead id="data">
			<tbody id="myData">
				
			</tbody>
		</table>
	</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<script src="{{asset('js/new.js')}}"></script>
		<script>
			window.onload = function() {
				getAllData();
			}
		</script>

</body>
</html>