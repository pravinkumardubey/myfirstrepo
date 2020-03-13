@extends('layouts.admin')
@section('page_title')
Route
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
              Route Panel
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
                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search Route Name.." id="generalSearch">
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
                  <a href="javascript:void(0);" id="addRoute" class="btn background_gradient btn-accent add_btn theme_shadow" data-toggle="modal" data-target="#addRouteModal">
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
          <div class="Route_datatable"></div>
        </div>
      </div>
      <div class="space50"></div>
    </div>

    <!--begin:: Add Route Modal-->
    <div class="modal fade" id="addRouteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">

          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">
              Add Route
            </h5>
            <form id="StoreRoute" action="{{route('addRoutes')}}">
              <input type="hidden" class="form-control border_bottom pl0" id="permission_id" name="permission_id" value="">

              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Routes Path
                </label>
                <input type="text" class="form-control border_bottom pl0" id="route_path" name="route_path" placeholder="Enter route path">
              </div>

              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Route Name
                </label>
                <input type="text" class="form-control border_bottom pl0" id="route_name" name="route_name" placeholder="Enter route name">
              </div>

              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  Module
                </label>
                <select class="form-control border_bottom pl0" id="module_id" name="module_id">
                  <option value="">Select Module</option>
                   @foreach($modules as $modules)
                  <option value="{{$modules->id}}" short_name="{{$modules->module_name}}">{{$modules->module_name}}</option>
                  @endforeach
                </select>
              </div>

            </form>
          </div>
          <div class="text-center moda_footer">
            <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" id="addRoutebtn">
              Save Changes
            </button>
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
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" data-dismiss="modal" id="LoadRouteDatatable">
              OK
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
@section('page_script')
  <script>
      var datatable;
      (function() {
        $('.loader_msg').css('display','none');
        datatable = $('.Route_datatable').mDatatable({
                // datasource definition
                data: {
                  type: 'remote',
                  source: {
                    read: {
                      url: APP_URL+'/route_permission/show',
                      method: 'GET',
                      // custom headers
                      headers: { 'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                      params: {
                          // custom query params
                          query: {
                            //country_list: '',
                            //ll_name: '',
                          }
                        },
                        map: function(raw) {
                          // console.log('raw');

                          var dataSet = raw;
                          if (typeof raw.data !== 'undefined') {
                           dataSet = raw.data;
                         }
                         // console.log('Result');
                         // console.log(dataSet);
                         return dataSet;
                       },
                     }
                   },
                   pageSize: 10,
                   saveState: {
                    cookie: false,
                    webstorage: false
                  },

                  serverPaging: true,
                  serverFiltering: false,
                  serverSorting: false
                },
          // layout definition
          layout: {
              theme: 'default', // datatable theme
              class: '', // custom wrapper class
              scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
              // height: 450, // datatable's body's fixed height
              footer: false // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
              input: $('#generalSearch')
            },

            // inline and bactch editing(cooming soon)
            // editable: false,

            // columns definition
            columns: [{
              field: "S_No",
              title: "S.No",
              width: 40
            },
            {
              field: "route_path",
              title: "Route Path",
              textAlign: 'center'
            },
            {
              field: "route_name",
              title: "Route Name",
              textAlign: 'center'
            },
            {
              field: "module_name",
              title: "Module Name",
              textAlign: 'center'
            },
            /*{
              field: "status",
              title: "Status",
              textAlign: 'center',
              template: function(row) {
                return '\
                 <a href="javascript:;" class="btn btn-success background_gradient btn-view" title="Active">\
                   Active\
                   </a>\
                 ';
              }
            },*/
           {
              width: 110,
              title: 'Actions',
              sortable: false,
              overflow: 'visible',
              field: 'Actions',
              template: function(row) {
                 return '\
                 <a href="javascript:void(0);" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details" onclick=getRouteDetail('+row.id+')>\
                   <i class="la la-edit"></i>\
                   </a>\
                 ';
             },
           }]
         });



$('#addRoutebtn').on('click',function(){
  datatable.reload();
});

$('#generalSearch').on('change',function(){
  var value = $(this).val();
  datatable.setDataSourceQuery({route_name:value});
  datatable.reload();
});

$("#LoadRouteDatatable").on('click',function(){
  datatable.reload();
});

})();

$('#addRoute').on('click',function(){
  $('#route_path').val('');
  $('#route_name').val('');
  $('#module_id').val('');
});
function getRouteDetail(id){
  var path = APP_URL + "/route_permission/details";
  $.ajax({
    method: "GET",
    url: path,
    data: {
      id: id
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(result){
            //// console.log(result);
            var res = $.parseJSON(result);

            if(res.status == 'error'){

            }else{
              var data = $.parseJSON(JSON.stringify(res.message));
              $('#permission_id').val(data.id);
              $('#addRouteModal').find('.modal-title').html('Update Route ');

              $('#route_path').val(data.route_path);
              $('#route_name').val(data.route_name);
              $('#module_id').val(data.module_id);
              $('#addRouteModal').modal('show');
            }
          },
          error: function(){
            alert("Error");
          }
        });
}


function deleteRoute(id){
  var path = APP_URL + "/route_permission/destroy";
  var _this = $(this);
  swal({
    title: "Are you sure to delete this Permission?",
    text: "You will not be able to recover this.",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-warning",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(isConfirm) {
    if (isConfirm) {
      var data = id;
      $.ajax({
        method: 'POST',
        url: path,
        data: {
          id: data,
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          var res = $.parseJSON(data);
          if(res.status == 'error'){
            swal('Error',res.message,'error');
          }else{
        //   $('.sweet-overlay').remove();
        //   $('.showSweetAlert ').remove();
        swal.close();
           $("#ResponseSuccessModal").modal('show');
           $("#ResponseSuccessModal #ResponseHeading").text(res.message);
         }
       },
       error: function(data) {
        swal('Error',data,'error');
      }
    });
    } else {

    }
  });
}


$('#addRoutebtn').click(function(e){
  e.preventDefault();

  var id = $('#permission_id').val();
  var route_path  = $('#route_path').val();
  var route_name  = $('#route_name').val();
  var module_id  = $('#module_id').val();

  if(route_path==''){
    swal("Error","route path is required","error");
    return false;
  }
  if(route_name==''){
    swal("Error","route name is required","error");
    return false;
  }
  if(module_id==''){
    swal("Error","module is required","error");
    return false;
  }

$.ajax({
  method: 'POST',
  url: $("#StoreRoute").attr('action'),
  data: {
    id: id,
    route_path: route_path,
    route_name: route_name,
    module_id: module_id,
  },
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
    var res = $.parseJSON(data);
    if(res.status == 'error'){
      swal('Error',res.message,'error');
    }else{
      $('#addRouteModal').modal('hide');
      $("#ResponseSuccessModal").modal('show');
      $("#ResponseSuccessModal #ResponseHeading").text(res.message);
    }
  },
  error: function(data) {
    swal('Error',data,'error');
  }
});
});

function activate_deactivateRoute(id){
  var path = APP_URL + "/route_permission/create";
  $.ajax({
    method: "GET",
    url: path,
    data: {
      id: id
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(result){
     var res = $.parseJSON(result);
     if(res.status == 'error'){
      swal('Error',res.message,'error');
    }else{
    //  $('.sweet-overlay').remove();
    //  $('.showSweetAlert ').remove();
    swal.close();
     $("#ResponseSuccessModal").modal('show');
     $("#ResponseSuccessModal #ResponseHeading").text(res.message);
   }
 },
 error: function(){
  alert("Error");
}
});
}

</script>
@endsection
