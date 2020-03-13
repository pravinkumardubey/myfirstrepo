@extends('core-layout.master-layout')
@section('title', 'Location Licensee')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')
  <!--main content-->
    <div class="m-content">
      <!-- BEGIN: Subheader -->
      <div class="m-subheader ">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="m-subheader__title ">
              Permissions
            </h3>
          </div>
        </div>
      </div>
      <!-- END: Subheader -->
        <div class="row m-row--full-height">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <a href="{{ route('role') }}" style="text-decoration:none">
          <div class="m-portlet m-portlet--border-bottom-brand active background_gradient">
            <div class="m-portlet__body text-right">
              <div class="m-widget26 display_flex">
                <div class="m-widget26__icon">
                  <i class="flaticon-interface-9"></i>
                </div>
                <div class="m-widget26__number">


                </div>
              </div>
              <small class="count_name">User Roles</small>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <a href="{{ route('module') }}" style="text-decoration:none">
          <div class="m-portlet m-portlet--border-bottom-brand active background_gradient">
            <div class="m-portlet__body text-right">
              <div class="m-widget26 display_flex">
                <div class="m-widget26__icon">
                  <i class="flaticon-interface-9"></i>
                </div>
                <div class="m-widget26__number">


                </div>
              </div>
              <small class="count_name">Total Modules </small>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <a href="{{ route('routePermission') }}" style="text-decoration:none">
          <div class="m-portlet m-portlet--border-bottom-brand active background_gradient">
            <div class="m-portlet__body text-right">
              <div class="m-widget26 display_flex">
                <div class="m-widget26__icon">
                  <i class="flaticon-interface-9"></i>
                </div>
                <div class="m-widget26__number">


                </div>
              </div>
              <small class="count_name">Total Routes</small>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <a href="{{ route('module-assignment') }}" style="text-decoration:none">
          <div class="m-portlet m-portlet--border-bottom-brand active background_gradient">
            <div class="m-portlet__body text-right">
              <div class="m-widget26 display_flex">
                <div class="m-widget26__icon">
                  <i class="flaticon-interface-9"></i>
                </div>
                <div class="m-widget26__number">


                </div>
              </div>
              <small class="count_name">Module assigned to roles</small>
            </div>
          </div>
          </a>
        </div>
        <!--<div class="col-sm-12 col-md-12 col-lg-4">
            <a href="{{ url('user_restriction_module') }}" style="text-decoration:none">
          <div class="m-portlet m-portlet--border-bottom-brand active background_gradient">
            <div class="m-portlet__body text-right">
              <div class="m-widget26 display_flex">
                <div class="m-widget26__icon">
                  <i class="flaticon-interface-9"></i>
                </div>
                <div class="m-widget26__number">
                  {{--$restricted_routes--}}
                </div>
              </div>
              <small class="count_name">Restricted modules for roles</small>
            </div>
          </div>
          </a>
        </div>-->
        <div class="col-sm-12 col-md-12 col-lg-4">
            <a href="{{ url('role_restriction_module') }}" style="text-decoration:none">
          <div class="m-portlet m-portlet--border-bottom-brand active background_gradient">
            <div class="m-portlet__body text-right">
              <div class="m-widget26 display_flex">
                <div class="m-widget26__icon">
                  <i class="flaticon-interface-9"></i>
                </div>
                <div class="m-widget26__number">


                </div>
              </div>
              <small class="count_name">Restricted role wise routes</small>
            </div>
          </div>
          </a>
        </div>
        </div>
  </div>

  @endsection
@section('modelBox')
<!-- Modal -->
<div class="modal fade" id="llModel" role="dialog">
      <form method="POST" action="javascript:void(0)" id="llCreateUpdateForm">

   <div class="modal-dialog modal-dialog-scrollable">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Location Licensee</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
               <input type="hidden" id="id" name="id">
               <div class="form-group">
                  @csrf
                  <label for="tl_id">TL Name</label>
                  <div class="input-group" >
                    <input type="hidden" id="tl_id" name="tl_id">
                    <input readonly type="text" class="form-control" placeholder="Seletcted TL after search" id="tl_name" name="tl_name">
                    <div class="input-group-append">
                      <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
               </div>
               <div class="form-group">
                  <label for="state">Location</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Enter Location">
               </div>
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of LL">
               </div>
               <div class="row">
                  <div class="form-group col-sm-6">
                     <label for="country-code">Country Code</label>
                     <input type="text" class="form-control" id="country_code" name="country_code" placeholder="Country code for mobile">
                  </div>
                  <div class="form-group col-sm-6">
                     <label for="contact-number">Contact Number</label>
                     <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number">
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-sm-6">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Enter email of LL">
                  </div>
                  <div id="form-password" class="form-group form-password col-sm-6">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                  </div>
               </div>
               <div id="form-checkbox" class="form-group form-check d-none">
                  <input type="checkbox" class="form-check-input passwordCheckbox" id="llPasswordCheck" name="llPasswordCheck">
                  <label class="form-check-label" for="llPasswordCheck">Do you want to change password?</label>
               </div>
         </div>
         <div class="modal-footer">
            <button type="submit" id="addLlBtn" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
    </div>
  </form>
</div>
@endsection
@section('footer')
@parent
@endsection
@push('scripts')
<script src="{{ asset('js/ll/llList.js') }}"></script>
<script src="{{ asset('js/ll/llcreateupdate.js') }}"></script>
<script src="{{ asset('js/ll/llActivate.js') }}"></script>
@endpush
