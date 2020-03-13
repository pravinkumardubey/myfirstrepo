$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Below line for code will save and update tl
 */
$("#StoreRoleForm").validate({

    rules: {
        role_name: {
            required: true
        },

    },
    errorElement: 'div',
    errorClass: 'error',
    submitHandler: function () {
        urlPath = 'permission/addRole';
        requestType = 'post';
        $('.error').remove();
        $.ajax({
            type: 'get',
            url: APP_URL + urlPath,
            data: $('#StoreRoleForm').serialize(),
            success: function (successData) {
                $("#addRoleModal").modal("hide");
                $('#StoreRoleForm')[0].reset();
            },
            error: function (errorData) {
                printErrorMsg(errorData);
            }
        });
    }
});
function getRoleDetailById(id) {
    let urlPath = 'permission/getinforole';
    $.ajax({
        method: 'GET',
        url: APP_URL + urlPath,
        data: {
            id: id
        },
        success: function (data) {
            if (data) {
                let roleData = data
                $('#id').val(roleData.id);
                $('#edit_role').val(roleData.role);
                $("#editRoleModel").modal("show");
            }
        }
    });
}
