  @extends('header')
  @section('body')
<div class="container-fluid">
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-11">
    <h1 class="text-center">@lang('home.hello').{{Auth::user()->name}}</h1>
    </div>
    <div class="col-md-1">
       <a class="btn btn-outline-success my-2 my-sm-0" href="{{route('addcategory')}}">@lang('home.add')</a>
    </div>
  </div>   
  </div>
<div class="container">                                  
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>@lang('home.id')</th>
        <th>@lang('home.category_name')</th>
        <th>@lang('home.edit')</th>
        <th>@lang('home.delete')</th>
      </tr>
    </thead>
    @foreach($category as $id=> $use)
    <tbody>
      <tr>
        <td>{{ $id+1 }}</td>
        <td>{{ $use->name }}</td>
        <td>{{ $use->type }}</td>
        <td onclick="deleteCategory(this,'{{ $use->id }}')">delete</td>
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
@endsection
