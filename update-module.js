$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Below line for code will save and update module
 */
$("#editModule").validate({

    rules: {
        edit_module: {
            required: true
        },

    },
    errorElement: 'div',
    errorClass: 'error',
    submitHandler: function () {
        urlPath = 'permission/updateModule';
        requestType = 'post';
        $('.error').remove();
        $.ajax({
            type: 'get',
            url: APP_URL + urlPath,
            data: $('#editModule').serialize(),
            success: function (successData) {
                $("#editModuleModal").modal("hide");
                $('#editModule')[0].reset();
            },
            error: function (errorData) {
                printErrorMsg(errorData);
            }
        });
    }
});