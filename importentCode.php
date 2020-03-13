 $('#add_ma_search').on('click',function(){
      $('#search_form').toggle(1000);
    });
      var datatable;
      (function() {
        $('.loader_msg').css('display','none');
        datatable = $('.Module_Assignment_datatable').mDatatable({
                // datasource definition
                data: {
                  type: 'remote',
                  source: {
                    read: {
                      url: APP_URL+'/module_assignment/show',
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

           /* search: {
              input: $('#generalSearch')
            },*/

            // inline and bactch editing(cooming soon)
            // editable: false,

            // columns definition
            columns: [{
              field: "S_No",
              title: "S.No",
              width: 40
            },
            {
              field: "role",
              title: "Role",
              textAlign: 'center'
            },
            {
              field: "module_name",
              title: "Module Assigned",
              template: function(row) {
                  return '<span title='+row.module_name+'>'+row.module_name+'</span>';
              }
            },
            /*{
              field: "status",
              title: "Status",
              textAlign: 'center',
              template: function(row) {
                if(row.status==1){
                  return '\
                 <a href="javascript:;" class="btn btn-success background_gradient btn-view" title="Deactivate" onclick=activate_deactivateMA('+row.id+')>\
                    Deactivate\
                    </a>\
                 ';
                }
                else
                {
                  return '\
                 <a href="javascript:;" class="btn btn-success background_gradient btn-view" title="Activate" onclick=activate_deactivateMA('+row.id+')>\
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
                 <a href="javascript:void(0);" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details" onclick=getModuleAssignmentDetail('+row.id+')>\
                   <i class="la la-edit"></i>\
                   </a>\
                 <a href="javascript:void(0);" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete"  onclick=deleteMA('+row.id+')>\
                   <i class="la la-trash"></i>\
                   </a>\
                   \
                 ';
             },
           }]
         });



$('#addModuleAssignmentbtn').on('click',function(){
  datatable.reload();
});

$("#LoadModuleAssignmentDatatable").on('click',function(){
  datatable.reload();
});

})();

$('#addModuleAssignment').on('click',function(){
   $('#role_id').val('');
   $('#module_id').val('');
});


function getModuleAssignmentDetail(id){
  $('#module_id').val('');
  $('#role_id').val('');
  var path = APP_URL + "/module_assignment/details";
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
            }else{
              var data = $.parseJSON(JSON.stringify(res.message));
              $('#module_assign_id').val(data.id);
              $('#addModuleAssignmentModal').find('.modal-title').html('Update Module Assignment ');
              $('#role_id').val(data.role_id);
              var module_id = data.module_id;
              //alert(country_id);
              $.each(module_id.split(","), function(i,e){
                $("#module_id option[value='" + e + "']").prop("selected", true);
              });
              //$('#module_id').val(data.module_id);
              $('#addModuleAssignmentModal').modal('show');
            }
          },
          error: function(){
            alert("Error");
          }
        });
}


function deleteMA(id){
  var path = APP_URL + "/module_assignment/destroy";
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

$('#addModuleAssignmentbtn').click(function(e){
  e.preventDefault();

  var id = $('#module_assign_id').val();
  var role_id  = $('#role_id').val();
  var module_id  = $('#module_id').val();

  if(role_id==''){
    swal("Error","role is required","error");
    return false;
  }
  if(module_id==''){
    swal("Error","module is required","error");
    return false;
  }

$.ajax({
  method: 'POST',
  url: $("#StoreModuleAssignment").attr('action'),
  data: {
    id: id,
    role_id: role_id,
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
      $('#addModuleAssignmentModal').modal('hide');
      $("#ResponseSuccessModal").modal('show');
      $("#ResponseSuccessModal #ResponseHeading").text(res.message);
    }
  },
  error: function(data) {
    swal('Error',data,'error');
  }
});
});
