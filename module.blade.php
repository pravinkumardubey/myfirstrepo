@extends('core-layout.master-layout')
@section('title', 'Location Licensee')
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
              Module Panel
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
                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search Module Name.." id="moduleSearch">
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
                  <a href="javascript:void(0);" id="moduleadd" class="btn background_gradient btn-accent add_btn theme_shadow" data-toggle="modal" data-target="#addModuleModal">
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
      <section class="content  sms-content">
  <div class="row">
    <div class="col-12">
      <div class="card no-background">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table id="country-table" class="table">
              <thead>
                <tr>
                <th>ID</th>
                  <th>Module Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        </div>
    </div>
</section>
      <!-- END: Subheader -->
      <div class="row m-row--full-height">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="Module_datatable"></div>
        </div>
      </div>
      <div class="space50"></div>
    </div>

    <!--begin:: Add Module Modal-->
    <div class="modal fade" id="addModuleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">

          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">
              Add Module
            </h5>
            <form id="StoreModule" action="{{route('addModule')}}">
              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Route
                </label>
                <input type="text" class="form-control border_bottom pl0" id="module_name" name="module_name" placeholder="Enter module name">
              </div>

          </div>
          <div class="text-center moda_footer">
            <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-accent  background_gradient btn-view no_border_field" id="addMbtn">
              Save Changes
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!--end::Modal-->


    <!--begin:: Edit Module Modal-->
    <div class="modal fade" id="editModuleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">

          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">
              Edit Module
            </h5>
            <form id="editModule" action="{{route('updateModule')}}">
              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Route
                </label>
                <input type="hidden" name="id" id="id">
                <input type="text" class="form-control border_bottom pl0" id="edit_module" name="edit_module" placeholder="Enter module name">
              </div>

          </div>
          <div class="text-center moda_footer">
            <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-accent  background_gradient btn-view no_border_field" id="addMbtn">
              Save Changes
            </button>
            </form>
          </div>
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
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" data-dismiss="modal" id="LoadMDatatable">
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
<script src="{{ asset('js/permission/module.js') }}"></script>
<script src="{{ asset('js/permission/createmodule.js') }}"></script>
<script src="{{ asset('js/permission/update-module.js') }}"></script>
@endpush
