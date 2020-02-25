  @extends('header')
  @section('body')
<div class="container-fluid">
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
   
  </div>   
  </div>
<div class="container">                                  
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@lang('home.usersLable')</th>
        <th>@lang('home.totalCategoryLable')</th>
        <th>@lang('home.totalBlobsLable')</th>
      </tr>
    </thead>
    
    <tbody>
      <tr>
        <th>{{$users}}</th>
        <th>{{$category}}</th>
        <th>{{$description}}</th>
      </tr>

    </tbody>
  </table>
  </div>
</div>
  </div>
  <div class="col-sm-2">
    
  </div>
  @endsection