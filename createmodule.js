$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * below line for code will save module
 */
$("#StoreModule").validate({

    rules: {
        module_name: {
            required: true
        },

    },
    errorElement: 'div',
    errorClass: 'error',
    submitHandler: function () {
        urlPath = 'permission/addModule';
        requestType = 'post';
        $('.error').remove();
        $.ajax({
            type: 'get',
            url: APP_URL + urlPath,
            data: $('#StoreModule').serialize(),
            success: function (successData) {
                $("#StoreModule").modal("hide");
                $('#StoreModule')[0].reset();
            },
            error: function (errorData) {
                printErrorMsg(errorData);
            }
        });
    }
});

