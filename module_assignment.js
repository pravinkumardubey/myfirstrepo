$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * Below line for code will save and update tl
 */
$("#StoreModuleAssignment").validate({

    rules: {
        role_id: {
            required: true
        },
        'module_id[]': {
            required: true,
        },

    },
    errorElement: 'div',
    errorClass: 'error',
    submitHandler: function () {
        urlPath = 'permission/save_module_ssignment';
        requestType = 'post';
        $('.error').remove();
        $.ajax({
            type: 'get',
            url: APP_URL + urlPath,
            data: $('#StoreModuleAssignment').serialize(),
            success: function (successData) {
                $("#exampleModalLabel").modal("hide");
                $('#StoreModuleAssignment')[0].reset();
                console.log(successData);
            },
            error: function (errorData) {
                printErrorMsg(errorData);
            }
        });
    }
});