@extends('core-layout.master-layout')
@section('title', 'Create Student')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')
@extends('layouts.admin')
  <!--main content-->
    <div class="m-content">
      <!-- BEGIN: Subheader -->
      <div class="m-subheader ">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="m-subheader__title ">
              Role Panel
            </h3>
          </div>
          <div class="col-xl-4 col-4 m--align-right">
                  <a href="javascript:void(0);" id="Roleadd" class="btn background_gradient btn-accent add_btn theme_shadow" data-toggle="modal" data-target="#addRoleModal">
                    <span>
                      <i class="la la-plus"></i>
                    </span>
                  </a>
                </div>
          <!--begin: Search Form -->
          <div class="m-form m-form--label-align-right">
            <div class="align-items-center">
              <div class="display_flex">
                <div class="col-xl-8 col-8">
                  <div class="form-group m-form__group row align-items-center">
                    <div class="">
                      <div class="m-input-icon m-input-icon--left">
                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search Role Name" id="roleSearch">
                        <span class="m-input-icon__icon m-input-icon__icon--left">
                          <span>
                            <i class="la la-search"></i>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!--end: Search Form -->
        </div>
      </div>

     <!-- Main content -->
     <section class="content  sms-content">
  <div class="row">
    <div class="col-12">
      <div class="card no-background">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="role-table" class="table">
              <thead>
                <tr>
                <th>ID</th>
                <th>Role</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        </div>
    </div>
</section>
    </div>

    <!--begin:: Add TL Modal-->
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">

          </div>
          <form id="StoreRoleForm" method="POST"  action="{{route('addRole')}}">
            <div class="modal-body">
              <h5 class="modal-title" id="exampleModalLabel">
                Add Roles
              </h5>

                <div class="form-group">
                  <label for="name" class="form-control-label font13">
                    Role
                  </label>
                  <input type="text" class="form-control border_bottom pl0" id="role_name" name="role_name" placeholder="Enter Role name">
                </div>

            </div>
            <div class="text-center moda_footer">
              <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
                Cancel
              </button>
              <button type="submit" class="btn btn-accent  background_gradient btn-view no_border_field" id="addRolebtn">
                Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <!--end::Modal-->

  <div class="modal fade" id="editRoleModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">

          </div>
          <form id="StoreRole" method="POST"  action="{{route('updateRole')}}">
            <div class="modal-body">
              <h5 class="modal-title" id="exampleModalLabel">
                Edit Roles
              </h5>
                <div class="form-group">
                <input type="hidden" name="id" id="id">
                  <label for="name" class="form-control-label font13">
                    Role
                  </label>
                  <input type="text" class="form-control border_bottom pl0" id="edit_role" name="edit_role" placeholder="Enter Role name">
                </div>

            </div>
            <div class="text-center moda_footer">
              <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
                Cancel
              </button>
              <button type="submit" class="btn btn-accent  background_gradient btn-view no_border_field" id="addRolebtn">
                Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

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
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" data-dismiss="modal" id="LoadRoleDatatable">
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

@push('scripts')
<script src="{{ asset('js/permission/role.js') }}"></script>
<script src="{{ asset('js/permission/rolecreate.js') }}"></script>
<script src="{{ asset('js/permission/update-role.js') }}"></script>
@endpush
