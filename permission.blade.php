@extends('core-layout.master-layout')
@section('title', 'Permissions')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header  sms-content-header">
   <div class="container-fluid">
      <div class="row">
         <!-- page header -->
         <div class="col-sm-7 sms-contetnt-header-panel">
            <!-- page title -->
            <h3 class="content-title">Permissions</h3>
            <!-- page breadcrumb -->
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="{{ url('home') }}">
                  <i class="fa fa-home"></i>
                  </a>
               </li>
               <li class="breadcrumb-item active">Permissions</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<!-- page conten -->
<section class="content-header  sms-content-header">
   <div class="container-fluid">
		<div>
			<button type="button" class="btn btn-primary float-right" id="updateRoutes">Primary</button>
		</div>
      <div class="row">
		@foreach ($permissions as $module)
			<div class="form-check d-block w-100">
				<input type="checkbox" name="moduleIds" class="form-check-input moduleCheckBox" id="{{ $module['id'] }}" value="{{ $module['id'] }}" {{ $module['module_is_restricted'] == 1 ? 'checked' : '' }}>
				<label class="form-check-label">{{$module['module_name']}}</label>
			</div>
			@foreach ($module['get_module_routes'] as $moduleRoute)
				<div class="form-check">
					<input type="checkbox" name="routeIds" class="form-check-input route_{{ $module['id'] }}" id="{{ $moduleRoute['route_group_id'] }}" value="{{ $moduleRoute['route_group_id'] }}" {{ $moduleRoute['route_is_restricted'] == 1 ? 'checked' : '' }}>
					<label class="form-check-label">{{$moduleRoute['route_group_label']}}</label>
				</div>
			@endforeach
		@endforeach
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
@endsection
@section('footer')
@parent
@endsection
<script>
	var USER_ID = {!! $userID !!}
</script>
@push('scripts')
<script src="{{ asset('js/permission/permission.js') }}"></script>
@endpush
