@extends('layouts.admin')
@section('page_title') 
User Permissions
@endsection 

@section('page_css')
<style>
.text_decoration{
  text-decoration:none!important;
}
</style>
@endsection
@section('content')


<div class="m-content"> 
    <!-- BEGIN: Subheader -->
      <div class="m-subheader ">
        <div class="d-flex align-items-center">
          <div class="mr-auto">
            <h3 class="m-subheader__title ">
             Permissions
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="{{url('/home')}}" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{url('/user/getPermission').'/'.$user->id}}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            User Permissions
                        </span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link">
                        <span class="m-nav__link-text">
                            {{$user->name}}
                        </span>
                    </a>
                </li>
            </ul>
          </div> 
        </div>
      </div>
      <!-- END: Subheader -->
        <div class="m-portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                 Permissions
                </h3>
              </div>
            </div>
          </div>
          @if(Helper::CanIf('updateAdminPermission'))
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                 <a href="javascript:void(0);" class="btn btn-success background_gradient btn-view" title="Update Permission" onclick="UpdatePermission()">Update </a>
                </h3>
              </div>
            </div>
          </div>
          @endif
          <div class="m-portlet__body">
            <!--begin::Section-->
             <div class="">
          <div class="m-section__content">
            @if(isset($module))
            @foreach($module->toArray() as $val=>$key)
              <div class="m-form__group form-group">
                <label for="" class="module_label background_gradient ">
                  <label class="m-checkbox m-checkbox--primary">
                    <input type="checkbox" checked="true" data-moduleId="{{$key['id']}}" value="{{$key['id']}}" class="moduleCheckBox">
                    {{$key['module_name']}}
                    <span></span>
                  </label> 
                </label>
                <div class="row">
                  @foreach($key['get_route_detail'] as $val1=>$key1)
                  @if(!in_array($key1['id'],$restricted_routes))
                  <div class="col-sm-4">
                      <div class="m-form__group form-group"> 
                        <div class="m-checkbox-list">
                          <label class="m-checkbox m-checkbox--state-success routesPath">
                            <input type="checkbox" value="{{$key1['id']}}" checked data-moduleId="{{$key['id']}}" class="">
                            {{$key1['route_name']}}
                            <span></span>
                          </label> 
                        </div> 
                      </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
            @endforeach
            @endif
          </div>
        </div>
            <!--end::Section-->
          </div>
          <!--end::Form-->
        </div>
      </div>



 
  <style type="text/css">
    label.module_label {
    font-size: 16px;
    font-weight: 800;
    color: #fff;
    display: block;
    padding: 5px;
    padding-left: 15px;
    margin-bottom: 20px;
}
.module_label label.m-checkbox.m-checkbox--primary {
    color: #fff;
    font-weight: normal;
}
.module_label .m-checkbox.m-checkbox--primary > span {
    border: 1px solid #ffffff;
}
.module_label .m-checkbox.m-checkbox--primary > span:after {
    border: solid #fdfdfd;
}
.module_label .m-checkbox.m-checkbox--primary > input:checked ~ span {
    border: 1px solid #ffffff;
}
  </style>
@endsection
@section('page_script')
    <script>
    @if(isset($User_Restriction))
      var restricted_module = "{{$User_Restriction->restricted_module}}";
      var restricted_route = "{{$User_Restriction->restricted_route}}";

      if(restricted_module){
        let restricted_module1 = restricted_module.split(',');
        $.each(restricted_module1, function(val,key){
          $('input[data-moduleId='+key+']').attr('checked',false);
        });
      }
      if(restricted_route){
        let restricted_route1 = restricted_route.split(',');
        $.each(restricted_route1, function(val,key){
          $('input[value='+key+']').attr('checked',false);
        });
      }
    @endif

    $('.moduleCheckBox').click(function(){
      // console.log($(this).prop('checked'));
      $('input[data-moduleId='+$(this).val()+']').prop('checked',$(this).prop('checked'));
    });

    function UpdatePermission(){
      var user_Id = {{$user_id}}
      var UnAssignModuleArr = [];
      $.each($('.moduleCheckBox'), function(){
        if($(this).prop('checked') == false){
          UnAssignModuleArr.push($(this).val());
        }
      })

      var unAssignePermission = [];
      $.each($('.routesPath input[type=checkbox]'), function(){
        if($(this).prop('checked') == false){
          if(!UnAssignModuleArr.includes($(this).data('moduleid'))){
            unAssignePermission.push($(this).val());
          }
        }
      });
      

      // console.log(UnAssignModuleArr,unAssignePermission);

      $.ajax({
        url: "{{url('updateAdminPermission')}}",
        type: 'POST',              
        data: {user_Id:user_Id,UnAssignModuleArr:UnAssignModuleArr.join(),unAssignePermission:unAssignePermission.join()},
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
       success: function (data) {
          if(data.status=='success'){
            swal('Success',data.message,'success');
          }
          if(data.status=='error'){
            swal('Error',data.message,'error');
          }
         },
         cache: false,
      });
    }
    </script>
@endsection

