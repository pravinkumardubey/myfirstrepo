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
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-11">
    <h1 class="text-center">Blob List</h1>
    </div>
    <div class="col-md-1">
       
    </div>
  </div>   
  </div>
<div class="container">                                  
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    @foreach($blob as $id=> $use)
    <tbody>
      <tr>
        <td>{{ $id+1 }}</td>
        <td>{{ $use->title }}</td>
        <td>{{ $use->description }}</td>
        <td><a href="{{ route('editblob',['id'=>$use->id]) }}">edit</td>
        <td onclick="deleteBlob(this,'{{ $use->id }}')">delete</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
  </div>
  <div class="col-sm-2"></div>

</div>
</div>
</body>
</html>
