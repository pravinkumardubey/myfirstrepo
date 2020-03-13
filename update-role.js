$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Below line for code will save and update tl
 */
$("#StoreRole").validate({

    rules: {
        edit_role: {
            required: true
        },

    },
    errorElement: 'div',
    errorClass: 'error',
    submitHandler: function () {
        urlPath = 'permission/updateRole';
        requestType = 'post';
        $('.error').remove();
        $.ajax({
            type: 'get',
            url: APP_URL + urlPath,
            data: $('#StoreRole').serialize(),
            success: function (successData) {
                $("#editRoleModel").modal("hide");
                $('#StoreRole')[0].reset();
            },
            error: function (errorData) {
                printErrorMsg(errorData);
            }
        });
    }
});