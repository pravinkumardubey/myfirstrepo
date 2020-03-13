@extends('layouts.admin')
@section('page_title') 
Role Restriction Module
@endsection 

@section('page_css')
<style>
.text_decoration{
  text-decoration:none!important;
}
select.m-select2 {
    opacity: 1;
    height: 35px
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
              Role Restriction Module
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
                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search Name.." id="generalSearch">
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
                  <a href="javascript:void(0);" id="addRestrictAssignment" class="btn background_gradient btn-accent add_btn theme_shadow" data-toggle="modal" data-target="#addRoleRestrictionModuleModal">
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
          <div class="User_Restriction_Module_datatable"></div>
        </div>
      </div>
      <div class="space50"></div>
    </div>

    <!--begin:: Add User Restriction Module Modal-->
    <div class="modal fade" id="addRoleRestrictionModuleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="search_form" style="display: none;">
            
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">
              Add Role Restriction Module
            </h5>
            <form id="StoreRoleRestrictionModule" action="{{route('addRoleRestriction')}}">
              <input type="hidden" class="form-control border_bottom pl0" id="permission_id" name="permission_id" value="">
              
              <div class="form-group">
                <label for="name" class="form-control-label font13">
                  User 
                </label>                
                <select class="form-control border_bottom pl0" id="user_role" name="user_role">
                  <option value="">Select Role</option>
                  @foreach($roles as $roles)
                  <option value="{{$roles->id}}" short_name="{{$roles->role}}">{{$roles->role}}</option>
                  @endforeach                 
                </select>
              </div>
           
              
              <div class="form-group">
                           <label class="col-form-label font13">
                           Restricted Module
                           </label>
                           <select class="form-control m-select2 m_selectpicker" id="restricted_module" name="restricted_module[]" multiple>
                              <option value="">Please select module</option>
                              
                           </select>
              </div>
              <div class="form-group">
                           <label class="col-form-label font13">
                           Restricted Route 
                           </label>
                           <select class="form-control m-select2 m_selectpicker" id="restricted_route" name="restricted_route[]" multiple>
                              <option value="">Please select Route</option>
                           </select>
              </div>
            </form>
          </div>
          <div class="text-center moda_footer">
            <button type="button" class="btn btn-danger btn-view no_border_field" data-dismiss="modal">
              Cancel
            </button>
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" id="addURMbtn">
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
            <button type="button" class="btn btn-accent  background_gradient btn-view no_border_field" data-dismiss="modal" id="LoadURMDatatable">
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
    $('#add_urm_search').on('click',function(){
      $('#search_form').toggle(1000);
    });
      var datatable;
      (function() {
        $('.loader_msg').css('display','none');
        datatable = $('.User_Restriction_Module_datatable').mDatatable({
                // datasource definition
                data: {
                  type: 'remote',
                  source: {
                    read: {
                      url: APP_URL+'/role_restriction_module/show',
                      method: 'GET',
                      // custom headers
                      headers: { 'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                      params: {
                          // custom query params
                          query: {
                           // country_list: '',
                           // ll_name: '',
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
              field: "user_role",
              title: "User",
              textAlign: 'center',
              template: function(row) {

                return '<span title='+row.role+'>'+row.role+'</span>';
              }
              
            },
            // {
            //   field: "restricted_module",
            //   title: "Restricted Module",
            //   textAlign: 'center',
            //   template: function(row) {
            //       return '<span title='+row.module_name+'>'+row.module_name+'</span>';
            //   }
            // },
            {
              field: "restricted_route",
              title: "Restricted Route",
              textAlign: 'center',
              template: function(row) {
                  return '<span title='+row.route_name+'>'+row.route_name+'</span>';
              }
              
            },
            /*{
              field: "status",
              title: "Status",
              textAlign: 'center',
              template: function(row) {
                if(row.status==1){
                  return '\
                 <a href="javascript:;" class="btn btn-success background_gradient btn-view" title="Deactivate" onclick=activate_deactivateURM('+row.id+')>\
                    Deactivate\
                    </a>\
                 ';
                }
                else
                {
                  return '\
                 <a href="javascript:;" class="btn btn-success background_gradient btn-view" title="Activate" onclick=activate_deactivateURM('+row.id+')>\
                   Activate\
                   </a>\
                 ';
                }

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
                 <a href="javascript:void(0);" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details" onclick=getURMDetail('+row.id+')>\
                   <i class="la la-edit"></i>\
                   </a>\
                 \
                   \
                 ';
             },
           }]
         });



$('#addURMbtn').on('click',function(){
  datatable.reload();

});
// $('#generalSearch').on('change',function(){
//   var value = $(this).val();
//   datatable.setDataSourceQuery({user_role:value});
//   datatable.reload();
// });

$("#LoadURMDatatable").on('click',function(){
  datatable.reload();
});

})();


function getURMDetail(id){
  $('#permission_id').val(id);
  var path = APP_URL + "/role_restriction_module/edit";
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
            if(result.status == 'error'){
                
            }else{
              var data = res.data;
              $('#addRoleRestrictionModuleModal').find('.modal-title').html('Update Role Restriction Module ');
              getModule(data.role_id,data.restricted_module,data.restricted_route);
              $('#user_role').val(data.role_id);
              let RoutesList = $('#restricted_module').val(data.restricted_module.split(','));
              $('#restricted_module').trigger('change');                        
               $('#addRoleRestrictionModuleModal').modal('show');
               $('.m_selectpicker').selectpicker('refresh');
            }
          },
          error: function(){
            alert("Error");
          }
        }); 
}


function deleteURM(id){
  var path = APP_URL + "/user_restriction_module/destroy";
  var _this = $(this);
  swal({
    title: "Are you sure to delete this User Restriction Module?",
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
              swal.close();
        //   $('.sweet-overlay').remove();
        //   $('.showSweetAlert ').remove();
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

$("#user_role").change(function(e){
       e.preventDefault();
       var selectedRole =  $(this).val();
      if(selectedRole == ''){
       swal("Error","User role is required","error");
         return false;
       }
       $.ajax({
         method: 'POST',
         url: 'searchModule',
         data: {
                selectedRole: selectedRole,
              },
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(data) {
          var res = $.parseJSON(data);
              if(res.status == 'error'){
                swal('Error',res.message,'error');
              }
              else{
                var model = $('#restricted_module');
					      model.empty();
                var data = res.data;
                $.each(data, function(index, element) {
			           model.append("<option value='"+ element.id +"' >" + element.module_name + "</option>");
			          });
                $('.m_selectpicker').selectpicker('refresh');
              }
            },
            error: function(data) {
              swal('Error',data,'error');
            }
       });
});


function getModule(selectedRole, restricted_module, routes){
      if(selectedRole == ''){
       swal("Error","User role is required","error");
         return false;
       }
       $.ajax({
         method: 'POST',
         url: 'searchModule',
         data: {
                selectedRole: selectedRole,
              },
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(data) {
          var res = $.parseJSON(data);
              if(res.status == 'error'){
                swal('Error',res.message,'error');
              }
              else{
                var model = $('#restricted_module');
					      model.empty();
                var data = res.data;
                $.each(data, function(index, element) {
			           model.append("<option value='"+ element.id +"' >" + element.module_name + "</option>");
			          });
                $('.m_selectpicker').selectpicker('refresh');
              }
              $('#restricted_module').val(restricted_module.split(','));
              $('.m_selectpicker').selectpicker('refresh');
              getRoutes(routes);
            },
            error: function(data) {
              swal('Error',data,'error');
            }
       });
}


$("#restricted_module").change(function(e){
      e.preventDefault(); 
       var restrict_module_id =  $(this).val();
       $.ajax({
         method: 'POST',
         url: 'searchRoute',
         async: true,
         data: {
                selectedModules: restrict_module_id,
              },
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(data) {
          var res = $.parseJSON(data);
              if(res.status == 'error'){
                swal('Error',res.message,'error');
              }
              else{
                var model = $('#restricted_route');
					      model.empty();
                var data = res.data;
                $.each(data, function(index, element) {
			            model.append("<option value='"+ element.id +"'>" + element.route_name + "</option>");
			          });
                $('.m_selectpicker').selectpicker('refresh');
              }
              
            },
            error: function(data) {
              swal('Error',data,'error');
            }
       });
});

function getRoutes(routes){
       $.ajax({
         method: 'POST',
         async: true,
         url: 'searchRoute',
         data: {
                selectedModules: $('#restricted_module').val(),
              },
            headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
         success: function(data) {
          var res = $.parseJSON(data);
              if(res.status == 'error'){
                swal('Error',res.message,'error');
              }
              else{
                var model = $('#restricted_route');
					      model.empty();
                var data = res.data;
                $.each(data, function(index, element) {
			            model.append("<option value='"+ element.id +"'>" + element.route_name + "</option>");
			          });
                $('.m_selectpicker').selectpicker('refresh');
              }
              $('#restricted_route').val(routes.split(','));
              $('.m_selectpicker').selectpicker('refresh');
            },
            error: function(data) {
              swal('Error',data,'error');
            }
       });
}

$('#addURMbtn').click(function(e){
  e.preventDefault();
  var id = $('#permission_id').val();
  var user_role  = $('#user_role').val();
  var restricted_module  = $('#restricted_module').val();
  var restricted_route  = $('#restricted_route').val();

  if(user_role==''){
    swal("Error","user is required","error");
    return false;
  }
  if(restricted_module==''){
    swal("Error","module is required","error");
    return false;
  }
  if(restricted_route==''){
    swal("Error","rroute is required","error");
    return false;
  }  

$.ajax({
  method: 'POST',
  url: $("#StoreRoleRestrictionModule").attr('action'),
  data: {
    id: id,
    user_role: user_role,
    restricted_module: restricted_module,
    restricted_route: restricted_route,
   
  },
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
    var res = $.parseJSON(data);
    if(res.status == 'error'){
      swal('Error',res.message,'error');
      $('#addRoleRestrictionModuleModal').modal('hide');
    }else{

      $('#addRoleRestrictionModuleModal').modal('hide');
      $("#ResponseSuccessModal").modal('show');
      $("#ResponseSuccessModal #ResponseHeading").text(res.message);
    } 
  },
  error: function(data) {
    swal('Error',data,'error');
  }
});
});

$('#addRestrictAssignment').on('click',function(){
 		$('#user_role').val('');
		$('#restricted_module').val('');
		$('#restricted_route').val('');
     
 });



</script>
@endsection

