@extends('core-layout.master-layout')
@section('title', 'Location Licensee')
@section('header')
@parent
@endsection
@extends('layouts.admin')
@section('page_title')
Module Assignment
@endsection

@section('page_css')
<style>
.text_decoration{
  text-decoration:none!important;
}
</style>
@endsection
@section('content')


  <!--main content-->
    <div class="m-content">
      <!-- BEGIN: Subheader -->
      <div class="m-subheader ">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="m-subheader__title ">
              Module Assignment module
            </h3>
          </div>

          <!--begin: Search Form -->
          <div class="m-form m-form--label-align-right">
            <div class="align-items-center">
              <div class="display_flex">
                <div class="col-xl-8 col-8">
                  <div class="form-group m-form__group row align-items-center">
                    <div class="">
                      <div class="m-input-icon m-input-icon--left">
                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search Module Name.." id="generalSearch">
                        <span class="m-input-icon__icon m-input-icon__icon--left">
                          <span>
                            <i class="la la-search"></i>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-4 m--align-right">
                  <a href="javascript:void(0);" id="addModuleAssignment" class="btn background_gradient btn-accent add_btn theme_shadow" data-toggle="modal" data-target="#addModuleAssignmentModal">
                    <span>
                      <i class="la la-plus"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--end: Search Form -->
        </div>
      </div>
      <!-- END: Subheader -->
      <div class="row m-row--full-height">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="Module_Assignment_datatable"></div>
        </div>
      </div>
      <div class="space50"></div>
    </div>
  <!-- display role module start -->

    <section class="content  sms-content">
  <div class="row">
    <div class="col-12">
      <div class="card no-background">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="role-module" class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Role</th>
                  <th>Module Assigned</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
        </div>
    </div>
</section>

<!-- end display roleAssignModel -->
    <!--begin:: Add Module Assignment Modal-->
    <div class="modal fade" id="addModuleAssignmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">

          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">
              Add Module Assignment
            </h5>
            <form id="StoreModuleAssignment" action="{{route('saveModuleAssignment')}}">
              <input type="hidden" class="form-control border_bottom pl0" id="module_assign_id" name="module_assign_id" value="">

              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Role
                </label>
                <select class="form-control border_bottom pl0" id="role_id" name="role_id">
                  <option value="">Select Role</option>
                  @foreach($roles as $roles)
                  <option value="{{$roles->id}}" short_name="{{$roles->role}}">{{$roles->role}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Module
                </label>
                <select class="form-control border_bottom pl0" id="module_id" name="module_id[]" multiple="multiple" style="height: 150px;">
                  @foreach($modules as $modules)
                  <option value="{{$modules->id}}" short_name="{{$modules->module_name}}">{{$modules->module_name}}</option>
                  @endforeach
                </select>
              </div>

          </div>
          <div class="text-center moda_footer">
            <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-accent  background_gradient btn-view no_border_field" id="addModuleAssignmentbtn">
              Save Changes
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!--end::Modal-->

  <!-- Modal for response -->

  <!-- Modal for success response -->
  <div class="modal fade" id="ResponseSuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form name="fm-student">
          <div class="modal-body">
            <h5 id="ResponseHeading"></h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" data-dismiss="modal" id="LoadModuleAssignmentDatatable">
              OK
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('footer')
@parent
@endsection
@section('page_script')
<script src="{{ asset('js/permission/module_assignment.js') }}"></script>
  <script src="{{ asset('js/permission/role_assignment_module.js') }}"></script>
  <script src="{{ asset('js/permission/delete_role_module.js') }}"></script>
@endsection
